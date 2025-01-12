@extends('layouts.admin.main')

@section('title', 'Create Certification')

@section('content')
<div class="container mt-5">
    <h1>Create New Certification</h1>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Form for creating new certification -->
    <form action="{{ route('certification.store') }}" method="POST" id="certificationForm">
        @csrf

        <div class="form-group">
            <label for="title">Certification Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="issuer">Issuer</label>
            <input type="text" name="issuer" id="issuer" class="form-control" value="{{ old('issuer') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="issue_date">Issue Date</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control" value="{{ old('issue_date') }}" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date (Optional)</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ old('expiry_date') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Certification</button>
    </form>
</div>
@endsection
