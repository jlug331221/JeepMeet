<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Get the user who created the comment.
     * 
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User')->select(['id', 'username', 'avatar']);
    }
    
    /**
     * Get the parent post for the comment.
     * 
     * @return App\Models\Post
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}