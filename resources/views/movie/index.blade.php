@extends('layouts.app')

@section('title', 'Films')


@section('content')
    <div style="background: url({{ $imageUrl }}{{ $backdropImageSize }}{{ $popularMovies[0]['backdrop_path'] }});
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;">
        <div class="container movie-index-content">
            <table class="table movie-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentMovies as $i => $movie)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>
                                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                                    <img src="{{ $imageUrl }}{{ $posterImageSize }}{{ $movie['poster_path'] }}" alt="movie-image">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                                    {{ $movie['title'] }}
                                </a>
                            </td>
                            <td>{{ date('d/m/Y', strtotime($movie['release_date'])) }}</td>
                            <td>{{ $movie['vote_average'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
