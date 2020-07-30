<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandUsePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_use_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->unsignedBigInteger('land_use_plan_status_id')->nullable();
            $table->string('name',45); // jina la  kijiji au mpango
            $table->string('description')->nullable();
            $table->date('created_date');
            $table->boolean('status')->default(1);
            $table->string("file")->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('village_id')->references('id')->on('villages')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('land_use_plan_status_id')->references('id')->on('land_use_plan_statuses')->onUpdate('cascade')->onDelete('restrict');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_use_plans');
    }
}
