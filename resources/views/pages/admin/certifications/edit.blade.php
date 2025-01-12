@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ $page_title }}</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Certification</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('certification.update', $detail->id) }}" id="edit-certification-form">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $detail->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="issuer">Issuer</label>
                        <input type="text" name="issuer" id="issuer" class="form-control @error('issuer') is-invalid @enderror" value="{{ old('issuer', $detail->issuer) }}" required>
                        @error('issuer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $detail->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="issue_date">Issue Date</label>
                        <input type="date" name="issue_date" id="issue_date" class="form-control @error('issue_date') is-invalid @enderror" value="{{ old('issue_date', $detail->issue_date) }}" required>
                        @error('issue_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="expiry_date">Expiry Date (Optional)</label>
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date', $detail->expiry_date) }}">
                        @error('expiry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group m-1 mt-3">
                        <button type="submit" class="btn btn-primary">Update Certification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
