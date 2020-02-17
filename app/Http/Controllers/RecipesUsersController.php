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
        $recipe = Recipe::find($id);
        return view('recipes.user.show', [
            'recipe' => $recipe
        ]);

    }
}
