<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGazetteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gazette', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_use_plan_id')->nullable();
            $table->string("gn_number",15);
            $table->string("title",45);
            $table->date("published_date")->nullable();
            $table->date("expired_date")->nullable();
            $table->foreign('land_use_plan_id')->references('id')->on('land_use_plans')->onUpdate('cascade')->onDelete('restrict');
            $table->softDeletes();
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
        Schema::dropIfExists('gazette');
    }
}
