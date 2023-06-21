<?php

use App\Models\Project;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SavedItemsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\DislikesController;
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
    return view('welcome', [
        'projects' => Project::all(),
    ]);
});

Route::get('/project/{project:slug}', function (Project $project) {
    return view('project', [
        'project' => $project,
    ]);
})->where('project', '[A-z\-]+');

// web.php
Route::group(['middleware' => 'web'], function () {
    Route::get('/console/login', [ConsoleController::class, 'loginForm']);
    Route::post('/console/login', [ConsoleController::class, 'login']);
    Route::get('/console/logout', [ConsoleController::class, 'logout']);
    Route::get('/console/dashboard', [ConsoleController::class, 'dashboard']);

    Route::get('/console/users/list', [UsersController::class, 'list']);
    Route::get('/console/users/add', [UsersController::class, 'addForm']);
    Route::post('/console/users/add', [UsersController::class, 'add']);
    Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+');
    Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+');
    Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+');

    Route::get('/console/saveditems/list', [SavedItemsController::class, 'list']);
    Route::get('/console/saveditems/add', [SavedItemsController::class, 'addForm']);
    Route::post('/console/saveditems/add', [SavedItemsController::class, 'add']);
    Route::get('/console/saveditems/delete/{saveditem:id}', [SavedItemsController::class, 'delete'])->where('saveditem', '[0-9]+');

    Route::get('/console/likes/list', [LikesController::class, 'list']);
    Route::get('/console/likes/add', [LikesController::class, 'addForm']);
    Route::post('/console/likes/add', [LikesController::class, 'add']);
    Route::get('/console/likes/delete/{like:id}', [LikesController::class, 'delete'])->where('like', '[0-9]+');

    Route::get('/console/dislikes/list', [DislikesController::class, 'list']);
    Route::get('/console/dislikes/add', [DislikesController::class, 'addForm']);
    Route::post('/console/dislikes/add', [DislikesController::class, 'add']);
    Route::get('/console/dislikes/delete/{dislike:id}', [DislikesController::class, 'delete'])->where('dislike', '[0-9]+');
});


// Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
// Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
// Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
// Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

