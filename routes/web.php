<?php

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

Route::get('/', function () { return view('landing');});
Route::get('/dashboard', function () { return view('dashboard');});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/gem/{id}', 'GemController@show');
Route::get('/mine/{id}', 'MineController@show');
Route::get('/user/{id}', 'UserController@show');