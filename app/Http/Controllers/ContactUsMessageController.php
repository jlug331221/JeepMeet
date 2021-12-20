<?php

namespace App\Http\Controllers;

use App\Models\ContactUsMessage;
use App\Http\Requests\ContactUsMessageRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class ContactUsMessageController extends Controller
{
    /**
     * Display the 'Contact Us' page
     * 
     * @return Illuminate\View
     */
    public function index()
    {
        return Inertia::render('Contact');
    }

    /**
     * Sends an email to the JeepMeet admin email address.
     * 
     * @param ContactUsMessageRequest - Request object that is validated
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function submitEmailAndPersistMessage(ContactUsMessageRequest $request)
    {
        // Passed ContactUsMessageRequest validation if we have reached this point 
        try {
            // Send an email to jeepmeetup@gmail.com about a received Contact Us message
            ContactUsMessage::sendMailToAdmin($request);

            // Alert the user that their message has been received
            return redirect('/contact')->with('success', 'Thank you for your message. ' .
                'If we need to respond, we will do so in a timely manner.');
        }
        catch(Exception $e) {
            // Alert the user that their message has failed to send
            return redirect('/contact')->with('error', 'There appears to be a problem sending your' .
                'message. Please try again.');
        }
    }
}