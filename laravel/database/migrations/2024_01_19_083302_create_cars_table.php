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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_number');
            $table->integer('fuel_tank_capacity');
            $table->double('average_fuel_consumption', 3, 1);
            $table->unsignedBigInteger('car_brand_id');
            $table->unsignedBigInteger('car_model_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('car_brand_id')->references('id')->on('car_brands');
            $table->foreign('car_model_id')->references('id')->on('car_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
