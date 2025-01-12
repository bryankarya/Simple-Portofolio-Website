@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ $page_title }}</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Certification List</h6>
                <a href="{{ route('certification.create') }}" class="btn btn-primary btn-sm">Create Certification</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="certificationTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Issuer</th>
                                <th>Issue Date</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $certification)
                                <tr>
                                    <td>{{ $certification->title }}</td>
                                    <td>{{ $certification->issuer }}</td>
                                    <td>{{ \Carbon\Carbon::parse($certification->issue_date)->format('F Y') }}</td>
                                    <td>{{ $certification->expiry_date ? \Carbon\Carbon::parse($certification->expiry_date)->format('F Y') : 'No Expiry' }}</td>
                                    <td>
                                        <a href="{{ route('certification.edit', $certification->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('certification.delete', $certification->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this certification?');">
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
