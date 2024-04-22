<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavController extends Controller
{
    public function set(Request $req){
        $fav = Favorite::where([['annonce_id',$req->annonce_id],['user_id',$req->user_id]])->get();
        if(count($fav) == 0){
            Favorite::create([
                'annonce_id' => $req->annonce_id,
                'user_id' => $req->user_id
            ]);
        }
        return back();
    }
}
