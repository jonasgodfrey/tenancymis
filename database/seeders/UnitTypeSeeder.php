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
                'unit_type' => 'Shop',
            ],
            [
                'property_category_id' => '1',
                'unit_type' => 'Store',
            ],
            [
                'property_category_id' => '1',
                'unit_type' => 'Suite',
            ],
            [
                'property_category_id' => '1',
                'unit_type' => 'Storage',
            ],
            [
                'property_category_id' => '1',
                'unit_type' => 'Office',
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'Unit',
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'Room',
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'Apartment'
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'House'
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'Town House'
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'Flat'
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'No'
            ],
            [
                'property_category_id' => '2',
                'unit_type' => 'Others'
            ],
        ]);

    }
}
