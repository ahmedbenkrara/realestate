<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;
use App\Models\Favorite;

class DashboardController extends Controller
{
    public function index(Request $req){
        if(Auth::user()->hasRole('user')){
            $user = Auth::user();
            $listing = $user->annonces()->where('enabled',1)->paginate(20);
            $type = 1;
            return view('user.mylisting',compact('listing','type'));
        }else if(Auth::user()->hasRole('admin')){
            return redirect('/profile');
        }
    }

    public function filter($type){
        if($type == 2){
            $user = Auth::user();
            $listing = $user->annonces()->where('enabled',0)->paginate(20);
            return view('user.mylisting',compact('listing','type'));
        }else if($type == 3){
            $user = Auth::user();
            $listing = $user->annonces()->where('enabled',-1)->paginate(20);
            return view('user.mylisting',compact('listing','type'));
        }else{
            return redirect('/dashboard');
        }
    }

    public function favorite(){
        $user = Auth::user();
        $listing = $user->favorites()->paginate(20);
        return view('user.favorite',compact('listing'));
    }

    //delete annonce
    public function delete(Request $req){
        $d = Annonce::find($req->id);
        if($d != null){
            $d->delete();
        }
        return response()->json('1');
    }

    //delete from fav
    public function deletef(Request $req){
        $fav = Favorite::where([['annonce_id',$req->id],['user_id',Auth::user()->id]]);
        if($fav != null){
            $fav->delete();
        }
        return response()->json('1');
    }
}
