<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', 'Site\HomeController')->name('pages.home');

Route::get('/film', 'FilmController@index');
Route::get('/film/{slug}', 'FilmController@show');

Route::get('/profile/{id}', 'Site\UserController@index');
Route::get('/profile/{id}/edit', 'Site\UserController@edit');
Route::get('/profile/{id}/list', 'Site\UserController@list');


