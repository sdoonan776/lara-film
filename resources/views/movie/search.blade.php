@extends('layouts.app')

@section('title', $search)

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
                @foreach ($searches as $i => $movie)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>
                            <a href="{{ route('movie.show', ['id' => $movie['id']]) }}">
                                <img src="{{ $imageUrl }}{{ $posterImageSize }}{{ $movie['poster_path'] }}" alt="movie-image">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('movie.show', ['id' => $movie['id'] ]) }}">
                                @if(isset($movie['title']))
                                    {{ $movie['title'] }}
                                @elseif(isset($movie['original_title']))
                                    {{ $movie['original_title'] }}
                                @endif
                            </a>
                        </td>
                        @if(isset($movie['release_date']))
                            <td>{{ date('d/m/Y', strtotime($movie['release_date'])) }}</td>
                        @else
                        @endif
                        <td>{{ $movie['vote_average'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
