<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\ValueInput;
use Auth;

class ValueInputRepository extends BaseRepository
{
	public function __construct(ValueInput $valueInput)
    {
        $this->model = $valueInput;
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