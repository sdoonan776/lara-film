@extends('layouts.app')

@section('title', $movie['title'])

<div style="background: url( {{$imageUrl }}{{ $backdropImageSize }}{{ $movie['backdrop_path'] }});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;">
        <main class="content container" style="margin: 0 auto 3em auto;">
            <div class="row">
                <div class="movie-header">
                    <div>
                        <h2>
                            {{ $movie['title'] }} ({{ date('Y', strtotime($movie['release_date'])) }})
                        </h2>
                        <div class="rating-container row">
                            <i class="fas fa-star"></i>
                            <p>{{ $movie['vote_average'] }}</p>
                        </div>
                    </div>


                    <div class="genres row">
                        @foreach ($movie['genres'] as $genre)
                            <p class="pr-3">{{ $genre['name'] }}</p>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="movie-media row">
                    <img src="{{ $imageUrl }}/{{ $posterImageSize }}{{ $movie['poster_path'] }}"
                    alt="{{ $movie['title'] }}">

                    <iframe src="https://youtube.com/embed/{{ $trailer }}"
                            width="560" height="315" frameborder="0" allowfullscreen></iframe>

                    <div class="movie-stats">
                        <div class="row">
                            <div class="date col-lg">
                                <p> {{ date('Y', strtotime($movie['release_date'])) }}</p>
                            </div>
                            <div class="runtime col-lg">
                                <p> {{ $movie['runtime'] }} mins </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="movie-content">
                    <h3>Description</h3>
                    <p>{{ $movie['overview'] }}</p>
                </div>
            </div>

            <div class="credits-section">
                <h3>Cast</h3>
                <div class="cast-list">
                    @foreach($credits['cast'] as $cast)
                        <div class="credit-row row justify-content-around">
                            @if($cast['profile_path'])
                                <img src="{{ $imageUrl }}{{ $profileImageSize }}{{ $cast['profile_path'] }}" alt="cast-image">
                            @else
                                <p class="pr-5">No Image</p>
                            @endif
                            <p class="pr-5">{{ $cast['name'] }}</p>
                            <p>{{ $cast['character'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

