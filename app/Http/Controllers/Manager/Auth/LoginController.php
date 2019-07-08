<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\ManagerRepository;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/manager';

    protected $managerRepository;
  

    public function __construct(ManagerRepository $manager)
    {
        $this->managerRepository = $manager;
    }

    public function showLoginForm()
    {
         return view('manager.auth.login');
    }
  
    public function authenticate(Request $request)
    {

        $credentials = $request->only('cpf', 'password');

        $manager = $this->managerRepository->attemp($credentials);

        if ($manager) {
            Auth::guard('manager')->login($manager);
            // Authentication passed...
            return redirect()->intended('/manager');
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

        return redirect()->route('manager.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        return redirect('/manager/login');
    }

    protected function guard()
    {
        return Auth::guard('manager');
    }
    
}