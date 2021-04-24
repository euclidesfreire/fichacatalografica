<?php

namespace App\Core\Facades;

use Illuminate\Support\Facades\Facade;

class Login extends Facade 
{
	protected static function getFacadeAccessor()
	{
		return 'LoginContract';
	}
}