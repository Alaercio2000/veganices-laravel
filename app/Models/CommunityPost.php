<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use SoftDeletes;

class CommunityPost extends Model
{
    protected $table = 'community_posts';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'user_id',
        'type',
        'parent_id',
        'title',
        'content',
        'created_at'
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}