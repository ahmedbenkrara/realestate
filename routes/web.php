<?php

use Illuminate\Support\Facades\Route;
use App\Models\Annonce;
use App\Models\User;
use App\Models\Features;
use App\Models\Feat_annonce;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RegisterController;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    $Features = Features::find(1);
   / $annonce->features()->attach(1);
    dd($Features->annonces);
});*/

Route::get('/ahmed',function(){
   // $Features = Features::find(2);
    $annonce = Annonce::find(37);
   // $annonce->features()->attach(1);
     //dd($Features->annonces);
     
     dd($annonce->user());
});

Route::get('/',[HomeController::class,'index']);
Route::get('/contact',[ContactController::class,'index']);
Route::post('/contact',[ContactController::class,'send'])->name('contact.send');

Route::post('/test',function(Request $req){
    $a = json_decode($req->f[0]);
    return response()->json($a);
})->name('test');

Route::get('/locale/{lang}',[LocalizationController::class,'setLang']);
Route::get('/search',[SearchController::class,'index']);
Route::get('/filter',[SearchController::class,'filter']);
Route::get('/details/{city}/{tp}/{id}',[DetailsController::class,'index']);
Route::get('/profile/{id}/{type?}',[ProfileController::class,'index']);
Route::post('/mailp',[ProfileController::class,'send'])->name('profile.send');
Route::post('/review',[ReviewController::class,'set']);

Route::get('/privacy',[SettingsController::class,'privacy']);
Route::get('/terms',[SettingsController::class,'terms']);

Route::get('/dashboard',[DashboardController::class,'index'])
->middleware(['auth','verified'])->name('dashboard');

//user
Route::group(['middleware' => ['auth','role:user','verified']],function(){
    Route::get('/create',[AnnonceController::class,'index']);
    Route::post('/create',[AnnonceController::class,'setAnnonce']);
    Route::post('/createfloors',[AnnonceController::class,'setFloors']);
    Route::post('/createdoc',[AnnonceController::class,'setDocs']);
    ///////////////////////////////////////////////////////////////////////
    Route::get('/edit/{id}',[AnnonceController::class,'edit']);
    Route::post('/edit',[AnnonceController::class,'editAnnonce']);
    Route::post('/editFloors',[AnnonceController::class,'editFloors']);
    Route::post('/editDocs',[AnnonceController::class,'editDocs']);

    //favset
    Route::post('/favorite',[FavController::class,'set']);
    //myaccount
    Route::get('/myaccount',[AccountController::class,'index']);
    Route::post('/myaccount',[AccountController::class,'contact']);
    Route::post('/change',[AccountController::class,'change']);
    Route::get('/listing/{type}',[DashboardController::class,'filter']);
    Route::get('/favorite',[DashboardController::class,'favorite']);
    Route::post('/deleteAnnonce',[DashboardController::class,'delete']);
    Route::post('/deleteFav',[DashboardController::class,'deletef']);

});

//admin
Route::group(['middleware' => ['auth','role:admin','verified']],function(){
    Route::get('/types',[TypesController::class,'index']);
    Route::get('/features',[FeaturesController::class,'index']);
    Route::get('/requests',[RequestsController::class,'index']);
    Route::get('/details/{id}',[RequestsController::class,'details']);
    Route::post('/accept',[RequestsController::class,'accept']);
    Route::post('/reject',[RequestsController::class,'reject']);
    Route::get('/profile',[AdminController::class,'index']);
    Route::post('/profile',[AdminController::class,'name']);
    Route::post('/password',[AdminController::class,'change']);
    Route::get('/settings',[SettingsController::class,'update']);
    Route::get('/editprivacy',[SettingsController::class,'editprivacy']);
    Route::get('/editterms',[SettingsController::class,'editterms']);
    Route::get('/admin',[RegisterController::class,'create']);
    Route::post('/admin',[RegisterController::class,'store']);
    Route::get('/seo',[SettingsController::class,'seo']);
    Route::get('/seoupdate',[SettingsController::class,'seoupdate']);
    Route::post('/deletean',[SettingsController::class,'deleteAnnonce']);
});

require __DIR__.'/auth.php';
