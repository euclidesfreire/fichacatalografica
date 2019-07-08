<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Models\Ficha;

class FichaRepository extends BaseRepository
{
	public function __construct(Ficha $ficha)
    {
        $this->model = $ficha;
    }
    
    public function getFicha() 
    {

    }
    
}