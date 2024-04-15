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
                'property_category_id' => '1',
                'name' => 'Shop',
            ],
            [
                'property_category_id' => '1',
                'name' => 'Store',
            ],
            [
                'property_category_id' => '2',
                'name' => 'Single Room',
            ],
            [
                'property_category_id' => '2',
                'name' => 'Self Contain',
            ],
            [
                'property_category_id' => '2',
                'name' => 'Flat',
            ],
            [
                'property_category_id' => '2',
                'name' => 'Bungalow',
            ],
            [
                'property_category_id' => '2',
                'name' => 'Duplex',
            ],
            [
                'property_category_id' => '2',
                'name' => 'Terrace'
            ],
        ]);

    }
}
