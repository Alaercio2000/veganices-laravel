<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Notifiable , SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'category_id', 'title', 'content'
    ];

    public function user(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
