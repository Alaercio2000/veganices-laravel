<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

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
}
