<?php

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
    return view('register');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function (){
   return view('dashboard');
})->middleware('check');



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

