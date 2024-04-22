<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\FeaturesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/type/insert',[TypesController::class,'setType']);
Route::get('/type/getall',[TypesController::class,'getTypes']);
Route::post('/type/delete/{id}',[TypesController::class,'delete']);
Route::post('/type/edit',[TypesController::class,'edit']);

Route::post('/feature/insert',[FeaturesController::class,'setFeat']);
Route::get('/feature/getall',[FeaturesController::class,'getFeats']);
Route::post('/feature/delete/{id}',[FeaturesController::class,'delete']);
Route::post('/feature/edit',[FeaturesController::class,'edit']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
