<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Role;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\Tenant;
use App\Models\TenantRentalRecord;
use App\Models\Unit;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Matcher\Not;

class TenantsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        logInfo($user->mytenants, "My major tenants");

        $tenants = $user->mytenants->where('role', 'tenant');
        $users = User::where('owner_id', $user->id)->get();


        logInfo($tenants, "All Tenants");

        if (Gate::allows('admin')) {

            $properties = $user->properties;

            return view('admin.tenants.index')->with([
                'properties' => $properties,
                'tenants' => $tenants,
                'property_categories' => PropertyCategory::all(),
                'users' => $users

            ]);
        }

        return null;
    }

    public function showTenantRecords(Request $request, $tenantId)
    {
        $user = Auth::user();
        $tenants = $user->mytenants;
        $tenantRecordSql = TenantRentalRecord::leftJoin('users', 'users.id', '=', 'tenant_rental_records.tenant_id')
            ->leftJoin('units', 'units.id', '=', 'tenant_rental_records.unit_id')
            ->leftJoin('properties', 'properties.id', '=', 'units.property_id')->where('users.id', $tenantId)
            ->select('units.*', 'properties.*', 'users.*', 'tenant_rental_records.start_date');

        $tenantRecord = $tenantRecordSql->get();

        logInfo($tenantRecord, "All Tenants");

        if (Gate::allows('admin')) {

            $properties = $user->properties;

            return view('admin.tenants.tenant_records')->with([
                'tenantRecords' => $tenantRecord,
                'tenants' => $tenants,
                'property_categories' => PropertyCategory::all()
            ]);
        }

        return null;
    }


    public function store(Request $request)
    {
        $request->validate([
            'assign_type' => ['required', 'string', 'max:255']
        ]);

        if ($request->assign_type == "new") {
            $request->validate([
                'new_email' => ['required', 'string', 'email', 'max:255'],
                'new_tenant_first_name' => ['required', 'string', 'max:255'],
                'new_tenant_last_name' => ['required', 'string', 'max:255'],
                'new_mobile' => ['required', 'string',],
                'new_business_name' => ['required', 'string', 'max:255'],
                'property_name' => ['required', 'numeric', 'max:255'],
                'unit' => ['required', 'numeric'],
                'bizcat' => ['required', 'string', 'max:255'],
            ]);
        } else {
            $request->validate([
                'selected_user' => ['required', 'numeric', 'max:255'],
                'property_name' => ['required', 'numeric', 'max:255'],
                'unit' => ['required', 'numeric'],
                'bizcat' => ['required', 'string', 'max:255'],
            ]);
        }

        $user = Auth::user();

        logInfo($request->all(), "Store request");

        if (Gate::allows('admin')) {

            // get user role from role table
            $role = Role::where('name', 'tenant')->first();

            // generate user ref code
            $regCode = "PLA" . rand(11100, 999999);

            try {

                DB::beginTransaction();

                if ($request->assign_type == "new") {

                    $newuser = User::where('email', $request->new_email)->first();

                    if ($newuser) {
                        Session::flash('error_message', 'Email already exists');
                        return redirect()->back();
                    }

                    // store details of a new user
                    $user = User::create([
                        'first_name' => $request->new_tenant_first_name,
                        'last_name' => $request->new_tenant_last_name,
                        'email' => $request->new_email,
                        'phone' => $request->new_mobile,
                        'role' => $role->name,
                        'occupation' => $request->new_business_name,
                        'usercode' => $regCode,
                        'owner_id' => $user->id,
                        'password' => Hash::make($request->new_mobile),
                        'status_id' => '1',
                    ]);
                } else {
                    $user = User::find($request->selected_user);
                    if (!$user) {
                        Session::flash('flash_message', 'Unable to find Selected user');
                        return redirect()->back();
                    }
                }

                // attach roles to the new user
                $user->roles()->attach($role);

                // $tenant = Tenant::create([
                //     'user_id' => $user->id,
                //     'bizcat' => $request->bizcat,
                //     'property_id' => $request->property_name,
                //     'unit_id' => $request->unit,
                //     'payment_id' => 'null',
                // ]);

                Unit::where('id', $request->unit)->update([
                    'status' => 1,
                    'tenant_id' => $user->id,
                ]);

                $tenant = TenantRentalRecord::create([
                    'tenant_id' => $user->id,
                    'unit_id' => $request->unit,
                    'start_date' => $request->start_date,
                    'property_category_id' => $request->bizcat
                ]);


                $owner = $user->owner_id;

                // publish a notification for the user create action
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'owner_id' => $owner,
                    'title' => "New Tenant Created",
                    'message' => $user->name . ' added a new tenant to TenancyPlus'
                ]);
                DB::commit();

                if ($user && $tenant) {
                    Session::flash('flash_message', 'Tenant Created Successfully !');
                    return redirect()->back();
                }

            } catch (Exception $e) {

                DB::rollBack();

                Session::flash('error_message', 'Server Error. Please try again later!');
                return redirect()->back();
            }
        }
    }

    public function tenantsdashboard()
    {
        return view('tenants.index')->with([]);
    }

    public function update(Request $request)
    {
        # code...
    }
    public function delete(Request $request)
    {
        # code...
    }

    public function showTenantsDetails($userid)
    {
        $user = Auth::user();
        $tenants = $user->tenants;

        logInfo($tenants);

        if (Gate::allows('admin')) {

            $properties = $user->properties;

            return view('admin.tenants.show_details')->with([
                'properties' => $properties,
                'tenants' => $tenants,
            ]);
        }
    }
}
