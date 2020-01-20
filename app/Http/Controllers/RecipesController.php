<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function recipes(){
        return view('recipes');
    }

    public function item()
    {
        return view('item');
    }
}
