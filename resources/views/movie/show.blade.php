@extends('layouts.app')

@section('title', $movie['title'])

<div class="container">
        <main class="content">
            <div class="movie-image">
                <div class="movie-media">
                    <img src="{{ $imageUrl }}/{{ $posterImageSize }}{{ $movie['poster_path'] }}"
                    alt="{{ $movie['title'] }}">

                    <!-- <iframe src="" frameborder="0"></iframe> -->
                </div>

                <div class="movie-info">
                    <p>{{ $movie['title'] }}</p>
                    <p>{{ $movie['overview'] }}</p>
                    <p>{{ $movie['release_date'] }}</p>
                    <p>{{ $movie['vote_average'] }}</p>
                    <p>{{ $movie['original_language'] }}</p>
                </div>

            </div>
        </main>
    </div>

