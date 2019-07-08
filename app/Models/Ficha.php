<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'nome', 'sobrenome', 'titulo','subtitulo',
        'universidade', 'cidade', 'ano', 'nivel','departamento',
        'curso', 'nome_orientador', 'sobrenome_orientador', 
        'assunto1', 'assunto2', 'assunto3', 'assunto4', 'assunto5',
    ];
}
