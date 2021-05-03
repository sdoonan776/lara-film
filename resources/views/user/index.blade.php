@extends('layouts.app')

@section('title', 'Profile')

<style>
    .profile-wrap .card {
        background-color: #1F2324;
        text-align: left;
        padding: 2em;
        margin: 3em 0 0 0;
    }
</style>

@section('content')
    <div class="container profile-wrap">
        <div class="card">
            <div class="profile-image-container">

            <p>Full Name: {{ $user->name }}</p>

            <p>Email: {{ $user->email }}</p>
        </div>
    </div>
@endsection
