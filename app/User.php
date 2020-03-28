<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
