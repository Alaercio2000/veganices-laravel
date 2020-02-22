<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'recipe_id'
    ];

    public function recipe(){
        return $this->belongsTo(Recipe::class,'recipe_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id', 'id');
    }
}
