<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\FichaType;
use Auth;

class FichaTypeRepository extends BaseRepository
{
	public function __construct(FichaType $fichaType)
    {
        $this->model = $fichaType;
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