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
            'A user that manages the plazas created by the admin.',
        ]);

        Role::create([
            'name' => 'tenant',
            'description' =>
            'A user that rents a shop in a plaza.',
        ]);

    }
}
