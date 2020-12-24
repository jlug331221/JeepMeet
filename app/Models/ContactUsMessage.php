<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\ContactUsMessageRequest;

use Mail;

class ContactUsMessage extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'contact_message'];

    /**
     * Sends an email to the JeepMeet admin with the request object data.
     * 
     * @param $request - Request object
     * 
     * @return void
     */
    public static function sendMailToAdmin(ContactUsMessageRequest $request) 
    {
        Mail::send('emails.contact-us', [
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'      => $request->input('email'),
            'contact_message'    => $request->input('message')
        ], function($message) use ($request) {
            $message->from($request->input('email'));
            
            $message->to('jeepmeetup@gmail.com')->subject('New Contact Us Message');
        });
    }
}