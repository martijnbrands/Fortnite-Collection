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
    return view('emotes.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/emotes', 'EmotesController@index')->name('emotes');
Route::get('/emotes/fetch', 'EmotesController@fetch')->name('emotes.fetch');
Route::get('/emotes/{emote}', 'EmotesController@show')->name('emote.show');
// Route::get('/emotes/{emote}', 'EmotesController@fetch')->name('emotes.fetch');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/emotes/create', 'EmotesController@create')->name('emotes.create');
    Route::post('/emotes/create', 'EmotesController@store')->name('emotes.store');

    Route::get('/emotes/{emote}/edit', 'EmotesController@edit')->name('emotes.edit');
    Route::post('/emotes/{emote}', 'EmotesController@update')->name('emotes.update');
});