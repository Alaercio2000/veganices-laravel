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

    public function validatorCnpjAtivo(Request $request)
    {
        $this->validate($request, [
            'cnpj' => 'required|cnpj',
        ]);

        $cnpj_debug = str_replace(['.', '-', '/'], '', $request->input('cnpj'));
        $url = 'https://www.receitaws.com.br/v1/cnpj/' . $cnpj_debug;

        $reply_url = json_decode(file_get_contents($url));

        $name = $reply_url->nome;
        $cnpj = $reply_url->cnpj;


        if ($reply_url->situacao == "ATIVA") {
            return view('register.provider.ativo', [
                'name' => $name,
                'cnpj' => $cnpj
            ]);
        }
        return redirect()->route('register')
            ->with('cnpj', 'CNPJ não está ativo');
    }

    public function registerIndex()
    {
        return view('register.provider.ativo');
    }

    public function register(Request $request)
    {
        $data = $request->only([
            'cnpj',
            'name',
            'password',
            'password_confirmation',
            'phone'
        ]);

        echo ('<pre>');
        print_r($data);
        echo ('</pre>');
        die();
    }

    protected function validator(array $data)
    {
        return (Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:providers'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'phone' => ['required', 'string', 'max:15', 'min:15']
        ]));
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
