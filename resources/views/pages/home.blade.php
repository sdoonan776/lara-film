@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<main class="content-wrap" style="background-color: #1F2324;">
        <div class="container-fluid" style="padding: 0;">
            <div class="row">
                <div class="banner">
                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($popularMovies as $movie)
                                <div class="carousel-item">
                                    <img class="d-block banner-image" src="{{ $imageUrl }}{{ $backdropImageSize }}{{ $movie['backdrop_path'] }}" alt="Movie Slide">
                                    <div class="slide-overlay row justify-content-center align-items-center">
                                        <div class="movie-image-container col-lg-3">
                                            <div class="movie-image" style="width: 12em;">
                                                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                                                    <img src="{{ $imageUrl }}/{{ $posterImageSize }}{{ $movie['poster_path'] }}" alt="{{ $movie['original_title'] }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slide-overlay-link">
                                            <h1>{{ $movie['title'] }}</h1>
                                            <a href="">Watch the latest Trailer</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        @if (isset($recentMovies))
            <section class="movie-section">
                <div class="container now-playing">
                    <h6>Now Playing</h6>
                    <div class="row">
                        @foreach ($recentMovies as $movie)
                            <div class="movie-image-container col-lg-3">
                                <div class="movie-image" style="width: 12em;">
                                    <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                                        <img src="{{ $imageUrl }}/{{ $posterImageSize }}{{ $movie['poster_path'] }}" alt="{{ $movie['original_title'] }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <div class="container">
                @foreach(range(1, 5) as $movie)
                    <div class="no-movie-image-container"></div>
                @endforeach
            </div>
        @endif

        @if (isset($topRatedMovies))
            <section class="movie-section">
                <div class="container top-rated">
                    <h6>Top Rated</h6>
                    <div class="row">
                        @foreach ($topRatedMovies as $movie)
                            <div class="movie-image-container col-lg-3">
                                <div class="movie-image" style="width: 12em;">
                                    <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                                        <img src="{{ $imageUrl }}/{{ $posterImageSize }}{{ $movie['poster_path'] }}" alt="{{ $movie['original_title'] }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <div class="container">
                @foreach(range(1, 5) as $movie)
                    <div class="no-movie-image-container"></div>
                @endforeach
            </div>
        @endif

        @if (isset($upcomingMovies))
            <section class="movie-section">
                <div class="container upcoming">
                    <h6>Upcoming</h6>
                    <div class="row">
                        @foreach ($upcomingMovies as $movie)
                            <div class="movie-image-container col-lg-3">
                                <div class="movie-image" style="width: 12em;">
                                    <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                                        <img src="{{ $imageUrl }}/{{ $posterImageSize }}{{ $movie['poster_path'] }}" alt="{{ $movie['original_title'] }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <div class="container">
                @foreach(range(1, 5) as $movie)
                    <div class="no-movie-image-container"></div>
                @endforeach
            </div>
        @endif

	</main>
@endsection
