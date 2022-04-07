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
        $managerRole = Role::where('name', 'manager')->first();
        $tenantRole = Role::where('name', 'tenant')->first();


        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@tenancymis.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'remember_token' => null,
            'role' => 'admin',
            'otp' => rand(111111, 999999),
            'usercode' =>  "PLA" . rand(11100, 999999),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@tenancymis.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'remember_token' => null,
            'role' => 'manager',
            'otp' => rand(111111, 999999),
            'usercode' =>  "PLA" . rand(11100, 999999),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $tenant = User::create([
            'name' => 'tenant',
            'email' => 'tenant@tenancymis.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'remember_token' => null,
            'role' => 'tenant',
            'otp' => rand(111111, 999999),
            'usercode' =>  "PLA" . rand(11100, 999999),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $admin->roles()->attach($adminRole);
        $admin->createToken('auth_token')->plainTextToken;

        $manager->roles()->attach($managerRole);
        $manager->createToken('auth_token')->plainTextToken;

        $tenant->roles()->attach($tenantRole);
        $tenant->createToken('auth_token')->plainTextToken;

    }

}
