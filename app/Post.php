<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = [
        'title',
        'body'
    ];

    public function author()
    {
        return $this->belongsToMany('App\User', 'user_posts');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Comment', 'post_comments');
    }
}
