@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<main class="content-wrap">

        <div class="container-fluid">
            @foreach($films as $film)
                <div class="row">
                    <div class="banner col-lg-12" style="background-image: url('https://picsum.photos');">
                        <h1 class="">{{ strtolower(ucwords($film->title)) }}</h1>
                    </div>
                </div>
            @endforeach;
        </div>
	</main>
@endsection
