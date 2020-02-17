<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requests extends Model
{
    use Notifiable , SoftDeletes;

    protected $table = 'requests';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'provider_id', 'recipe_id', 'status_id', 'price'
    ];
}
