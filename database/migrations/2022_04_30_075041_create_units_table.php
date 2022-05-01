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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('propId')->unsigned();
            $table->bigInteger('typeId')->unsigned();
            $table->string('name');
            $table->string('unitNum');
            $table->string('unitDesc');
            $table->string('leaseAmount');
            $table->string('status');
            $table->string('image');

            $table->foreign('propId')->references('id')->on('properties');
            $table->foreign('typeId')->references('id')->on('unit_types');
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
        Schema::dropIfExists('units');
    }
};
