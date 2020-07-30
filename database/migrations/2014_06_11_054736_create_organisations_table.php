<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organisation_type_id')->nullable();
            $table->string('name',45);
            $table->string('address')->nullable();
            $table->string('phone_number',15)->nullable();
            $table->string('email',45)->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('organisation_type_id')->references('id')->on('organisation_types')->onUpdate('cascade')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisations');
    }
}
