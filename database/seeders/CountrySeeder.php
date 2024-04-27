<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insertOrIgnore([
            [
                'country' => 'Nigeria',
            ],
            [
                'country' => 'Kenya',
            ],
            [
                'country' => 'Rwanda',
            ],
            [
                'country' => 'Ghana',
            ],
            [
                'country' => 'South Africa',
            ],
        ]);
    }
}
