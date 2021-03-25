<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/movie'], function () {
    Route::get('/topRated', 'MovieController@getTopRatedMovies');
    Route::get('/configuration', 'MovieController@getConfiguration');
});