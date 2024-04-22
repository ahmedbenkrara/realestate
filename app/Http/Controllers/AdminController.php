<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.myaccount');
    }

    public function name(Request $req){
        $user = User::find(Auth::user()->id);
        $user->update([
            'fname' => $req->fname,
            'sname' => $req->sname
        ]);
        return back();
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
