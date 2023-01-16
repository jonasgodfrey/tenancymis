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
                "payment_category_name" => "Rent",
            ],
            [
                "payment_category_name" => "Facility Fee",
            ],
            [
                "payment_category_name" => "Taxes",
            ],
        ]);
    }
}
