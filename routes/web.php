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

Route::get('/home/create', [IndoorController::class, 'create']);

Route::post('/home', [IndoorController::class, 'store']);

Route::get('/home/{indoors}', [IndoorController::class, 'show']);

Route::get('/register',[userController::class, 'create']);

Route::post('/users',[userController::class, 'store']);


//logout

Route::post('/logout',[userController::class, 'logout']);


//login form

Route::get('/login',[userController::class, 'login']);

Route::post('/users/authenticate',[userController::class, 'authenticate']);

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
