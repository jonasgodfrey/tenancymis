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

            return view('admin.users.index')->with([
                'roles' => $roles,
                'properties' => $properties,
            ]);
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $role = $request->role;

        if (Gate::allows('admin')) {

            $role = $request->role;

            // generate user ref code
            $regCode = "PLA" . rand(11100, 999999);

            // checks for user role and adds user
            if ($role == 'manager') {
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
                $user->roles()->attach($role);

                Manager::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'propId' => $request->propid,
                    'salary' => 'null',
                ]);

                // publish a notification for the user create action
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'title' => "New User Created",
                    'message' => 'You just added a new manager to TenancyPlus'
                ]);
            }

            // checks for user role and adds user
            if ($role == 'accountant') {

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
                $user->roles()->attach($role);

                Accountant::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'propId' => $request->propid,
                    'salary' => 'null',
                ]);

                // publish a notification for the user create action
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'title' => "New User Created",
                    'message' => 'You just added a new accountant to TenancyPlus'
                ]);
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
                $user->roles()->attach($role);

                Artisan::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'bizname' => $request->bizname,
                    'propId' => $request->propid,
                    'vendorcatId' => $request->catid,
                    'salary' => 'null',
                ]);

                // publish a notification for the user create action
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'title' => "New User Created",
                    'message' => 'You just added a new user to TenancyPlus'
                ]);
            }

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
