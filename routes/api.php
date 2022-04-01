<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    $user =  $request->user();
    return $user->roles()->get();
});

Route::group(['middleware'=>'auth:sanctum'], function () {

    Route::get('/user-permissions', [UserController::class, 'permissions']);
    Route::get('/get-users', [UserController::class,'getUsers']);
    Route::post('/update-role', [UserController::class,'updateRole']);
    Route::post('/add-user', [UserController::class,'addUser']);
    Route::get('/posts', [PostController::class,'index']);
    Route::post('/add-post', [PostController::class,'add']);

    Route::get('/roles', [RoleController::class,'index' ]);

    Route::get('/users', function(Request $request){
        $user = $request->user();
//        $user->givePermissionTo('view-roles');
//        return  "User permisssio ".$user->can('view-roles');
        return $request->user()->hasRole('adminManager');
    });
});


