<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\InputConfig;
use Auth;

class InputConfigRepository extends BaseRepository
{
	public function __construct(InputConfig $inputConfig)
    {
        $this->model = $inputConfig;
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