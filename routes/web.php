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
Route::get('/emotes', 'EmotesController@index')->name('emotes');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/emotes/create', 'EmotesController@create')->name('emotes.create');
    Route::post('/emotes/create', 'EmotesController@store')->name('emotes.store');
});