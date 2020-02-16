<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\CategoryRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{

    public function filter($category)
    {
        $recipes = Recipe::whereRaw("category_recipes_id IN ({$category})")->get()->toArray();

        echo json_encode($recipes);
    }

}
