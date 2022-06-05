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
            $table->bigInteger('property_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('tenant_id')->unsigned();
            $table->bigInteger('paycat_id')->unsigned();
            $table->bigInteger('paystatus_id')->unsigned();
            $table->string('amount');
            $table->timestamp('paydate')->useCurrent();
            $table->timestamp('startdate')->useCurrent();
            $table->timestamp('duedate')->useCurrent();
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
