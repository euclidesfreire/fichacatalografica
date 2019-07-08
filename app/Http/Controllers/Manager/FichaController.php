<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FichaController extends Controller
{
    public function __construct()
	{
    	$this->middleware('auth:manager');
	}
}
