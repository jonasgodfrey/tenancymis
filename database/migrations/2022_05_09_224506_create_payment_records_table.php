<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id');
            $table->bigInteger('unit_id');
            $table->bigInteger('tenant_id');
            $table->bigInteger('paycat_id');
            $table->bigInteger('paystatus_id');
            $table->string('amount');
            $table->string('paydate');
            $table->string('startdate');
            $table->string('duedate');
            $table->string('duration');
            $table->string('duration_status');
            $table->string('paymethod');
            $table->string('evidence_image');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_records');
    }
};
