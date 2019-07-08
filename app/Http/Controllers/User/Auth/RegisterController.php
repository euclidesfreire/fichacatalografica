<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    protected $userRepository;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->middleware('guest:user');
        $this->userRepository = $user;
    }

    public function showRegistrationForm(){
        return view('user.auth.register');
    }

    public function postRegister(){

    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = array(
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'password'=> $request->input('password'),
        );

        $user = $this->userRepository->create($data);

        if($user)
            $this->guard()->login($user);

        return redirect()->route('user.home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \fichacatalografica\User
     */
 
    protected function guard()
    {
        return Auth::guard('user');
    }
}
