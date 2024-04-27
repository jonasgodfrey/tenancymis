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
                'property_type' => 'Shopping Complex',
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
                'property_type' => 'Stores',
            ],
            [
                'property_category_id' => '1',
                'property_type' => 'Centres',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Estate',
            ],
            [
                'property_category_id' => '2',
                'property_type' => 'Apartments',
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
