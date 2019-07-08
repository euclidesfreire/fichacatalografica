<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ficha')->unsigned();
            $table->bigInteger('id_manager')->unsigned();
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('status', function (Blueprint $table) {
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
        Schema::dropIfExists('status');
    }
}
