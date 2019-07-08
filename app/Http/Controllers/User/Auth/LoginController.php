<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class LoginController extends Controller
{
    

    protected $userRepository;
  

    public function __construct(UserRepository $user)
    {
        $this->userRepository = $user;
    }

    public function showLoginForm()
    {
         return view('user.auth.login');
    }
  
    public function authenticate(Request $request)
    {

        $credentials = $request->only('cpf', 'password');

        $user = $this->userRepository->attemp($credentials);

        if ($user) {
            Auth::guard('user')->login($user);
            // Authentication passed...
            return redirect()->route('user.home');
        }

        // $credentials = $request->only('cpf', 'password');

        // /**
        // * Sobrescrevendo o method attemp, pois o database não
        // * usa o mesmo method de criptografia que o laravel
        // */
        // $user = $this->userRepository->attemp($credentials);

        // if ($user) {

        //     Auth::guard('user')->login($user);
                 
        //    return redirect()->intended('/user');
        // }

        return redirect()->route('user.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect('/user/login');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }
    
}