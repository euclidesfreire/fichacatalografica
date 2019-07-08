<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Models\Manager;

class ManagerRepository extends BaseRepository
{
	public function __construct(Manager $manager)
    {
        $this->model = $manager;
    }
    
    public function getManager() 
    {

    }

    public function attemp($credentials)
    {
        $password = Hash::make($credentials['password']); 

    	$user = $this->model->where('cpf', $credentials['cpf'])
        		->where('password', $password)->first();
  
        return $user;
    }
    
}