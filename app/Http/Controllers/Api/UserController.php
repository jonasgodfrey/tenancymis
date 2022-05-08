<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
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


    public function fetch(Request $request)
    {
        # Get the role of the auth user
        $user_role = $request->user()->role;

        // checks if user has admin role and query based on access
        // returns users under a certain admin
        if ($user_role == 'admin') {
            $data = User::where('owner_id', $request->user()->id);
        }

        // checks if user is a manager and query based on access
        // returns all data under a certain owner
        if ($user_role == 'manager') {

            $whereCondition = [
                ['role', '=', 'tenant'],
                ['owner_id', '=', $request->user()->owner_id],
            ];

            $data = User::where($whereCondition)->get();
        }

        // get the total count of the queried records
        if (count($data) == 0) {

            $data = "no users found";
        }

        // return final Json data response to the client
        return response()->json([
            'result' => $data,
        ]);
    }
    public function create(Request $request)
    {
        # Get the role of the auth user
        $user_role = $request->user()->role;

        // validate form data from the client
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string'
        ]);

        // checks for user role and returns user owner id
        if ($user_role == 'manager') {
            $owner_id = $request->user()->owner_id;
        } else {
            $owner_id = $request->user()->id;
        }

        // generate user ref code
        $regCode = "PLA" . rand(11100, 999999);

        // get user role from role table
        $role = Role::where('name', $request->role)->first();

        // store details of a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'usercode' => $regCode,
            'owner_id' => $owner_id,
            'password' => Hash::make($validatedData['password']),
        ]);

        // attach roles to the new user
        $user->roles()->attach($role);

        //update otp on user table
        $user->update([
            'otp' => rand(111111, 999999)
        ]);

        // publish a notification for the user create action
        $notification = Notification::create([
            'user_id' => $user->id,
            'title' => "New User Created",
            'message' => 'You just added a new user to PLA'
        ]);

        // generate a new token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        // return final Json data response to the client
        return response()->json([
            'access_token' => $token,
            'user_data' => $user,
            'token_type' => 'Bearer',
        ]);
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
