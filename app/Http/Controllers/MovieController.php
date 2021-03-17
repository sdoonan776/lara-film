<?php

namespace App\Http\Controllers;

use App\Models\MovieMetadata;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $movies = MovieMetadata::all();

        return view('movie.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  MovieMetadata $movie
     * @return Response
     */
    public function show(MovieMetadata $movie)
    {
        return view('movie.show', [
            'movie' => $movie
        ]);
    }

}
