@extends('layouts.admin.main')

@section('title', 'Edit About')

@section('content')
<div class="container mt-5">
    <h1>Edit About Section</h1>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Form for editing about section -->
    <form id="edit-about-form" action="{{ route('about.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $about->first_name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $about->last_name) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $about->email) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $about->phone) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $about->address) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" rows="5" class="form-control" required>{{ old('bio', $about->bio) }}</textarea>
        </div>

        <!-- Social Links Inputs -->
        <div class="form-group">
            <label for="linkedin">LinkedIn URL</label>
            <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $about->social_links['linkedin'] ?? '') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="github">GitHub URL</label>
            <input type="url" name="github" id="github" value="{{ old('github', $about->social_links['github'] ?? '') }}" class="form-control">
        </div>

        <!-- Add more social links as needed -->
        
        <button type="submit" class="btn btn-primary mt-3 mb-5">Save Changes</button>
    </form>
</div>
@endsection
