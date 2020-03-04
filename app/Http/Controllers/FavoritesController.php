<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\Favorite;
use App\User;

class FavoritesController extends Controller
{
    public function store($recipe_id , $user_id){

        $favorite = Favorite::create([
            'user_id' => $user_id,
            'recipe_id' => $recipe_id
        ]);

        return json_encode($favorite);
    }

    public function destroy($recipe_id,$user_id){

        $favorite = Favorite::where([
            ['user_id',$user_id],
            ['recipe_id' , $recipe_id]
        ])->delete();

        return json_encode($favorite);
    }
}
