@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ $page_title }}</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create New Experience</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('experience.store') }}" id="create-experience-form">
                    @csrf

                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company_name">Company</label>
                        <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" required>
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date (Optional)</label>
                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description (Optional)</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group m-1 mt-3">
                        <button type="submit" class="btn btn-primary">Create Experience</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
