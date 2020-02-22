<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Provider;
use App\Models\Recipe;

class CartsController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $cart = Cart::where('user_id',$id)->get();

        return view('cart.index',[
            'cart' => $cart
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

    public function updateQuantity(Request $request ,$id){
        $item = Cart::find($id);
        $quantity = $request->input('quantity');

        if($quantity == 0){
            $item->deleted_at = NOW();
        }

        $item->quantity = $quantity;
        $item->save();
        return redirect()->route('cart.index');
    }

    public function destroyRecipe($recipe_id){

        Cart::where([
            ['user_id',Auth::user()->id],
            ['recipe_id' , $recipe_id]
        ])->update([
            'deleted_at' => NOW()
        ]);

        return redirect()->route('user.recipe.show',['id' => $recipe_id]);
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart->deleted_at = NOW();
        $cart->save();
        return redirect()->route('cart.index');
    }
}
