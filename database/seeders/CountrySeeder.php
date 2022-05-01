<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use GuzzleHttp\Promise\Create;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'Nigeria',
        ]);
        Country::create([
            'name' => 'Kenya',
        ]);
        Country::create([
            'name' => 'Rwanda',
        ]);
        Country::create([
            'name' => 'Ghana',
        ]);
        Country::create([
            'name' => 'South Africa',
        ]);
    }
}
