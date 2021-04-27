<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_form_structure')->unsigned();
            $table->bigInteger('id_input_attribute')->unsigned();
            $table->string('title');
            $table->timestamps();
        });

        Schema::table('form_inputs', function (Blueprint $table) {
            $table->foreign('id_input_attribute')->references('id')->on('input_attributes');
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
        Schema::dropIfExists('form_inputs');
    }
}
