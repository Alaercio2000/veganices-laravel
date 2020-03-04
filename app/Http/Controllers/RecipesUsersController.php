<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use App\Models\Favorite;

class RecipesUsersController extends Controller
{
    public function index()
    {
        $recipes = Recipe::paginate(5);
        $categoryRecipes = CategoryRecipe::all();

        $favorites  = false;

        if (!Auth::guest()) {
            $favorites = Auth::user()->favorites()->get();
        }

        $data = [
            'recipes' => $recipes,
            'categoryRecipes' => $categoryRecipes,
            'favorites' => $favorites,
        ];

        return view('recipes.user.index', $data);
    }

    public function show( $id)
    {
        // dd ($recipe);

        $isFavorite  = false;

        $existCart = false;
        if(!Auth::guest()){
            $carts = Auth::user()->cart()->get();

            foreach($carts as $cart){
                if ($cart->recipe_id == $id && !$cart->concluded) {
                    $existCart = true;
                }
            }
            $favorites = Auth::user()->favorites()->where('id' , $id)->first();
        }

        if ($favorites) {
            $isFavorite = true;
        }

        $recipe = Recipe::find($id);
        return view('recipes.user.show', [
            'recipe' => $recipe,
            'existCart' => $existCart,
            'isFavorite' => $isFavorite
        ]);

    }
}
