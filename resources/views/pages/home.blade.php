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
                                        <h1>{{ $movie['title'] }}</h1>
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
        @if (count($recentMovies) > 0)
            <section class="movie-section">
                <div class="container now-playing">
                    <h6>Now Playing</h6>
                    <div class="owl-carousel owl-theme">
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
                <h1>No Films Available</h1>
                <span>Please try again later</span>
            </div>
        @endif

        @if (count($topRatedMovies) > 0)
            <section class="movie-section">
                <div class="container now-playing">
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
                <h1>No Films Available</h1>
                <span>Please try again later</span>
            </div>
        @endif

        @if (count($upcomingMovies) > 0)
            <section class="movie-section">
                <div class="container now-playing">
                    <h6>Upcoming</h6>
                    <div class="owl-carousel owl-theme">
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
                <h1>No Films Available</h1>
                <span>Please try again later</span>
            </div>
        @endif

	</main>
@endsection
{{--<script--}}
{{--    src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
{{--    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="--}}
{{--    crossorigin="anonymous"></script>--}}
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            dots: true,
            arrows: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });


{{--        // for(let j = 0; j < 5; j++) {--}}
{{--        //     $('<div class="carousel-item"><img--}}
{{--        //     src="https://loremflickr.com/320/240" width="50%">--}}
{{--        //         </div>').appendTo('.carousel-inner');--}}
{{--        //     $('<li data-target="#carousel" data-slide-to="'+j+'">--}}
{{--        //         </li>').appendTo('.carousel-indicators')--}}
{{--        // }--}}

{{--        $('.carousel-item').first().addClass('active');--}}
{{--        $('.carousel-indicators > li').first().addClass('active');--}}
{{--        $('#carousel').carousel();--}}
    });
</script>
