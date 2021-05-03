<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController')->name('pages.index');

Route::get('/movie', 'MovieController@index')->name('movie.index');
Route::get('/movie/{id}', 'MovieController@show')->name('movie.show');
Route::get('/movie/{id}/dates', 'MovieController@dates')->name('movie.dates');
Route::get('/search', 'SearchController@search')->name('search.index');
Route::post('/search', 'SearchController@search')->name('search.post');

Route::group(['middleware' => 'auth:web'],function () {
    Route::get('/profile', 'UserController@index')->name('user.index');
    Route::get('/profile/{id}/edit', 'UserController@edit')->name('user.edit');
});





