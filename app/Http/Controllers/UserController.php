<?php

namespace App\Http\Controllers;

use App\Models\Accountant;
use App\Models\Artisan;
use App\Models\Manager;
use App\Models\Notification;
use App\Models\Property;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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

        if (Gate::allows('admin')) {

            $roles = Role::whereNot('name', 'admin')->whereNot('name', 'tenant')->get();
            $properties = $user->properties;
            $user = Auth()->user();
            $users = User::where('owner_id', $user->id)->get();

            return view('admin.users.index')->with([
                'roles' => $roles,
                'properties' => $properties,
                'users' => $users
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = Auth::user();
        $role = $request->role;
        $role_id = Role::where('name', $role)->first();
        $prop_id = $request->propid;
        $property = Property::where('id', $prop_id)->first();
        $regCode = "PLA" . rand(11100, 999999);

        if (Gate::allows('admin')) {

            // checks for user role and adds user
            if ($role == 'manager') {
                if ($property->hasManager($prop_id)) {

                    Session::flash('error_message', 'Property already has a manager !');
                    return redirect()->back();
                } else {

                    // store details of a new user
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'role' => $request->role,
                        'usercode' => $regCode,
                        'owner_id' => $user->id,
                        'password' => Hash::make($request->phone),
                        'status_id' => '1',
                    ]);

                    // attach roles to the new user
                    $user->roles()->attach($role_id);

                    Manager::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'propId' => $prop_id,
                        'salary' => 'null',
                    ]);

                    // publish a notification for the user create action
                    $notification = Notification::create([
                        'user_id' => $user->id,
                        'title' => "New User Created",
                        'message' => 'You just added a new manager to TenancyPlus'
                    ]);
                }
            }

            // checks for user role and adds user
            if ($role == 'accountant') {

                if ($property->hasAccountant($prop_id)) {

                    Session::flash('error_message', 'Property already has an accountant !');
                    return redirect()->back();
                } else {

                    // store details of a new user
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'role' => $request->role,
                        'usercode' => $regCode,
                        'owner_id' => $user->id,
                        'password' => Hash::make($request->phone),
                        'status_id' => '1',
                    ]);

                    // attach roles to the new user
                    $user->roles()->attach($role_id);

                    Accountant::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'propId' => $prop_id,
                        'salary' => 'null',
                    ]);

                    // publish a notification for the user create action
                    $notification = Notification::create([
                        'user_id' => $user->id,
                        'title' => "New User Created",
                        'message' => 'You just added a new accountant to TenancyPlus'
                    ]);
                }
            }

            // checks for user role and adds user
            if ($role == 'artisan') {
                // store details of a new user
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'role' => $request->role,
                    'usercode' => $regCode,
                    'owner_id' => $user->id,
                    'password' => Hash::make($request->phone),
                    'status_id' => '1',
                ]);

                // attach roles to the new user
                $user->roles()->attach($role_id);

                Artisan::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'bizname' => $request->bizname,
                    'propId' => $prop_id,
                    'vendorcatId' => $request->vencat,
                    'salary' => 'null',
                ]);

                // publish a notification for the user create action
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'title' => "New User Created",
                    'message' => 'You just added a new user to TenancyPlus'
                ]);
            }


            Session::flash('flash_message', 'User Created Successfully !');
            return redirect()->back();
        }
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
