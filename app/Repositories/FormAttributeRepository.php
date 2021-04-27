<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\App\Core\Repository\BaseRepository;
use App\Models\FormAttribute;
use Auth;

class FormAttributeRepository extends BaseRepository
{
	public function __construct(FormAttribute $formAttribute)
    {
        $this->model = $formAttribute;
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