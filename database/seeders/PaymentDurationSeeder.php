<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_durations')->insertOrIgnore([
            [
                "payment_duration" => "Yearly",
            ],
            [
                "payment_duration" => "Monthly",
            ],
            [
                "payment_duration" => "Weekly",
            ],
            [
                "payment_duration" => "Daily",
            ],
        ]);
    }
}
