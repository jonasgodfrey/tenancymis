<?php

namespace Database\Seeders;

use App\Models\UnitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_types')->insertOrIgnore([
            [
                'propcatId' => '1',
                'name' => 'Shop',
            ],
            [
                'propcatId' => '1',
                'name' => 'Store',
            ],
            [
                'propcatId' => '2',
                'name' => 'Single Room',
            ],
            [
                'propcatId' => '2',
                'name' => 'Self Contain',
            ],
            [
                'propcatId' => '2',
                'name' => 'Flat',
            ],
            [
                'propcatId' => '2',
                'name' => 'Bungalow',
            ],
            [
                'propcatId' => '2',
                'name' => 'Duplex',
            ],
            [
                'propcatId' => '2',
                'name' => 'Terrace'
            ],
        ]);

    }
}
