<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CategoryRecipe extends Model
{
    use Notifiable;

    protected $table = 'category_recipes';

    protected $dates = [];

    protected $fillable = [
        'name'
    ];
}
