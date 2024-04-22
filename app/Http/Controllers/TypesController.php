<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Type;

class TypesController extends Controller
{
    public function index(){
        $language = [
            __('login.crtype'),
            __('login.tyname'),
            __('login.cve'),
            __('login.crt'),
            __('login.big'),
            __('login.imaged'),
            __('login.edit'),
            __('login.cancel'),
            __('login.ett'),
            __('login.sudel'),
            __('login.alex'),
            __('login.updated'),
            __('login.crt')
        ];
        return view('admin.types',compact('language'));
    }

    public function setType(Request $req){
        $tp = Type::where('name',$req->name)->first();
        if($tp == null){
            $image = $req->file('cover');
            $imageName = time().random_int(100000, 999999).'.'.$image->extension();
            $image->move(public_path('/assets/images/wallpapers'),$imageName);

            Type::create([
                'name' => $req->name,
                'cover' => 'assets/images/wallpapers/'.$imageName
            ]);
            return Type::paginate(10);
        }else{
            return "0";
        }
    }

    public function getTypes(){
        return Type::paginate(10);
    }

    public function delete($id){
        if(Type::find($id) != null){
            Type::find($id)->delete();
        }
        return Type::paginate(10);
    }

    public function edit(Request $req){
        $ty = Type::where('name',$req->name)->first();
        $t = Type::find($req->id);
        if($ty == null){
            if($req->cover != null){
                $image = $req->file('cover');
                $imageName = time().random_int(100000, 999999).'.'.$image->extension();
                $image->move(public_path('/assets/images/wallpapers'),$imageName);
                $data = [
                    "name" => $req->name,
                    "cover" => 'assets/images/wallpapers/'.$imageName
                ];
            }else{
                $data = [
                    "name" => $req->name
                ];
            }
            $t->update($data);
            return Type::paginate(10);
        }else{
            if($req->name == $req->old){
                if($req->cover != null){
                    $image = $req->file('cover');
                    $imageName = time().random_int(100000, 999999).'.'.$image->extension();
                    $image->move(public_path('/assets/images/wallpapers'),$imageName);
                    $t->update([
                        "cover" => 'assets/images/wallpapers/'.$imageName
                    ]);
                }
            }else{
                return "0";
            }
        }
    }

}
