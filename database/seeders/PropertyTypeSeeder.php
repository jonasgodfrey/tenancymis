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
                'typename' => 'Mall',
            ],
            [
                'property_category_id' => '1',
                'typename' => 'Shopping Complex',
            ],
            [
                'property_category_id' => '1',
                'typename' => 'Plaza',
            ],
            [
                'property_category_id' => '1',
                'typename' => 'Market Square',
            ],
            [
                'property_category_id' => '1',
                'typename' => 'Stores',
            ],
            [
                'property_category_id' => '1',
                'typename' => 'Centres',
            ],
            [
                'property_category_id' => '2',
                'typename' => 'Estate',
            ],
            [
                'property_category_id' => '2',
                'typename' => 'Apartments',
            ],
            [
                'property_category_id' => '2',
                'typename' => 'Self Contain',
            ],
            [
                'property_category_id' => '2',
                'typename' => 'Single Rooms',
            ],
        ]);
    }
}
