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
                'propcatId' => '2',
                'name' => 'Duplex',
            ],
            [
                'propcatId' => '2',
                'name' => 'Bungalow',
            ],
        ]);

    }
}
