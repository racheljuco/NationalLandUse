<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShapefilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shapefiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_use_plan_id')->nullable();
            $table->string("name",30);
            $table->string("filepath",45);
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
        Schema::dropIfExists('shapefiles');
    }
}
