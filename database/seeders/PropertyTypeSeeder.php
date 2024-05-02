<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_types')->insertOrIgnore([
            [
                'property_category_id' => '1',
                'property_type' => 'Mall',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Shopping Centre',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Plaza',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Market Square',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Hotel',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Corporate Office',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Warehouse',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Storage',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Hospitality',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Tent',
            ],

            // Residential Properties

            [
                'property_category_id' => '2',
                'property_type' => 'Apartment',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Bungalow',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Condominiums',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Cottage',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Dormitory',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Detached',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Duplex',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Flat',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Penthouse',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Mansion',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Townhouse',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Terraces',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Estate',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Self Contain',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Single Rooms',
            ],
        ]);
    }
}
