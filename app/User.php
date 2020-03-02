<?php

namespace App;

use App\Models\Address;
use App\Models\Provider;
use App\Models\Requests;
use App\Models\Post;
use App\Models\Cart;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Favorite;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'phone', 'provider'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(){
        return $this->hasMany(Address::class, 'user_id','id');
    }

    public function provider(){
        return $this->hasOne(Provider::class, 'user_id', 'id');
    }

    public function requests(){
        return $this->hasMany(Requests::class , 'user_id' , 'id');
    }

    public function post(){
        return $this->hasMany(Post::class , 'user_id' , 'id');
    }

    public function cart(){
        return $this->hasMany(Cart::class , 'user_id' , 'id');
    }

    public function favorite(){
        return $this->hasMany(Favorite::class , 'user_id' , 'id');
    }
}
