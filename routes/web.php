<?php

use App\Models\Indoor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\IndoorController;
use App\Http\Controllers\TournamentController;
use App\Models\Tournament;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [IndoorController::class, 'index']);

//create form
Route::get('/home/create', [IndoorController::class, 'create'])->middleware('auth');

Route::post('/home', [IndoorController::class, 'store'])->middleware('auth');

//manage
Route::get('/home/manage', [IndoorController::class, 'manage']); 
Route::get('/home/dashboard', [userController::class, 'index']);

Route::get('/home/{indoors}', [IndoorController::class, 'show']);


//edit form 
Route::get('home/{indoors}/edit', [IndoorController::class, 'edit']);

//edit submit to update
Route::put('/home/{indoors}', [IndoorController::class, 'update']);


//delete
Route::delete('/home/{indoors}', [IndoorController::class, 'destroy']);




//Register form
Route::get('/register',[userController::class, 'create'])->middleware('guest');

Route::post('/users',[userController::class, 'store']);


  //login form
Route::get('/login',[userController::class, 'login'])->name('login')->middleware('guest');

//logout
Route::post('/logout',[userController::class, 'logout'])->middleware('auth');


Route::post('/users/authenticate',[userController::class, 'authenticate']);

Route::post('/listings', 'ListingController@store')->middleware('auth'); //




//manage



// Route::get('/',[TournamentController::class, 'index']);

// common resourse routes

// index - show all listings
// show - show single listing
// create - show form to create listings
// store - sh=tore new listing
// edit - show form to edit listing
// update - update listings
// destroy - destro listing



// Route::get('/home', function () {
//     return view('home');
// });
