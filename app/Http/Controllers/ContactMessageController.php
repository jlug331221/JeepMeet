<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\ContactMessage;

class ContactMessageController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Sends an email to the JeepMeet admin and
     * stores the visitor/user contact message
     * to the database.
     * 
     * @param $request - Request object
     * 
     * @return Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'email'      => 'required|email',
            'message'    => 'required'
        ]);

        try {
            // Send an email to jeepmeetup@gmail.com about a received Contact Us message
            // sendMailToAdmin($request);

            // Save the request data to the database
            ContactMessage::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'contact_message' => $request->input('message')
            ]);

            // Alert the user that their message has been received or failed
            return back()->with('success', 'Thank you for your message.');
        }
        catch(\Exception $e) {
            return back()->with('error', 'There was a problem sending your message. Please try again!');
        }
    }

    /**
     * Sends an email to the JeepMeet admin with the
     * request object data.
     * 
     * @param $request - Request object
     */
    public function sendMailToAdmin(Request $request) 
    {
        Mail::send('emails.contact-admin', [
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
