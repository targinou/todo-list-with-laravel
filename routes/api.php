<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/auth'], function () {
    Route::post('/register', 'App\Http\Controllers\Auth\AuthController@register');
    Route::post('/login', 'App\Http\Controllers\Auth\AuthController@login');
});

Route::group(['prefix' => '/task'], function (){
    Route::post('/create', 'App\Http\Controllers\Task\TaskController@registerTask');
    Route::patch('/toggle/{id}', 'App\Http\Controllers\Task\TaskController@toggleTaskStatus');
});

Route::group(['prefix' => '/tasks'], function (){
    Route::get('/all', 'App\Http\Controllers\Task\TaskController@getUserTasks');
});
