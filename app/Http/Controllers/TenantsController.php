<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Role;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $tenants = $user->tenants;
        $users = User::where('owner_id', $user->id)->get();


        logInfo($tenants);

        if (Gate::allows('admin')) {

            $properties = $user->properties;

            return view('admin.tenants.index')->with([
                'properties' => $properties,
                'tenants' => $tenants,
                'users' => $users

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
                'new_tenant_name' => ['required', 'string', 'max:255'],
                'new_mobile' => ['required', 'string',],
                'new_bizname' => ['required', 'string', 'max:255'],
                'propname' => ['required', 'numeric', 'max:255'],
                'unit' => ['required', 'numeric'],
                'bizcat' => ['required', 'string', 'max:255'],
            ]);
        } else {
            $request->validate([
                'selected_user' => ['required', 'numeric', 'max:255'],
                'propname' => ['required', 'numeric', 'max:255'],
                'unit' => ['required', 'numeric'],
                'bizcat' => ['required', 'string', 'max:255'],
            ]);
        }

        $user = Auth::user();

        logInfo($request->all(), "Store request");

        if (Gate::allows('admin')) {
            # code...

            // get user role from role table
            $role = Role::where('name', 'tenant')->first();

            // generate user ref code
            $regCode = "PLA" . rand(11100, 999999);

            if ($request->assign_type == "new") {

                $newuser = User::where('email', $request->new_email)->first();

                if ($newuser) {
                    Session::flash('error_message', 'Email already exists');
                    return redirect()->back();
                }

                // store details of a new user
                $user = User::create([
                    'name' => $request->new_tenant_name,
                    'email' => $request->new_email,
                    'phone' => $request->new_mobile,
                    'role' => $role->name,
                    'occupation' => $request->new_bizname,
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

            $tenant = Tenant::create([
                'user_id' => $user->id,
                'bizcat' => $request->bizcat,
                'propId' => $request->propname,
                'unitId' => $request->unit,
                'payId' => 'null',
            ]);

            Unit::where('id', $request->unit)->update([
                'status' => 'occupied'
            ]);

            $owner = $user->owner_id;

            // publish a notification for the user create action
            $notification = Notification::create([
                'user_id' => $user->id,
                'owner_id' => $owner,
                'title' => "New Tenant Created",
                'message' => $user->name . ' added a new tenant to TenancyPlus'
            ]);

            if ($user && $tenant) {
                Session::flash('flash_message', 'Tenant Created Successfully !');
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
