<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\InputAttribute;
use Auth;

class InputAttributeRepository extends BaseRepository
{
	public function __construct(InputAttribute $inputAttribute)
    {
        $this->model = $inputAttribute;
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