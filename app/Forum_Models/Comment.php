<?php

namespace App\Forum_Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the user who created the comment.
     * 
     * @return App\User_Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\User_Models\User');
    }
    
    /**
     * Get the parent post for the comment.
     * 
     * @return App\Forum_Models\Post
     */
    public function post()
    {
        return $this->belongsTo('App\Forum_Models\Post');
    }
}
