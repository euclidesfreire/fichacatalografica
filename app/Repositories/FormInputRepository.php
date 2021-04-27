<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\FormInput;
use Auth;

class FormInputRepository extends BaseRepository
{
	public function __construct(FormInput $formInput)
    {
        $this->model = $formInput;
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