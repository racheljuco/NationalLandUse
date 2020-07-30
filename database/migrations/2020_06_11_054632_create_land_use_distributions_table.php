<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandUseDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_use_distributions', function (Blueprint $table) {
            //for a village
            $table->id();
            $table->unsignedBigInteger('land_use_plan_id')->nullable();
            $table->double('village_area',8,2)->default(0);//land use plan name
            $table->double('projected_households',8,2)->default(0);
            $table->year('year_preparation');
            $table->double('settlement',8,2)->default(0);
            $table->double('social_service',8,2)->default(0);
            $table->double('agriculture',8,2)->default(0);
            $table->double('agriculture_settlement',8,2)->default(0);
            $table->double('grazing',8,2)->default(0);
            $table->double('utilization_forest',8,2)->default(0);
            $table->double('reserved_forest',8,2)->default(0);
            $table->double('other_reserved_land',8,2)->default(0);
            $table->double('water_sources',8,2)->default(0);
            $table->double('wma',8,2)->default(0);
            $table->double('land_bank',8,2)->default(0);
            $table->double('land_investment',8,2)->default(0);
            $table->double('quarrying',8,2)->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('land_use_plan_id')->references('id')->on('land_use_plans')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_use_distributions');
    }
}
