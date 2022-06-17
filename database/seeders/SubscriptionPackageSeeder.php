<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscription_packages')->insertOrIgnore([
            [
                "title" => "Basic Package",
                'duration' => '1',
            ],
            [
                "name" => "Premium Package",
                'duration' => '2',
            ],
        ]);
    }
}
