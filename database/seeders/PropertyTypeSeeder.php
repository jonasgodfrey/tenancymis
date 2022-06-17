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
                'propcatId' => '1',
                'typename' => 'Mall',
            ],
            [
                'propcatId' => '1',
                'typename' => 'Shopping Complex',
            ],
            [
                'propcatId' => '1',
                'typename' => 'Plaza',
            ],
        ]);
    }
}
