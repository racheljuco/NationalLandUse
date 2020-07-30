<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandUsePlanFarmingMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_use_plan_farming_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_use_plan_id');
            $table->unsignedBigInteger('farming_method_id');
            $table->foreign('land_use_plan_id')->references('id')->on('land_use_plans')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('farming_method_id')->references('id')->on('farming_methods')->onUpdate('cascade')->onDelete('restrict');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_use_plan_farming_methods');
    }
}
