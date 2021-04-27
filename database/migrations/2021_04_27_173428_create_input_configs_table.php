<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_form_input')->unsigned();
            $table->string('config');
            $table->string('action');
            $table->timestamps();
        });

        Schema::table('input_configs', function (Blueprint $table) {
            $table->foreign('id_form_input')->references('id')->on('form_inputs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_configs');
    }
}
