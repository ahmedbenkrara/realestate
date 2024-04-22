<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        return view('user.myaccount');
    }

    public function contact(Request $req){
        if($req != null){
            
            $user = User::where('email',$req->email)->first();
            $user->Update([
                'fname' => $req->fname,
                'sname' => $req->sname
            ]); 

            if($req->file('profilepic') != null){
                $image = $req->file('profilepic');
                $imageName = time().random_int(100000, 999999).'.'.$image->extension();
                $image->move(public_path('/assets/images/profile'),$imageName);
                $pic = $imageName;
            }else{
                $pic = null;
            }

            if($user->contact == null){
                Contact::create([
                    'phone' => $req->phone,
                    'fax' => $req->fax,
                    'whatsapp' => $req->whatsapp,
                    'facebook' => $req->facebook,
                    'instagram' => $req->instagram,
                    'linkedin' => $req->linkedin,
                    'twitter' => $req->twitter,
                    'website' => $req->website,
                    'about' => $req->about,
                    'profile_pic' => $pic,
                    'user_id' => $user->id
                ]);
            }else{
                
                $user->contact->update([
                    'phone' => $req->phone,
                    'fax' => $req->fax,
                    'whatsapp' => $req->whatsapp,
                    'facebook' => $req->facebook,
                    'instagram' => $req->instagram,
                    'linkedin' => $req->linkedin,
                    'twitter' => $req->twitter,
                    'website' => $req->website,
                    'about' => $req->about,
                    'profile_pic' => $pic
                ]);
            }

            return back();
        }else{
            return back();
        }
    }

    public function change(Request $req){
        //wrongpass
        $user = User::where('email',$req->email)->first();
        if(Hash::check($req->oldpass,$user->password)){
            $user->update([
                'password' => Hash::make($req->newpass)
            ]);
            return back();
        }else{
            return back()->with('wrongpass',__('login.pwrong'));
        }
    }
}
