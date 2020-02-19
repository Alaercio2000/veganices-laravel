<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileProviderController extends Controller
{

    public function index(){

        $user = Auth::user();
        $provider = $user->provider()->first();
        $recipes = $provider->recipe()->get();
        $address = $user->address()->first();

        $srcImg = 'default.jpg';

        if ($user->avatar) {
            $srcImg = $user->avatar;
        }

        return view('profile.provider.index',[
            'user' => $user,
            'provider' => $provider,
            'recipes' => $recipes,
            'srcImg' =>$srcImg,
            'address' => $address
        ]);
    }

    public function edit(){
        $user = Auth::user();
        $provider = Auth::user()->provider()->first();

        return view('profile.provider.edit',[
            'provider' => $provider,
            'user' => $user
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|max:191',
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é de :max'
        ]);

        $user = User::find(Auth::user()->id);
        $provider = $user->provider()->first();

        $data = $request->only([
            'name',
            'email',
            'cnpj',
            'phone',
            'date_opening',
            'password_old',
            'password',
            'password_confirmation'
        ]);

        $provider->name = $data['name'];

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

        if (!empty($data['cnpj'])) {
            $request->validate([
                'cnpj' => 'cnpj'
            ], [
                'cnpj' => 'Digite um cnpj válido'
            ]);

            $provider->cnpj = $data['cnpj'];
        }

        if (!empty($data['date_opening'])) {
            $request->validate([
                'date_opening' => 'date'
            ], [
                'date' => 'Digite uma data válida'
            ]);

            $provider->date_opening = $data['date_opening'];
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
                        'password' => 'min:4|max:191|confirmed'
                    ], [
                        'min' => 'O número mínimo de caracteres é :min',
                        'max' => 'O número máximo de caracteres é :max',
                        'confirmed' => 'As senhas devem ser iguais'
                    ]);

                    $user->password = Hash::make($data['password']);
                }
            } else {
                return redirect()->route('profile.provider.edit')
                    ->with('errorPassword', 'A senha está errada');
            }
        }else{
            if (!empty($data['password'])) {
                return redirect()->route('profile.provider.edit')
                    ->with('errorPasswordOld', 'Preencha a senha atual');
            }
        }

        $provider->save();
        $user->save();
        return redirect()->route('profile.provider.edit')
            ->with('success', 'Dados atualizados com sucesso');
    }
}
