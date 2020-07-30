<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCultivatedLandYieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultivated_land_yield', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_use_plan_id');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('crop_id')->nullable();
            $table->double('actual_cultivated_land',8,2)->default(0.0);
            $table->double('possible_yield',8,2)->default(0.0);
            $table->foreign('crop_id')->references('id')->on('crops')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('cultivated_land_yield');
    }
}
