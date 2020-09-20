<?php

namespace App\Forum_Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * Get the user who created the thread.
     * 
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Get the posts for a particular thread.
    *
    * @return App\Forum_Models\Post
    */
    public function posts()
    {
        return $this->hasMany('App\Forum_Models\Post');
    }
}