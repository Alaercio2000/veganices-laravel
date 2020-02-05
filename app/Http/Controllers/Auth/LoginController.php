<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

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

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login.index');
    }

    public function authenticade(Request $request)
    {
        $validator = $this->validate($request , [
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:4|max:191'
        ],[
            'email.required' => 'Esse campo é obrigatório',
            'email.email' => 'Digite um email válido',
            'email.max' => 'Máximo de :max caracteres',
            'password.required' => 'Esse campo é obrigatório',
            'password.min' => 'A senha deve ter :min ou mais caracteres',
            'email.max' => 'Máximo de :max caracteres',
        ]);
        $data = $request->only([
            'email',
            'password'
        ]);

        $remember = $request->input('remember', false);

        if (Auth::attempt($data, $remember)) {
            return redirect()->route('home.index');
        } else {
            return redirect()->route('login')
                ->with('login','E-mail e/ou senha inválidos')
                ->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
