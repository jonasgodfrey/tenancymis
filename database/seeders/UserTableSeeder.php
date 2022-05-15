<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@tenancymis.com',
            'phone' => '11111111111',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'owner_id' => null,
            'remember_token' => null,
            'role' => 'admin',
            'otp' => rand(111111, 999999),
            'usercode' =>  "PLA" . rand(11100, 999999),
            'created_at' => now(),
            'updated_at' => now(),
            'status_id' => '1',
        ]);

        $admin->roles()->attach($adminRole);
        $admin->createToken('auth_token')->plainTextToken;

    }

}
