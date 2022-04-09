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
    public function fetch(Request $request)
    {

        $user_role = $request->user()->role;

        if ($user_role == 'admin') {
            $data = User::all();
        }

        if ($user_role == 'manager') {
            $data = User::where('role', 'tenant')->get();
        }

        if (count($data) == 0) {

            $data = "no users found";
        }

        return response()->json([
            'result' => $data,
        ]);
    }
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string'
        ]);


        $regCode = "PLA" . rand(11100, 999999);
        $role = Role::where('name', $request->role)->first();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'usercode' => $regCode,
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->roles()->attach($role);

        $user->update([
            'otp' => rand(111111, 999999)
        ]);

        $notification = Notification::create([
            'user_id' => $user->id,
            'title' => "New User Created",
            'message' => 'You just added a new user to PLA'
        ]);


        $token = $user->createToken('auth_token')->plainTextToken;

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
