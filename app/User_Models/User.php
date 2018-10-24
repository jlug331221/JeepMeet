<?php

namespace App\User_Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
    * Get the threads for a particular user.
    */
    public function threads()
    {
        return $this->hasMany('App\Forum_Models\Thread');
    }
}
