<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Common Resource Routes:
// index -Show all listings
// show - Show single Listing
// create -Show form to create a new Listing
// store -store a new Listing
//Edit -Show form to edit a listing
//Update -update a listing
//destroy -Delete  a listing
 



// Show creating a form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Submitting an edit form [update listing]
Route::put('/listings/{listing}', [ListingController::class, 'update']);
// Deleting a listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Store Listing data
Route::post('/listings', [ListingController::class, 'store']);

// Show single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// All listings
Route::get('/', [ListingController::class, 'index']);

//Show Register/Create form
Route::get('/register', [UserController::class, 'create']);

//Create a new user
Route::post('/users', [UserController::class, 'store']);

//Logout the user
Route::post('/logout', [UserController::class, 'logout']);

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
 
//Login a user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);














// //All listings
// Route::get('/',[ListingController::class, 'index']);

// //Show creating a form
// Route::get('/listings/create',[ListingController::class, 'create']);
// //Store Listing data

// Route::post('/listings',[ListingController::class, 'store']);
// //Show edit form
// Route::get('/listings/{listing}/edit',[ListingController::class, 'edit']);


// //Submitting an edit form[update listing]
// Route::put('/listings/{listing}',[ListingController::class, 'update']);


// //show listing
// Route::get('/listings/{listing}',[ListingController::class, 'show']);





















//Single listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);
//checking-database
Route::get('/dbconn', function(){
return view('dbconn');
});



























Route::get('/hello', function(){
return response ('<h1>Hello world</h1>',200); 
});
Route::get('/posts/{id}', function($id){
    dd($id);
    return response ('Post' .$id);
})->where('id', '[0-9]+'); 
Route::get('/search', function(Request $request){
return $request->name . ' '. $request->city;   
});
