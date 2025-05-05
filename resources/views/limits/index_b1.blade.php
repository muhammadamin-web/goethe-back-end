@extends('layouts.app')

@section('header', 'Limits')

@section('content')
   
    
   
    
    <div class="container mt-5">
        <h2>B1 Test Dates</h2>
        <a href="{{ route('limits_b1.create') }}" class="btn btn-primary mb-3">Create New Test Date</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
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
                            <a href="{{ route('limits_b1.edit', $limit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('limits_b1.destroy', $limit->id) }}" method="POST" style="display:inline-block;">
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

    <!-- <hr> -->
@endsection