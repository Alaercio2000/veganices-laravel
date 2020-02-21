<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Recipe;

class CartsController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $cart = Cart::where('user_id',$id)->get();

        $recipes_id = [];

        foreach($cart->all() as $item){
            array_push($recipes_id,$item->recipe_id);
        }

        $products = Recipe::whereIn('id',$recipes_id)->get();

        return view('cart.index',[
            'products' => $products
        ]);
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
