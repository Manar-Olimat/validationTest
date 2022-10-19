<?php

use App\Models\Listing;
use App\Models\Listings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\listingController;
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
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// new route => new controller method => new view 

//all listings
Route::get('/', [listingController::class,'index']);



//show create form

Route::get('/listings/create', [listingController::class,'create']);


//show Edit  form

Route::get('/listings/{listing}/edit',
 [listingController::class,'edit']);


//store listing data

Route::post('/listings', [listingController::class,'store']);

//EDit submit to update
Route::put('/listings/{listing}',
 [listingController::class,'update']);

 //delete listing
Route::delete('/listings/{listing}',
[listingController::class,'distroy']);



//single listing
//route model binding
Route::get('/listings/{listing}',
[listingController::class,'show']
);

//show register/create form
Route::get('/register',[UserController :: class,'create']);

//create new user
Route::post('/users',[UserController :: class,'store']);

//log user out
Route::post('/logout',[UserController :: class,'logout']);

//show log in form
Route::get('/login',[UserController :: class,'login']);

//login user
Route::post('/users/authenticate',[UserController :: class,'authenticate']);




