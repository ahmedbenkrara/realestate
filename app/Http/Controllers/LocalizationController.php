<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLang($locale){
        App::setLocale($locale);
        Session::Put('locale',$locale);
        return redirect()->back();
    }
}
