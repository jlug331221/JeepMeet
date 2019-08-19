<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsMessage extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'contact_message'];
}
