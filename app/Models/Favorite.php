<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Favorite extends Model
{
    use Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $favorite = false;

    protected $fillable = [
        'user_id', 'recipe_id'
    ];

    public function recipe(){
        return $this->belongsToMany(Recipe::class,'id','recipe_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'id', 'user_id');
    }
}
