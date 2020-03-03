<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class TagCommunityPost extends Model
{
    protected $table = 'tags_community_posts';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'tags_id',
        'community_post_id'
    ];

    public function tags(){
        return $this->belongsTo(Tag::class , 'tags_id' , 'id');
    }

    public function community_posts(){
        return $this->belongsTo(CommunityPost::class , 'community_id' , 'id');
    }
}
