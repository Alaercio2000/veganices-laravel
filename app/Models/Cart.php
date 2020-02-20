<?php

namespace App\Models;

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
}
