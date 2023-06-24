<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SavedItemsController;
use App\Models\SavedItem;
use App\Models\User;
use Illuminate\Support\Facades\Route;


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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 

});



Route::get('/saved-items', [SavedItemsController::class, 'index']);
Route::post('/add-item', [SavedItemsController::class, 'additem']);    

Route::get('/delete-item/{saveditem:id}', [SavedItemsController::class, 'deleteitem'])->where('saveditem', '[0-9]+')->middleware('auth');
Route::delete('/delete-item-by-asin/{asin}', [SavedItemsController::class, 'deleteItemByAsin'])->middleware('auth');



