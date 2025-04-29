<?php

use App\Http\Controllers\API\AudioController;
use App\Http\Controllers\API\EkspresiController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\HasilController;
use App\Http\Controllers\API\RatingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//USER CONTROLLER
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
//AUDIO CONTROLLER
Route::get('showAudio',[AudioController::class,'showAudio']);

//EKSPRESI CONTROLLER
Route::get('showEkspresi',[EkspresiController::class,'showEkspresi']);
// Route::get('showUser',[UserController::class,'showUser']);

// Route::post('addRole',[RoleController::class,'store']);

//USER CONTROLLER
Route::group([
"middleware" => ["auth:sanctum"]
], function() {
//ROLE CONTROLLER
Route::post('addRole',[RoleController::class,'store']);
//USER CONTROLLER
Route::get('profile',[UserController::class,'profile']);
Route::get('logout',[UserController::class,'logout']);
//RATING CONTROLLER
Route::post('addRating',[RatingController::class,'store']);
Route::get('showRating',[RatingController::class,'show']);
//HASIL CONTROLLER
Route::post('storeHasil', [HasilController::class, 'storeHasil']);
});