<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Provider;
use App\Models\Recipe;
use App\Models\CategoryRecipe;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $recipes = Recipe::orderBy("created_at")->paginate(4);
        $categoryRecipes = CategoryRecipe::all();

        $data = [
            'recipes' => $recipes,
            'categoryRecipes' => $categoryRecipes
        ];

        return view('home.index', $data);

    }
}
