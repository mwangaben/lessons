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

Route::post('/channels', 'ChannelsController@store');

Route::get('lessons', 'LessonsController@index');
Route::post('lessons', 'LessonsController@store');
Route::get('lessons/create', 'LessonsController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
