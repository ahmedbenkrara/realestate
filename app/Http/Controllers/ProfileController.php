<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ProfileMail;
use Mail;

class ProfileController extends Controller
{
    public function index($id,$type = null){
        $user = User::find($id);
        if($user == null){
            return redirect('/search');
        }
        if($type != null){
            $listing = $user->annonces()->where([['enabled','1'],['status',$type]])->paginate(20);
        }else{
            $listing = $user->annonces()->where('enabled','1')->paginate(20);
        }
        
        $contact = $user->contact;
        return view('user.vprofile',compact('user','listing','contact','type'));
    }

    public function send(Request $req){
        $details = [
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'message' => $req->message,
            'mail' => $req->mail
        ];

        Mail::to($req->mail)->send(new ProfileMail($details));
        if(Mail::failures()){
            return back()->with('fail',__('login.mfail'));
        }
        return back()->with('success',__('login.msuccess'));
    }

}
