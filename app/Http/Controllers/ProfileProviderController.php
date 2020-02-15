<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $user = Auth::user();
        $provider = $user->provider()->first();
        $recipe = Recipe::where('provider_id', $provider->id);
        $address = $user->address()->first();

        $srcImg = 'default.jpg';

        if ($user->avatar) {
            $srcImg = $user->avatar;
        }

        return view('profile.provider.index',[
            'user' => $user,
            'provider' => $provider,
            'recipe' => $recipe,
            'srcImg' =>$srcImg,
            'address' => $address
        ]);
    }
}
