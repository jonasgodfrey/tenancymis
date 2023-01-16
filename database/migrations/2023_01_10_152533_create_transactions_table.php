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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('transaction_reference', 40);
            $table->double('amount', 14, 2);
            $table->string('description', 40);
            $table->unsignedBigInteger("payment_status_id");
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses');
            $table->unsignedBigInteger("transaction_type_id");
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');
            $table->unsignedBigInteger("created_by");
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('transactions');
    }
};
