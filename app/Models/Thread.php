<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    /**
     * Get the user who created the thread.
     * 
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User')->select(['id', 'username', 'avatar']);
    }

    /**
    * Get the posts for a particular thread.
    *
    * @return App\Models\Post
    */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}