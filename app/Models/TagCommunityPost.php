<?php

namespace App\Models;
use App\User;
use SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class TagCommunityPost extends Model
{
    protected $table = 'tags_posts';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'user_id',
        'community_id'
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
