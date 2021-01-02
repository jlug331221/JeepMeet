<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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
        return $this->belongsTo('App\User')->select(['id', 'username', 'avatar']);
    }

    /**
     * Get the parent thread of the post.
     *
     * @return App\Models\Thread
     */
    public function thread()
    {
        return $this->belongsTo('App\Models\Thread')->select(['id', 'title']);
    }

    /**
     * Get the comments of a particular post.
     *
     * @return App\Forum_Models\Comment
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
