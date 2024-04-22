<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Type;
use App\Mail\RequestMail;
use Mail;

class RequestsController extends Controller
{
    public function index(){
        $listing = Annonce::where('enabled',0)->orderByDesc('updated_at')->paginate(20);
        return view('admin.requests',compact('listing'));
    }

    public function details($id){
        $type = Type::all();
        $listing = Annonce::find($id);
        $user = $listing->user;
        if($listing == null || $listing->enabled != 0){
            return redirect('/home');
        }
        return view('admin.rdetails',compact('listing','type','user'));
    }

    public function accept(Request $req){
        if($req->id != null){
            $annonce = Annonce::find($req->id);
            $email = $annonce->user->email;
            $annonce->update([
                'enabled' => 1
            ]);

            $details = [
                'subject' => 'Request Accepted',
                'message' => 'We have accepted your new request of posting ('.$annonce->title.'), thanks for being a part of our comunity.'
            ];

            Mail::to($email)->send(new RequestMail($details));
            return redirect('/requests');
        }else{
            return redirect('/dashboard');
        }
    }

    public function reject(Request $req){
        if($req->id != null){
            $annonce = Annonce::find($req->id);
            $email = $annonce->user->email;
            $annonce->update([
                'enabled' => -1
            ]);

            $details = [
                'subject' => 'Request Reject',
                'message' => 'We are sorry to tell you that we have rejected your new request of posting ('.$annonce->title.'), Because it goes against our comunity and rules.'
            ];
            
            Mail::to($email)->send(new RequestMail($details));

            return redirect('/requests');
        }else{
            return redirect('/dashboard');
        }
    }
}
