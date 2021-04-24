<?php

namespace App\Core\Services;

use App\Core\Contracts\LoginContract;
use App\Repositories\LoginRepository;
use App\Repositories\EstruturaRepository;

class LoginService implements LoginContract 
{
	/**
     * The currently authenticated user.
     *
     * @var Array
     */
    protected $login;

	protected $loginRepository;
	protected $estruturaRepository;

	public function __construct
	(
		LoginRepository $login,
		EstruturaRepository $estrutura
	)
	{
		$this->loginRepository = $login;
		$this->estruturaRepository = $estrutura;
	} 

	/**
	*Get the current authenticade user
	*
	* @return $login
	*/  
	public function getLogin(){

	}

	/**
	*Loggin
	*
	* @return $login
	*/  
	public function attemp($credentials)
	{
		$login = $this->loginRepository->attemp($credentials);

		return $login;
	}

	/**
	* Role Auth Guard
	*
	* @return $guard
	*/  
	public function role($login)
	{
		$structResponsible = $this->estruturaRepository->structResponsible($login);

    	if($structResponsible){
    		$guard = 'manager';
     	} else {
     		$guard = 'user';
     	}

     	return $guard;
	}

	/**
	* Check if the authenticated user has the given permission.
	 *
     * @param string $rota
     *
     * @return bool
	*/  
	public function haspermission($rota){
		

	}
}