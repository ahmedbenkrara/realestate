<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Mail;

class ContactController extends Controller
{
    public function index(){
        return view('user.contact');
    }

    public function send(Request $req){
        $details = [
            'fname' => $req->fname,
            'sname' => $req->sname,
            'email' => $req->email,
            'subject' => $req->subject,
            'message' => $req->message
        ];

        Mail::to('ahmed.benkrara11@gmail.com')->send(new ContactMail($details));
        if(Mail::failures()){
            return back()->with('fail',__('login.mfail'));
        }
        return back()->with('success',__('login.msuccess'));
    }
}
