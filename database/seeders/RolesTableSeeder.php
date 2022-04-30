<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'name' => 'admin',
            'description' =>
            'A user who has access to all the administration features on this platform.',
        ]);

        Role::create([
            'name' => 'manager',
            'description' =>
            'A user that manages the property.',
        ]);

        Role::create([
            'name' => 'accountant',
            'description' =>
            'A user that manages the financial assets of the property.',
        ]);

        Role::create([
            'name' => 'artisan',
            'description' =>
            'A user that carries out maintainance/repairs of property infastructure.',
        ]);

        Role::create([
            'name' => 'tenant',
            'description' =>
            'A user that rents out a unit in a property.',
        ]);

    }
}
