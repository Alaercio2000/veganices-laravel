<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index(){
        return view('register.user.index');
    }

    public function register(Request $request){
        $this->validate($request ,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:4|confirmed'
        ],[
            'name.required'=>'Esse campo é obrigatório',
            'name.max'=>'Máximo de :max caracteres',
            'email.unique:users'=>'Já existir esse email',
            'email.required'=>'Esse campo é obrigatório',
            'email.email'=>'Digite um email válido',
            'email.max'=>'Máximo de :max caracteres',
            'password.required'=>'Esse campo é obrigatório',
            'password.min'=>'A senha deve ter :min ou mais caracteres',
            'password.confirmed'=>'A senha deve ser iguais'
        ]);
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        $user = $this->create($data);

        Auth::login($user);

        return redirect()->route('home.index');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
