<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\FichaStructure;
use Auth;

class FichaStructureRepository extends BaseRepository
{
	public function __construct(FichaStructure $fichaStructure)
    {
        $this->model = $fichaStructure;
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