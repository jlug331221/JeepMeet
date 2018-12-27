<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function create()
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

        // Send and email to jeepmeet.com about a received Contact Us message

        // Save the request data to the database

        // Alert the user that their message has been received or failed


        // Mail::send('emails.contact-message', [ 
        //     'msg' => $request->message
        // ], function ($mail) use($request) {
        //     $mail->from($request->email, $request->first);

        //     $mail->to('drw0469@yahoo.com');
        // });

        return redirect()->back->with('flash_message', 'Thank you for your message.');

    }
}

