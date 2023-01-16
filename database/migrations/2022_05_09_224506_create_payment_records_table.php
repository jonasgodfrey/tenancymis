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
            $table->string('payment_reference');
            $table->unsignedBigInteger("unit_id");
            $table->foreign('unit_id')->references('id')->on('units');
            $table->unsignedBigInteger("tenant_id");
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->bigInteger('paycat_id')->unsigned();
            $table->unsignedBigInteger("payment_status_id");
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses');
            $table->double('amount', 14, 2);
            $table->double('discount', 14, 2)->default(0);
            $table->date('payment_date')->useCurrent();
            $table->date('startdate');
            $table->date('duedate');
            $table->string('duration')->nullable();
            $table->string('duration_status')->nullable();
            $table->string('paymethod')->nullable();
            $table->string('evidence_image')->nullable();
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
