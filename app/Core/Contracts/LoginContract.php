<?php

namespace App\Core\Contracts;

interface LoginContract {

	/**
	*Get the current authenticade user
	*
	* @return $user
	*/  
	public function getLogin();

	/**
	*Loggin
	*
	* @return $login
	*/  
	public function attemp($credentials);

	/**
	* Role Auth Guard
	*
	* @return $guard
	*/  
	public function role($login);

	/**
	* Check if the authenticated user has the given permission.
	 *
     * @param string $rota
     *
     * @return bool
	*/  
	public function haspermission($rota);


}