<?php

use App\Http\Controllers\LeaguesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/leagues', LeaguesController::class . '@index')->middleware('custom_token_checker');
Route::get('/leagues/{league_id}', LeaguesController::class . '@show')->middleware('custom_token_checker');


