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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks.index');
Route::post('/tasks', 'App\Http\Controllers\TaskController@store')->name('tasks.store');
Route::get('/tasks/{task}', 'App\Http\Controllers\TaskController@show')->name('tasks.show');
Route::put('/tasks/{task}', 'App\Http\Controllers\TaskController@update')->name('tasks.update');
Route::delete('/tasks/{task}', 'App\Http\Controllers\TaskController@destroy')->name('tasks.destroy');
