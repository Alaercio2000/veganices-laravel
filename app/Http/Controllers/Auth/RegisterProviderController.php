<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Provider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterProviderController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

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

    public function index()
    {
        return view('register.provider.index');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'cnpj' => 'required|cnpj|unique:providers',
            'password' => 'required|string|min:4|confirmed',
            'phone' => 'required|string|max:14|min:14'
        ],
        [
            'cnpj.required'=>'Esse campo é obrigatório',
            'cnpj.cnpj'=>'Digite um CNPJ válido',
            'cnpj.unique:provider'=>'Já existir esse CNPJ',
            'password.required'=>'Esse campo é obrigatório',
            'password.min'=>'A senha deve ter :min ou mais caracteres',
            'password.confirmed'=>'As senhas deve ser iguais',
            'phone.required'=>'Esse campo é obrigatório',
            'phone.max'=>'Digite um telefone válido',
            'phone.min'=>'Digite um telefone válido'
        ]);

        $cnpj_debug = str_replace(['.', '-', '/'], '', $request->input('cnpj'));
        $url = 'https://www.receitaws.com.br/v1/cnpj/' . $cnpj_debug;

        $reply_url = json_decode(file_get_contents($url));

        $name = $reply_url->nome;

        $data = $request->only([
            'password',
            'password_confirmation',
            'phone',
            'cnpj'
        ]);

        echo ("Deu td certo rsrsrs");
        die();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Provider::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cnpj' => $data['cnpj'],
            'phone' => $data['phone'],
        ]);
    }
}
