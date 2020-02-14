<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileProviderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:is-provider');
    }

    public function index(){

        $user = User::find(Auth::user()->id);
        $provider = Provider::where('user_id', $user->id)->first();
        $recipe = Recipe::where('provider_id', $provider->id);

        $srcImg = 'default.jpg';

        if ($user->avatar) {
            $srcImg = $user->avatar;
        }

        return view('profile.provider.index',[
            'user' => $user,
            'provider' => $provider,
            'recipe' => $recipe,
            'srcImg' =>$srcImg,
        ]);
    }
}
