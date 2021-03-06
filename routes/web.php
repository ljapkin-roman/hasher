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

Route::get('/', function () {
    
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hasher', 'HashController@index');

Route::get('/data', 'DataController@index');
Route::get('/data/{id}', 'DataController@getData');

Route::get('/hasher', 'HashController@index');
Route::post('/hasher', 'HashController@store');

Route::get('/hasher/show', 'HashController@show');
