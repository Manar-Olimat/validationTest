<?php

use App\Models\Listing;
use App\Models\Listings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

//all listings
Route::get('/', function () {
    return view('listings',[
        'headings'=>'Lastest Listing' ,
        'Listings'=> Listings::all()

    ]);
});

//single listing
Route::get('/listings/{id}', function ($id) {
    return view('listing',
[  
      'listing'=> Listings::find($id)
]    );
});
