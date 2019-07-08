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
    
    public function getFicha($id) 
    {
    	$fichas = $this->model->where('id', $id)->get();
  
        return $fichas;
    }

    public function getFichaUser($id_user) 
    {
    	$fichas = $this->model->where('id_user', $id_user)->get();
  
        return $fichas;
    }
    
}