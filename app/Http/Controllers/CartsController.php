<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartsController extends Controller
{
    public function index(){
        return view('cart.index');
    }

    public function store($recipe_id){
        $user_id = Auth::user()->id;

        Cart::create([
            'user_id' => $user_id,
            'recipe_id' => $recipe_id
        ]);

        return redirect()->route('user.recipe.show',['id' => $recipe_id]);
    }

    public function destroy($recipe_id){

        Cart::where([
            ['user_id',Auth::user()->id],
            ['recipe_id' , $recipe_id]
        ])->update([
            'deleted_at' => NOW()
        ]);

        return redirect()->route('user.recipe.show',['id' => $recipe_id]);
    }
}
