<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Provider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

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
            'email' => 'required|string|email|max:191|unique:users',
            'cnpj' => 'required|cnpj|unique:providers',
            'password' => 'required|string|min:4|confirmed',
            'phone' => 'required|string|max:14|min:14',
            'date_opening' =>'required|max:10|min:10'
        ],
        [
            'email.required' => 'Esse campo é obrigatório',
            'email.unique' => 'Esse email já existir',
            'email.email' => 'Digite um email válido',
            'email.max' => 'Máximo de :max caracteres',
            'cnpj.required'=>'Esse campo é obrigatório',
            'cnpj.cnpj'=>'Digite um CNPJ válido',
            'cnpj.unique:provider'=>'Já existir esse CNPJ',
            'password.required'=>'Esse campo é obrigatório',
            'password.min'=>'A senha deve ter :min ou mais caracteres',
            'password.confirmed'=>'As senhas deve ser iguais',
            'phone.required'=>'Esse campo é obrigatório',
            'phone.max'=>'Digite um telefone válido',
            'phone.min'=>'Digite um telefone válido',
            'date_opening.required'=>'Esse campo é obrigatório',
            'date_opening.max'=>'Digite uma data válida',
            'date_opening.min'=>'Digite uma data válida'
        ]);

        $cnpj_debug = str_replace(['.', '-', '/'], '', $request->input('cnpj'));
        $url = 'https://www.receitaws.com.br/v1/cnpj/' . $cnpj_debug;

        $reply_url = json_decode(file_get_contents($url));

        if ($reply_url->situacao != "ATIVA") {
            return redirect()->route('register.provider')
                ->with('cnpj' , 'Essa empresa não está mais ativada')
                ->withInput();
        }

        $data = $request->only([
            'email',
            'password',
            'password_confirmation',
            'phone',
            'cnpj',
            'date_opening'
        ]);

        if ($reply_url->abertura != date('d/m/Y', strtotime($data['date_opening']))) {
            return redirect()->route('register.provider')
                ->with('date_opening' , 'A data de criação está errada')
                ->withInput();
        }
        $data['name'] = $reply_url->nome;

        $user = $this->createUser($data);

        $data['user_id'] = $user->id;

        $provider = $this->create($data);

        // $address = [
        //     'cep' => $reply_url->cep,
        //     'neighborhood' => $reply_url->bairro,
        //     'street' => $reply_url->logradouro,
        //     'number' => $reply_url->numero,
        //     'county' => $reply_url->municipio,
        //     'uf' => $reply_url->uf,
        //     'complement' => $reply_url->complemento,
        // ];

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
        return Provider::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'cnpj' => $data['cnpj'],
            'phone' => $data['phone'],
            'date_opening' => $data['date_opening'],
            'user_id' => $data['user_id'],
        ]);
    }

    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'provider' => true,
        ]);
    }
}
