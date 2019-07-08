<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cdu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_ficha', 'id_manager', 'cdu',
    ];
}
