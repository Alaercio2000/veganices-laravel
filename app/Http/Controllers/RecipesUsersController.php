<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipesUsersController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        $categoryRecipes = CategoryRecipe::all();

        $data = [
            'recipes' => $recipes,
            'categoryRecipes' => $categoryRecipes
        ];

        return view('recipes.user.index', $data);
    }

    public function show( $id)
    {
        // dd ($recipe);

        $existCart = false;
        $carts = Auth::user()->cart()->get();
        foreach($carts as $cart){
            if ($cart->recipe_id == $id) {
                $existCart = true;
            }

        }

        $recipe = Recipe::find($id);
        return view('recipes.user.show', [
            'recipe' => $recipe,
            'existCart' => $existCart
        ]);

    }
}
