@extends('layouts.admin.main')

@section('title', 'About Management')

@section('content')
<div class="container mt-5">
    <h1>About Section</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h2>{{ $about->first_name }} <span class="text-primary">{{ $about->last_name }}</span></h2>
    <p>Email: {{ $about->email }}</p>
    <p>Phone: {{ $about->phone }}</p>
    <p>Address: {{ $about->address }}</p>
    <p>Bio: {{ $about->bio }}</p>

    <div class="social-icons">
    @foreach ($about->social_links as $platform => $url)
        @if($url)  <!-- Ensure the URL is not empty -->
            <a class="social-icon" href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-{{ $platform }}"></i>
            </a>
        @endif
    @endforeach
</div>


    <a href="{{ route('about.edit') }}" class="btn btn-primary mt-3 mb-5">Edit About Section</a>
</div>
@endsection
