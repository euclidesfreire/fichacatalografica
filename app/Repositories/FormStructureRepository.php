<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\FormStructure;
use Auth;

class FormStructureRepository extends BaseRepository
{
	public function __construct(FormStructure $formStructure)
    {
        $this->model = $formStructure;
    }

    /**
    * Verificar dados do Login
    *
    * @param $param 
    *
    * @return $return
    */
    public function functionExemplo($var)
    {

    }

}