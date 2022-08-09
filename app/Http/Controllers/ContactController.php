<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index(){
    return view('frontend.contactUs');
    }

    public function sendEmail(Request $request){
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

       Mail::to("support@learncode.com")->send(new contact($name,$email,$subject,$message));
        // return response()->json(['message', 'your send message Succesfuly']);
        return redirect(url("auth/contact-us"))->with('message', 'your send message Succesfuly');


    }
}
