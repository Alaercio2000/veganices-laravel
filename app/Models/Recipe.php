<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Recipe extends Model
{
    use Notifiable,
        SoftDeletes;

    protected $table = 'recipes';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'provider_id',
        'name',
        'image',
        'ingredients',
        'preparation_method',
        'category_recipes_id',
        'price'
    ];
}
