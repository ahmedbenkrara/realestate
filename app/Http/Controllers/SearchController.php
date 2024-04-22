<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Annonce_image;
use App\Models\Details;
use App\Models\Type;
use App\Models\Features;

class SearchController extends Controller
{
    public function index(){
        $listing = Annonce::where('enabled',1)->orderby('updated_at','desc')->paginate(20);
        $types = Type::all();
        $features = Features::all();
        return view('user.search',compact('listing','types','features'));
    }

    public function filter(Request $req){

        if($req->title != null){
            $title = $req->title;
        }else{
            $title = "";
        }

        if($req->city != null){
            $city = $req->city;
        }else{
            $city = "";
        }

        if($req->mins != null && $req->maxs != null){
            $size = [$req->mins,$req->maxs];
        }else{
            $size = [0,1000000000000000];
        }

        if($req->type != null){
            $type = [$req->type];
        }else{
            $type = [];
            foreach(Type::all() as $t){
                array_push($type,$t->id);
            }
        }

        if($req->beds != null){
            $beds = [$req->beds];
        }else{
            $beds = [];
            foreach(Details::all() as $d){
                array_push($beds,$d->beds);
            }
        }

        if($req->baths != null){
            $baths = [$req->baths];
        }else{
            $baths = [];
            foreach(Details::all() as $d){
                array_push($baths,$d->baths);
            }
        }

        if($req->status != null){
            $status = [$req->status];
        }else{
            $status = [1,2,3];
        }

        $paginate = 20;
        $feat = $req->feature;

        if($req->feature != null){
            $listing = Annonce::whereBetween('size',$size)
                ->whereIn('type_id',$type)
                ->whereIn('status',$status)
                ->where('enabled',1)
                ->whereHas('detail',function($query) use ($beds,$baths){
                    $query->whereIn('beds',$beds)->whereIn('baths',$baths);
                })
                ->whereHas('adresse',function($query) use ($city){
                    $query->where('city','like','%'.$city.'%');
                })
                ->whereHas('features',function($query) use ($feat){
                    $query->whereIn('features_id',$feat);
                })
                ->paginate($paginate);
        }else{
            $listing = Annonce::whereBetween('size',$size)
                ->whereIn('type_id',$type)
                ->whereIn('status',$status)
                ->where('enabled',1)
                ->whereHas('detail',function($query) use ($beds,$baths){
                    $query->whereIn('beds',$beds)->whereIn('baths',$baths);
                })
                ->whereHas('adresse',function($query) use ($city){
                    $query->where('city','like','%'.$city.'%');
                })->paginate($paginate);
        }

        $types = Type::all();
        $features = Features::all();
        return view('user.search',compact('listing','types','features'));
    }
}
