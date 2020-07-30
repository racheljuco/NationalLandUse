<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaUnderIrrigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_under_irrigations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_use_plan_id');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->double('area_irrigation',8,2)->default(0.0);
            $table->double('area_under_irrigation',8,2)->default(0.0);
            $table->double('perfomance',8,2)->default(0.0);
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
        Schema::dropIfExists('area_under_irrigations');
    }
}
