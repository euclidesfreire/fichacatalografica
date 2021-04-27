<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_form_structure')->unsigned();
            $table->string('attribute');
            $table->string('value');
            $table->timestamps();
        });

        Schema::table('form_attributes', function (Blueprint $table) {
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
        Schema::dropIfExists('form_attributes');
    }
}
