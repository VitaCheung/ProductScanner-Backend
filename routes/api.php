<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SavedItemsController;
use App\Models\SavedItem;
// use App\Models\Type;
use App\Models\User;
// use App\Models\Project;


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
    // Route::get('/saved-items', [SavedItemsController::class, 'index']); 
    // Route::post('/add-item', [SavedItemsController::class, 'additem']);  

});

Route::get('/saved-items', [SavedItemsController::class, 'index']);
Route::post('/add-item', [SavedItemsController::class, 'additem']);    
// Route::post('/delete-item', [SavedItemsController::class, 'deleteitem']); 
Route::get('/delete-item/{saveditem:id}', [SavedItemsController::class, 'deleteitem'])->where('saveditem', '[0-9]+')->middleware('auth');

// Route::get('/saved-items', function(){
//     $savedItems = SavedItem::where('user_id', auth()->id())->orderBy('created_at')->get();
//     return $savedItems;
// });  
Route::get('/saveditems', function(){
    $savedItems = SavedItem::orderBy('created_at')->get();
    return $savedItems;
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/types', function(){

//     $types = Type::orderBy('title')->get();
//     return $types;

// });

// Route::get('/projects', function(){

//     $projects = Project::orderBy('created_at')->get();

//     foreach($projects as $key => $project)
//     {
//         $projects[$key]['user'] = User::where('id', $project['user_id'])->first();
//         $projects[$key]['type'] = Type::where('id', $project['type_id'])->first();

//         if($project['image'])
//         {
//             $projects[$key]['image'] = env('APP_URL').'storage/'.$project['image'];
//         }
//     }

//     return $projects;

// });

// Route::get('/projects/profile/{project?}', function(Project $project){

//     $project['user'] = User::where('id', $project['user_id'])->first();
//     $project['type'] = Type::where('id', $project['type_id'])->first();

//     if($project['image'])
//     {
//         $project['image'] = env('APP_URL').'storage/'.$project['image'];
//     }

//     return $project;

// });

