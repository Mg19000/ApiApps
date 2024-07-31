<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ArticleController;
use App\Http\Controllers\api\ApiloginController;
use App\Http\Controllers\api\ApiregisterController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return auth()->user();
});



Route::post('user/regy',[ApiregisterController::class, 'regy'])->
name('regy');

Route::post('user/login',[ApiloginController::class, 'login'])->
name('login');

Route::resource('articles' , ArticleController::class );
 
 
 