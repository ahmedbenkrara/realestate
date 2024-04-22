<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function privacy(){
        $data = json_decode(file_get_contents(public_path('assets/json/privacy.json'),true));
        return view('admin.privacy',compact('data'));
    }

    public function terms(){
        $data = json_decode(file_get_contents(public_path('assets/json/terms.json'),true));
        return view('admin.terms',compact('data'));
    }

    public function update(){
        $data = json_decode(file_get_contents(public_path('assets/json/privacy.json'),true));
        $data1 = json_decode(file_get_contents(public_path('assets/json/terms.json'),true));
        return view('admin.update',compact('data','data1'));
    }

    public function editprivacy(Request $req){
        $data = json_decode(file_get_contents(public_path('assets/json/privacy.json'),true));
        $data->privacy = $req->privacy;
        $new = json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents(public_path('assets/json/privacy.json'),$new);
        return back();
    }

    public function editterms(Request $req){
        $data = json_decode(file_get_contents(public_path('assets/json/terms.json'),true));
        $data->terms = $req->terms;
        $new = json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents(public_path('assets/json/terms.json'),$new);
        return back();
    }

    public function seo(){
        $data = json_decode(file_get_contents(public_path('assets/json/seo.json')));
        return view('admin.seo',compact('data'));
    }

    public function seoupdate(Request $req){
        $data = json_decode(file_get_contents(public_path('assets/json/seo.json')));
        $data->title = $req->title;
        $data->author = $req->author;
        $data->keywords = $req->keywords;
        $data->description = $req->description;
        $data->whatsapp = $req->whatsapp;
        $data->facebook = $req->facebook;
        $data->twitter = $req->twitter;
        $data->instagram = $req->instagram;
        $data->address = $req->address;
        $data->phone = $req->phone;
        $data->map = $req->map;
        $new = json_encode($data,JSON_PRETTY_PRINT);
        file_put_contents(public_path('assets/json/seo.json'),$new);
        return back()->with('status',__('login.crsu'));
    }

    public function deleteAnnonce(Request $req){
        if($req->id != null){
            $annonce = Annonce::find($req->id);
            $email = $annonce->user->email;

            $details = [
                'subject' => 'Annonce Deleted',
                'message' => 'We are sorry to tell you that we have deleted your announcement ('.$annonce->title.'), Because it goes against our comunity and rules.'
            ];
            
            Mail::to($email)->send(new RequestMail($details));
            $annonce->delete();
        }
        return redirect('/dashboard');
        
    }

    public static function settings(){
        $data = json_decode(file_get_contents(public_path('assets/json/seo.json'),true));
        return $data;
    }
}
