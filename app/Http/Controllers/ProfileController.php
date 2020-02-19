<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $myRequests = $user->requests()->get();
        $myPosts = $user->post()->get();

        return view('profile.user.index', [
            'user' => $user,
            'myRequests' => $myRequests,
            'myPosts' => $myPosts,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('profile.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|max:191',
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é de :max'
        ]);

        $user = User::find(Auth::user()->id);

        $data = $request->only([
            'name',
            'email',
            'cpf',
            'phone',
            'date_birth',
            'password_old',
            'password',
            'password_confirmation'
        ]);

        $user->name = $data['name'];

        if ($data['email'] != $user->email) {
            $request->validate([
                'email' => 'required|max:191|unique:users'
            ], [
                'required' => 'Esse campo é obrigatório',
                'max' => 'O número máximo de caracteres é de :max',
                'unique' => 'Esse email já foi cadastrado'
            ]);

            $user->email = $data['email'];
        }

        if (!empty($data['cpf'])) {
            $request->validate([
                'cpf' => 'cpf'
            ], [
                'cpf' => 'Digite um cpf válido'
            ]);

            $user->cpf = $data['cpf'];
        }

        if (!empty($data['date_birth'])) {
            $request->validate([
                'date_birth' => 'date'
            ], [
                'date' => 'Digite uma data válida'
            ]);

            $user->date_birth = $data['date_birth'];
        }

        if (!empty($data['phone'])) {
            $request->validate([
                'phone' => 'min:14|max:15'
            ], [
                'min' => 'Digite um telefone válido',
                'max' => 'Digite um telefone válido'
            ]);

            $user->phone = $data['phone'];
        }

        if (!empty($data['password_old'])) {
            if (password_verify($data['password_old'], $user->password)) {
                if (!empty($data['password'])) {
                    $request->validate([
                        'password' => 'min:4|max:40|confirmed'
                    ], [
                        'min' => 'O número mínimo de caracteres é :min',
                        'max' => 'O número máximo de caracteres é :max',
                        'confirmed' => 'As senhas devem ser iguais'
                    ]);

                    $user->password = Hash::make($data['password']);
                }
            } else {
                return redirect()->route('profile.edit')
                    ->with('errorPassword', 'A senha está errada');
            }
        }else{
            if (!empty($data['password'])) {
                return redirect()->route('profile.edit')
                    ->with('errorPasswordOld', 'Preencha a senha atual');
            }
        }

        $user->save();
        return redirect()->route('profile.edit')
            ->with('success', 'Dados atualizados com sucesso');
    }
}
