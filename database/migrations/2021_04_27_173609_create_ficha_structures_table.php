<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ficha_type')->unsigned();
            $table->bigInteger('id_ficha_format')->unsigned();
            $table->bigInteger('id_form_structure')->unsigned();
            $table->timestamps();
        });

        Schema::table('ficha_structures', function (Blueprint $table) {
            $table->foreign('id_ficha_type')->references('id')->on('ficha_types');
            $table->foreign('id_ficha_format')->references('id')->on('ficha_formats');
            $table->foreign('id_form_structure')->references('id')->on('form_structures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_structures');
    }
}
