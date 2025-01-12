@extends('layouts.main.main')

@section('title', 'My Portfolio')

@section('content')
    @include('pages.main.about')  <!-- Includes the About section -->
    @include('pages.main.certification')  <!-- Includes the About section -->
    @include('pages.main.experience')  <!-- Includes the About section -->
@endsection
