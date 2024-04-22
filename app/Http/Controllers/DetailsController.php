<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Type;
use App\Models\Favorite;

class DetailsController extends Controller
{
    public function index($city,$tp,$id){
        $type = Type::all();
        $listing = Annonce::find($id);
        $user = $listing->user;
        $test = $user->favorites->where('annonce_id',$listing->id)->first();
        if($listing == null || $listing->enabled == 0){
            return redirect('/details');
        }else{

            $suggest = Annonce::where('enabled',1)
            ->where('id','<>',$id)
            ->whereHas('type',function($query) use ($tp){
                $query->where('name',$tp);
            })->get()->take(3);
        }
        return view('user.details',compact('listing','suggest','type','user','test'));
    }
}
