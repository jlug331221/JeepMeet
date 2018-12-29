<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Needs funtion contract
    public function index()
    {
        return view('contact');
    }

    // Needs function contract
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'email'      => 'required|email',
            'message'    => 'required'
        ]);

        // Send an email to jeepmeetup@gmail.com about a received Contact Us message
        Mail::send('emails.contact-admin', [
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'      => $request->input('email'),
            'contact_message'    => $request->input('message')
        ], function($message) use ($request) {
            $message->from($request->input('email'));
            $message->to('jeepmeetup@gmail.com')->subject('New Contact Us Message');
        });

        // Save the request data to the database

        // Alert the user that their message has been received or failed
        return redirect('contact')->with('status', 'Thank you for your message.');
    }
}

