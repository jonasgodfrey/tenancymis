<?php

namespace Database\Seeders;

use App\Models\PropertyCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyCategory::create([
            "category_name" => "Commercial Property",
        ]);
        PropertyCategory::create([
            "category_name" => "Residential Property",
        ]);
    }
}
