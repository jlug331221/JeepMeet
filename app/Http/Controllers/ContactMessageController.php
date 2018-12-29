<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Send an email to jeepmeet.com about a received Contact Us message
        Mail::send('emails.contact-admin', array(
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'email'      => $request->get('email'),
            'message'    => $request->get('message')
        ), function($message) use ($request) {
            $message->from($request->get('email'));
            $message->to('jeepmeetup@gmail.com')->subject('New Contact Message');
        });

        // Save the request data to the database

        // Alert the user that their message has been received or failed




        return redirect()->back->with('flash_message', 'Thank you for your message.');

    }
}

