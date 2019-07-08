<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_ficha', 'status',
    ];
}
