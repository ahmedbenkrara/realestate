<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function set(Request $req){
        Review::create([
            'title' => $req->name,
            'description' => $req->description,
            'rate' => $req->rate,
            'annonce_id' => $req->annonce_id
        ]);
        return back();
    }
}
