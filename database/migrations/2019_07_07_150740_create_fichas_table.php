<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('id_user')->unsigned();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('universidade');
            $table->string('cidade');
            $table->string('ano');
            $table->string('nivel');
            $table->string('departamento');
            $table->string('curso');
            $table->string('nome_orientador');
            $table->string('sobrenome_orientador');
            $table->text('assunto1');
            $table->text('assunto2');
            $table->text('assunto3');
            $table->text('assunto4');
            $table->text('assunto5');
            $table->timestamps();
        });

        Schema::table('fichas', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichas');
    }
}
