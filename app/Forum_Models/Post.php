<?php

namespace App\Forum_Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content'
    ];

    /**
     * Get the user who created the post.
     * 
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the parent thread of the post.
     * 
     * @return App\Forum_Models\Thread
     */
    public function thread()
    {
        return $this->belongsTo('App\Forum_Models\Thread');
    }
    
    /**
     * Get the comments of a particular post.
     * 
     * @return App\Forum_Models\Comment
     */
    public function comments()
    {
        return $this->hasMany('App\Forum_Models\Comment');
    }
}