<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insertOrIgnore([
            [
                "name" => "Abia",
                "countryId" => "1",
            ],
            [
                "name" => "Adamawa",
                "countryId" => "1",
            ],
            [
                "name" => "Akwa Ibom",
                "countryId" => "1",
            ],
            [
                "name" => "Anambra",
                "countryId" => "1",
            ],
            [
                "name" => "Bauchi",
                "countryId" => "1",
            ],
            [
                "name" => "Bayelsa",
                "countryId" => "1",
            ],
            [
                "name" => "Benue",
                "countryId" => "1",
            ],
            [
                "name" => "Borno",
                "countryId" => "1",
            ],
            [
                "name" => "Cross River",
                "countryId" => "1",
            ],
            [
                "name" => "Delta",
                "countryId" => "1",
            ],
            [
                "name" => "Ebonyi",
                "countryId" => "1",
            ],
            [
                "name" => "Edo",
                "countryId" => "1",
            ],
            [
                "name" => "Ekiti",
                "countryId" => "1",
            ],
            [
                "name" => "Enugu",
                "countryId" => "1",
            ],
            [
                "name" => "FCT - Abuja",
                "countryId" => "1",
            ],
            [
                "name" => "Gombe",
                "countryId" => "1",
            ],
            [
                "name" => "Imo",
                "countryId" => "1",
            ],
            [
                "name" => "Jigawa",
                "countryId" => "1",
            ],
            [
                "name" => "Kaduna",
                "countryId" => "1",
            ],
            [
                "name" => "Kano",
                "countryId" => "1",
            ],
            [
                "name" => "Katsina",
                "countryId" => "1",
            ],
            [
                "name" => "Kebbi",
                "countryId" => "1",
            ],
            [
                "name" => "Kogi",
                "countryId" => "1",
            ],
            [
                "name" => "Kwara",
                "countryId" => "1",
            ],
            [
                "name" => "Lagos",
                "countryId" => "1",
            ],
            [
                "name" => "Nasarawa",
                "countryId" => "1",
            ],
            [
                "name" => "Niger",
                "countryId" => "1",
            ],
            [
                "name" => "Ogun",
                "countryId" => "1",
            ],
            [
                "name" => "Ondo",
                "countryId" => "1",
            ],
            [
                "name" => "Osun",
                "countryId" => "1",
            ],
            [
                "name" => "Oyo",
                "countryId" => "1",
            ],
            [
                "name" => "Plateau",
                "countryId" => "1",
            ],
            [
                "name" => "Rivers",
                "countryId" => "1",
            ],
            [
                "name" => "Sokoto",
                "countryId" => "1",
            ],
            [
                "name" => "Taraba",
                "countryId" => "1",
            ],
            [
                "name" => "Yobe",
                "countryId" => "1",
            ],
            [
                "name" => "Zamfara",
                "countryId" => "1",
            ],
        ]);
    }
}
