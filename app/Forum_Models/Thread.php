<?php

namespace App\Forum_Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
    * Get the posts for a particular thread.
    */
    public function posts()
    {
        return $this->hasMany('App\Forum_Models\Post');
    }
}
