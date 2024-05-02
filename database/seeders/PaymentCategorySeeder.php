<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_categories')->insertOrIgnore([
            [
                "payment_category" => "Rent",
            ],
            [
                "payment_category" => "Facility Fee",
            ],
            [
                "payment_category" => "Maintenance Fee",
            ],
            [
                "payment_category" => "Outstanding Rent",
            ],
            [
                "payment_category" => "Others",
            ],
        ]);
    }
}
