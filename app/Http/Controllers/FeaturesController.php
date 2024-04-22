<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Features;

class FeaturesController extends Controller
{
    public static function getfeatures(){
        $data = Features::all();
        return $data;
    }

    public function index(){
        $language = [__('login.crfeat'),__('login.ftname'),__('login.crt'),__('login.crsu'),__('login.alex'),__('login.sure'),__('login.eft'),__('login.edit'),__('login.cancel'),__('login.updated')];
        return view('admin.features',compact('language'));
    }

    public function setFeat(Request $req){
        $ft = Features::where('name',$req->name)->first();
        if($ft == null){
            Features::create([
                'name' => $req->name
            ]);
            return Features::paginate(20);
        }else{
            return "0";
        }
    }

    public function getFeats(){
        return Features::paginate(20);
    }

    public function delete($id){
        if(Features::find($id) != null){
            Features::find($id)->delete();
        }
        return Features::paginate(20);
    }

    public function edit(Request $req){
        $ft = Features::where('name',$req->nname)->first();
        if($ft == null){
            $f = Features::where('name',$req->oname)->first();
            $f->update([
                'name' => $req->nname
            ]);
            return Features::paginate(20);
        }else{
            return "0";
        }
    }

}
