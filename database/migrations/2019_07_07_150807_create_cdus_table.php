<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ficha')->unsigned();
            $table->bigInteger('id_manager')->unsigned();
            $table->string('cdu')->unique();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('cdus', function (Blueprint $table) {
            $table->foreign('id_ficha')->references('id')->on('fichas');
            $table->foreign('id_manager')->references('id')->on('managers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cdus');
    }
}
