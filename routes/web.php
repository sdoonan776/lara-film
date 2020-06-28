<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController')->name('pages.home');

Route::get('/film', 'FilmController@index');
Route::get('/film/{film_id}', 'FilmController@show');

Route::get('/users', 'UserController@index');

// Route::get('/profile/{id}', 'Site\UserController@index');
Route::get('/profile/{id}/edit', 'UserController@edit');
Route::get('/profile/{id}/list', 'UserController@list');


