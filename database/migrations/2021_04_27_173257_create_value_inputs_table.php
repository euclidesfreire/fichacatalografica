<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValueInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('value_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_input_attribute')->unsigned();
            $table->string('value');
            $table->timestamps();
        });

        Schema::table('value_inputs', function (Blueprint $table) {
            $table->foreign('id_input_attribute')->references('id')->on('input_attributes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('value_inputs');
    }
}
