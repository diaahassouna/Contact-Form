<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class Contact_US_Form_Controller extends Controller
{
    //Create Contact Form
    public function CreateForm(Request $request) {
        return view('contact');
    }

    //Store Contact Form Data
    public function ContactUsForm(Request $request) {
        
        //Form Validation
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required' 
        ]);

        //Store Data in Database
        Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('sightmare@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        //
        return back()->with('success', 'We have recieved your message and would like to thank you.');
    }
}
