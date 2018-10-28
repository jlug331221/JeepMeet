<?php

namespace App\User_Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
    * Get the threads for a particular user.
    *
    * @return App\Forum_Models\Thread
    */
    public function threads()
    {
        return $this->hasMany('App\Forum_Models\Thread');
    }

    /**
     * Get the posts for a particular user.
     * 
     * @return App\Forum_Models\Post
     */
    public function posts()
    {
        return $this->hasMany('App\Forum_Models\Post');
    }

    /**
     * Get the comments made by a particular user.
     * 
     * @return App\Forum_Models\Comment
     */
    public function comments()
    {
        return $this->hasMany('App\Forum_Models\Comment');
    }
}
