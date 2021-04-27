<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\FichaFormat;
use Auth;

class FichaFormatRepository extends BaseRepository
{
	public function __construct(FichaFormat $fichaFormat)
    {
        $this->model = $fichaFormat;
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