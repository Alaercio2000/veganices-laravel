<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Models\State_brazil;

class ProfileProviderController extends Controller
{

    public function index(){

        $user = Auth::user();
        $provider = $user->provider()->first();
        $recipes = $provider->recipe()->get();
        $address = $user->address()->first();
        $state = State_brazil::find($address->state_id);

        $srcImg = 'default.jpg';

        if ($user->avatar) {
            $srcImg = $user->avatar;
        }

        return view('profile.provider.index',[
            'user' => $user,
            'provider' => $provider,
            'recipes' => $recipes,
            'srcImg' =>$srcImg,
            'address' => $address,
            'state' => $state
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
            'date_opening' => 'date',
            'phone' => 'min:14|max:15',
        ], [
            'required' => 'Esse campo é obrigatório',
            'max' => 'O número máximo de caracteres é de :max',
            'date' => 'Digite uma data válida',
            'phone.min' => 'Digite um telefone válido',
            'phone.max' => 'Digite um telefone válido'
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
        $provider->date_opening = $data['date_opening'];

        $user->phone = $data['phone'];

        if ($data['cnpj'] != $provider->cnpj) {
            $request->validate([
                'cnpj' => 'required|cnpj|unique:providers'
            ], [
                'required' => 'Esse campo é obrigatório',
                'cnpj' => 'Digite um CNPJ válido',
                'unique' => 'Esse CNPJ já foi cadastrado'
            ]);

            $provider->cnpj = $data['cnpj'];
        }


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
