@extends('layouts.app')

@section('header', 'Create B1 Test Date')

@section('content')
    <div class="container">
        <h2>Create New B1 Test Date</h2>
        <form action="{{ route('limits_b1.store') }}" method="POST">
            @csrf
            <div class="form-group pb-3">
                <label for="name">Test Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group pb-3">
                <label for="start_date">Start Date and Time:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" name="start_date_date" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" name="start_date_time" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group pb-3">
                <label for="end_date">End Date and Time:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" name="end_date_date" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" name="end_date_time" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group pb-3">
                <label for="max_submissions">Max Submissions:</label>
                <input type="number" name="max_submissions" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-0 mb-3">Create</button>
        </form>
    </div>
@endsection
