<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Annonce;

class HomeController extends Controller
{
    public function index(){
        $dataf = FeaturesController::getfeatures();
        $datat = Type::all();
        $rent = Annonce::where([['status',2],['enabled',1]])->orderByDesc('created_at')->get()->take(12);
        $sell = Annonce::where([['status',1],['enabled',1]])->orderByDesc('created_at')->get()->take(12);
        return view('user.home',compact('dataf','datat','rent','sell'));
    }
}
