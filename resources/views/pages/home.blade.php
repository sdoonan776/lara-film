@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<main class="content-wrap">

        <div class="container-fluid">
            <div class="row">
                <div class="banner">
                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block" src="{{ asset('images/banner-slide.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <div class="banner-text">
                                    <img class="d-block" src="{{ asset('images/banner-slide2.jpg') }}" alt="Second slide">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block" src="{{ asset('images/banner-slide3.jpg')}}" alt="Third slide">
                            </div>
                        </div>
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
        @if (count($films) > 0)
            <section class="movie-section">
                <div class="container">
                    @foreach ($films as $film)
                        <div class="row">
                            <div class="movie-image-container col-lg-12">
                                <div class="movie-image">
                                    <img src="" alt="">
                                </div>
                                <div class="movie-info">
                                    <p class="title"></p>
                                    <p class="year"></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
