<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_statuses')->insertOrIgnore([
            [
                "payment_status" => "expired",
            ],
            [
                "payment_status" => "expiring soon",
            ],
            [
                "payment_status" => "active",
            ],
        ]);
    }
}
