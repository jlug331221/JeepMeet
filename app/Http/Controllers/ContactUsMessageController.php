<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUsMessage;
use App\Http\Requests\ContactUsMessageRequest;
use Mail;

class ContactUsMessageController extends Controller
{
  /**
   * This function displays the 'Contact Us' page
   * 
   * @return Illuminate\View
   */
  public function index()
  {
    return view('contact');
  }

  /**
   * Sends an email to the JeepMeet admin and
   * persists the visitor/user contact message
   * in the database.
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
      $this->sendMailToAdmin($request);

      // Save the request data to the database
      ContactUsMessage::create([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'contact_message' => $request->input('message')
      ]);

      // Alert the user that their message has been received
      return response()->json(['success'=> 'Thank you for your message'], 200);
    }
    catch(Exception $e) {
      // Alert the user that their message has failed to send
      return response()->json(['error'=> 'There appears to be a problem with sending your ' .
        'message. Please try again.'], 422);
    }
  }

  /**
   * Sends an email to the JeepMeet admin with the
   * request object data.
   * 
   * @param $request - Request object
   * 
   * @return void
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
