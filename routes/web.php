<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/todos', 'App\Http\Controllers\TodoController@index')->name('todo.index');
Route::get('/todos/create', 'App\Http\Controllers\TodoController@create');
Route::post('/todos/create', 'App\Http\Controllers\TodoController@store');
Route::get('/todos/edit/{id}', 'App\Http\Controllers\TodoController@edit');
Route::put('/todos/update/{id}', 'App\Http\Controllers\TodoController@update')->name('todo.update');
Route::put('/todos/complete/{id}', 'App\Http\Controllers\TodoController@complete')->name('todo.complete');
Route::delete('/todos/incomplete/{id}', 'App\Http\Controllers\TodoController@incomplete')->name('todo.incomplete');
Route::delete('todos/delete/{id}', 'App\Http\Controllers\TodoController@delete')->name('todo.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
