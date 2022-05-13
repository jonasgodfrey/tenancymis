<?php

namespace Database\Seeders;

use App\Models\UnitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitType::create([
            'propcatId' => '1',
            'name' => 'Shop',
        ]);
        UnitType::create([
            'propcatId' => '2',
            'name' => 'Duplex',
        ]);
        UnitType::create([
            'propcatId' => '2',
            'name' => 'Bungalow',
        ]);
    }
}
