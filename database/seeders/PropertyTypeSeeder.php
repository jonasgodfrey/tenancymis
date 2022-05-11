<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyType::create([
            'propcatId' => '1',
            'typename' => 'Mall',
        ]);
        PropertyType::create([
            'propcatId' => '1',
            'typename' => 'Shopping Complex',
        ]);
        PropertyType::create([
            'propcatId' => '1',
            'typename' => 'Plaza',
        ]);
}
}