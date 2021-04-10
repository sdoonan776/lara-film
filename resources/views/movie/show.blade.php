@extends('layouts.app')

@section('title', $movie['title'])

<div class="container">
        <main class="content">
            <div class="row">
                <div class="movie-header">
                    <h2>
                        {{ $movie['title'] }} ({{ date('Y', strtotime($movie['release_date'])) }})
                    </h2>
                    <div class="rating-container row">
                        <i class="fas fa-star"></i>
                        <p>{{ $movie['vote_average'] }}</p>
                    </div>

                    <div class="genres">
                        @foreach ($movie['genres'] as $genre)
                            <p>{{ $genre['name'] }}</p>
                        @endforeach
                    </div>
                    <div class="date">

                    </div>
                    <div class="age">

                    </div>
                    <div class="runtime">
                        <p> {{ $movie['runtime'] }} mins </p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="movie-media">
                    <img src="{{ $imageUrl }}/{{ $posterImageSize }}{{ $movie['poster_path'] }}"
                    alt="{{ $movie['title'] }}">

                    <iframe src="https://youtube.com/watch?v={{ $trailer }}"
                            width="560" height="315" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <div class="movie-content col-lg-3">
                    <p>{{ $movie['overview'] }}</p>
                </div>
            </div>
        </main>
    </div>

