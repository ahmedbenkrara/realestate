<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Features;
use App\Models\Contact;
use App\Models\Annonce;
use App\Models\Annonce_image;
use App\Models\Details;
use App\Models\Adresse;
use App\Models\Additional;
use App\Models\Feat_annonce;
use App\Models\Floors;
use App\Models\Documents;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    public function index(){
        $types = Type::all();
        $features = Features::all();
        if(Session::get('locale') == 'fr'){
            //$lang = new GoogleTranslate();
        /*  foreach($types as $type){
                //$type->name = $lang->setSource("en")->setTarget("fr")->translate($type->name);
                $type->name = GoogleTranslate::trans($type->name,'fr','en');
            }

            foreach($features as $feature){
               // $feature->name = $lang->setSource("en")->setTarget("fr")->translate($feature->name);
                $feature->name = GoogleTranslate::trans($feature->name,'fr','en');
            }*/
        }

        return view('user.create',compact('types','features'));
    }

    public function setAnnonce(Request $req){
       
        $annonce = Annonce::create([
            'title' => $req->atitle,
            'status' => $req->astatus,
            'enabled' => 0,
            'price' => $req->price,
            'price_month' => $req->pmonth,
            'price_sqft' => $req->psqft,
            'priceyear' => $req->pyear,
            'is_sold' => 0,
            'description' => $req->adescription,
            'size' => $req->psize,
            'video' => $req->video,
            'type_id' => $req->atype,
            'user_id' => Auth::user()->id
        ]);
        
        $details = Details::create([
            'baths' => $req->baths,
            'beds' => $req->beds,
            'garades' => $req->garage,
            'garade_size' => $req->gsize,
            'area_size' => $req->psize,
            'yearbuilt' => $req->yearb,
            'annonce_id' => $annonce->id
        ]);

        if($req->state == null || $req->state == ''){
            $state = '';
        }else{
            $state = $req->state;
        }

        $address = Adresse::create([
            'city' => $req->city,
            'state' => $state,
            'country' => $req->country,
            'zip' => $req->zip,
            'quartier' => $req->neighborhood,
            'adresse' => $req->address,
            'longmap' => $req->maplong,
            'latmap' => $req->maplat,
            'longview' => $req->streetlong,
            'latview' => $req->streetlat,
            'annonce_id' => $annonce->id
        ]);

        $a = json_decode($req->additional);

        for($i=0;$i<count($a);$i++){
            Additional::create([
                'property' => $a[$i]->key,
                'description' => $a[$i]->value,
                'annonce_id' => $annonce->id
            ]);
        }
        
        $b = explode(',',$req->features);
        for($i=0;$i<$req->featc;$i++){
            $annonce->features()->attach($b[$i]);
        }
        
        $delimg = explode(',',$req->delimages);
        
        for($i=0;$i<$req->count; $i++){
            if(in_array('file'.$i,$delimg)){
                continue;
            }
            
            $image = $req->file('file'.$i);
            $imageName = time().random_int(100000, 999999).'.'.$image->extension();
            $image->move(public_path('/assets/images/posts'),$imageName);
            Annonce_image::create([
                'path' => $imageName,
                'annonce_id' => $annonce->id
            ]);
        }
       

        return response()->json($annonce->id);        
    }

    public function setFloors(Request $req){
        $a = json_decode($req->floors);

        for($i=0;$i<count($a);$i++){
            if($req->file('image'.$i) == null){
                $imageName = null;
            }else{
                $image = $req->file('image'.$i);
                $imageName = time().random_int(100000,999999).'.'.$image->extension();
                $image->move(public_path('/assets/images/floors'),$imageName);
            }

            Floors::create([
                'name' => $a[$i]->name,
                'size' => $a[$i]->size,
                'baths' => $a[$i]->baths,
                'beds' => $a[$i]->beds,
                'price' => $a[$i]->price,
                'description' => $a[$i]->description,
                'image' => $imageName,
                'annonce_id' => $req->id
            ]);
        }

        return response()->json($req->id);
    }

    public function setDocs(Request $req){
        $deldocs = explode(',',$req->deldocs);

        for($i=0;$i<$req->filecount; $i++){
            if(in_array('file'.$i,$deldocs)){
                continue;
            }
            
            $file = $req->file('file'.$i);
            $fileName = time().random_int(100000, 999999).'.'.$file->extension();
            $file->move(public_path('assets/images/documents'),$fileName);

            Documents::create([
                'title' => $file->getClientOriginalName(),
                'path' => $fileName,
                'annonce_id' => $req->id
            ]);
        }

        return response()->json('1'); 
    }

    public function edit($id){
        $annonce = Annonce::find($id);
        $fet = [];
        if($annonce->features != null){
            foreach($annonce->features as $ft){
                array_push($fet,$ft->id);
            }
        }else{
            $fet = null;
        }
        
        if($annonce != null && $annonce->user_id == Auth::user()->id){
            $types = Type::all();
            $features = Features::all();
            return view('user.edit',compact('types','features','annonce','fet'));
        }else{
            return redirect('/dashboard');
        }
    }

    public function editAnnonce(Request $req){
        $annonce = Annonce::find($req->id);
        $annonce->update([
            'title' => $req->atitle,
            'status' => $req->astatus,
            'enabled' => 1,
            'price' => $req->price,
            'price_month' => $req->pmonth,
            'price_sqft' => $req->psqft,
            'priceyear' => $req->pyear,
            'is_sold' => 0,
            'description' => $req->adescription,
            'size' => $req->psize,
            'video' => $req->video,
            'type_id' => $req->atype
        ]);
        
        $details = Details::where('annonce_id',$annonce->id)->first();

        $details->update([
            'baths' => $req->baths,
            'beds' => $req->beds,
            'garades' => $req->garage,
            'garade_size' => $req->gsize,
            'area_size' => $req->psize,
            'yearbuilt' => $req->yearb
        ]);

        if($req->state == null || $req->state == ''){
            $state = '';
        }else{
            $state = $req->state;
        }

        $address = Adresse::where('annonce_id',$annonce->id)->first();

        $address->update([
            'city' => $req->city,
            'state' => $state,
            'country' => $req->country,
            'zip' => $req->zip,
            'quartier' => $req->neighborhood,
            'adresse' => $req->address,
            'longmap' => $req->maplong,
            'latmap' => $req->maplat,
            'longview' => $req->streetlong,
            'latview' => $req->streetlat
        ]);

        $a = json_decode($req->additional);

        for($i=0;$i<count($a);$i++){
            Additional::create([
                'property' => $a[$i]->key,
                'description' => $a[$i]->value,
                'annonce_id' => $annonce->id
            ]);
        }

        $adddel = json_decode($req->deladd);
        if($adddel != null){
            Additional::whereIn('id',$adddel)->delete();
        }

        $oldimg = json_decode($req->oldimg);
        if($oldimg != null){
            Annonce_image::whereIn('id',$oldimg)->delete();
        }
        $annonce->features()->detach();
        $b = explode(',',$req->features);
        for($i=0;$i<$req->featc;$i++){
            $annonce->features()->attach($b[$i]);
        }
        
        $delimg = explode(',',$req->delimages);
        
        for($i=0;$i<$req->count; $i++){
            if(in_array('file'.$i,$delimg)){
                continue;
            }
            
            $image = $req->file('file'.$i);
            $imageName = time().random_int(100000, 999999).'.'.$image->extension();
            $image->move(public_path('/assets/images/posts'),$imageName);
            Annonce_image::create([
                'path' => $imageName,
                'annonce_id' => $annonce->id
            ]);
        }
       

        return response()->json($annonce->id);        
    }

    public function editFloors(Request $req){
        $a = json_decode($req->floors);
        
        for($i=0;$i<count($a);$i++){
            if($req->file('image'.$i) == null){
                $imageName = null;
            }else{
                $image = $req->file('image'.$i);
                $imageName = time().random_int(100000,999999).'.'.$image->extension();
                $image->move(public_path('/assets/images/floors'),$imageName);
            }

            Floors::create([
                'name' => $a[$i]->name,
                'size' => $a[$i]->size,
                'baths' => $a[$i]->baths,
                'beds' => $a[$i]->beds,
                'price' => $a[$i]->price,
                'description' => $a[$i]->description,
                'image' => $imageName,
                'annonce_id' => $req->id
            ]);
        }

        Floors::whereIn('id',json_decode($req->delfloors))->delete();
        return response()->json($req->id);
    }

    public function editDocs(Request $req){
        $deldocs = explode(',',$req->deldocs);

        for($i=0;$i<$req->filecount; $i++){
            if(in_array('file'.$i,$deldocs)){
                continue;
            }
            
            $file = $req->file('file'.$i);
            $fileName = time().random_int(100000, 999999).'.'.$file->extension();
            $file->move(public_path('assets/images/documents'),$fileName);

            Documents::create([
                'title' => $file->getClientOriginalName(),
                'path' => $fileName,
                'annonce_id' => $req->id
            ]);
        }

        Documents::whereIn('id',json_decode($req->delde))->delete();
         
        return response()->json('1'); 
    }

}
