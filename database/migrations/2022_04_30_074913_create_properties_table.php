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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('propcatId')->unsigned();
            $table->bigInteger('proptypeId')->unsigned();
            $table->bigInteger('ownerId')->unsigned();
            $table->string('propname');
            $table->string('propaddress');
            $table->string('propdesc', '1000');
            $table->string('email');
            $table->string('phone');
            $table->string('countryId');
            $table->string('stateId');
            $table->string('uploadsDir');

            $table->foreign('ownerId')->references('id')->on('users');
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
        Schema::dropIfExists('properties');
    }
};
