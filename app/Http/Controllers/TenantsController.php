<?php

namespace App\Http\Controllers;

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

        if (Gate::allows('admin')) {

            $properties = $user->properties;

            return view('admin.tenants.index')->with([
                'properties' => $properties,
                'tenants' => $tenants,
            ]);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = Auth::user();

        if (Gate::allows('admin')) {
            # code...

            // get user role from role table
            $role = Role::where('name', 'tenant')->first();

            // generate user ref code
            $regCode = "PLA" . rand(11100, 999999);

            // store details of a new user
            $user = User::create([
                'name' => $request->tenantname,
                'email' => $request->email,
                'phone' => $request->mobile,
                'role' => $role->name,
                'usercode' => $regCode,
                'owner_id' => $user->id,
                'password' => Hash::make($request->mobile),
                'status_id' => '1',

            ]);

            // attach roles to the new user
            $user->roles()->attach($role);

            $tenant = Tenant::create([
                'name' => $request->tenantname,
                'email' => $request->email,
                'phone' => $request->mobile,
                'bizname' => $request->bizname,
                'bizcat' => $request->bizcat,
                'propId' => $request->propname,
                'unitId' => $request->unit,
                'payId' => 'null',
            ]);

            Unit::where('id', $request->unit)->update([
                'status' => 'occupied'
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
}
