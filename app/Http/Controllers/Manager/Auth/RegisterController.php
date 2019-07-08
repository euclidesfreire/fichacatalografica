<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Models\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Repositories\ManagerRepository;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/manager';

    protected $managerRepository;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ManagerRepository $manager)
    {
        $this->middleware('guest:manager');
        $this->managerRepository = $manager;
    }

    public function showRegistrationForm(){
        return view('manager.auth.register');
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

        $manager = $this->managerRepository->create($data);

        if($manager)
            $this->guard()->login($manager);

        return redirect()->route('manager.home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'cpf', 'max:11', 'unique:managers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Manager::create([
            'nome' => $data['nome'],
            'cpf' => $data['cpf'],
            'password' => $data['password'],
        ]);
    }

    protected function guard()
    {
        return Auth::guard('manager');
    }
    
}