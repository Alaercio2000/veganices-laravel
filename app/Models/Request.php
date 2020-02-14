<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use Notifiable , SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'provider_id', 'recipe_id', 'status_id', 'price'
    ];
}
