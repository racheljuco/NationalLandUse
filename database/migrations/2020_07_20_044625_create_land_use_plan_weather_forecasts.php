<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandUsePlanWeatherForecasts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_use_plan_weather_forecasts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_use_plan_id');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->double('low_temperature',8,2)->default(0.0);
            $table->double('high_temperature',8,2)->default(0.0);
            $table->double('low_rainfall',8,2)->default(0.0);
            $table->double('high_rainfall',8,2)->default(0.0);
            $table->foreign('village_id')->references('id')->on('villages')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('land_use_plan_id')->references('id')->on('land_use_plans')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('land_use_plan_weather_forecasts');
    }
}
