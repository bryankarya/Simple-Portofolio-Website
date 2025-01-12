@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ $page_title }}</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Experience List</h6>
                <a href="{{ route('experience.create') }}" class="btn btn-primary btn-sm">Create Experience</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="experienceTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Company</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $experience)
                                <tr>
                                    <td>{{ $experience->role }}</td>
                                    <td>{{ $experience->company_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($experience->start_date)->format('F Y') }}</td>
                                    <td>{{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('F Y') : 'Present' }}</td>
                                    <td>
                                        <a href="{{ route('experience.edit', $experience->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('experience.delete', $experience->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this experience?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
