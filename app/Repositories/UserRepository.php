<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
	public function __construct(User $user)
    {
        $this->model = $user;
    }
    
    public function getUser() 
    {

    }

    public function attemp($credentials)
    {
        $password = $credentials['password']; 

    	$user = $this->model->where('cpf', $credentials['cpf'])
        		->where('password', $password)->first();
  
        return $user;
    }
    
}