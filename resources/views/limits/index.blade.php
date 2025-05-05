@extends('layouts.app')

@section('header', 'A1 Test Dates')

@section('content')
    <div class="container">
        <h2>A1 Test Dates Management</h2>
        <a href="{{ route('limits.create') }}" class="btn btn-success mb-3">Create New A1 Test</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Test Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Max Submissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($limits as $limit)
                    <tr>
                        <td>{{ $limit->name }}</td>
                        <td>{{ $limit->start_date ? $limit->start_date->format('Y-m-d H:i') : 'Not set' }}</td>
                        <td>{{ $limit->end_date ? $limit->end_date->format('Y-m-d H:i') : 'Not set' }}</td>
                        <td>{{ $limit->max_submissions }}</td>
                        <td>
                            <a href="{{ route('limits.edit', $limit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('limits.destroy', $limit->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this test?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection