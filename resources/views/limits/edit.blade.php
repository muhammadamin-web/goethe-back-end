@extends('layouts.app')

@section('header', 'Edit A1 Test Date')

@section('content')
    <div class="container">
        <h2>Edit A1 Test Date</h2>
        <form action="{{ route('limits.update.test', $limit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group pb-3">
                <label for="name">Test Name:</label>
                <input type="text" name="name" value="{{ $limit->name }}" class="form-control" required>
            </div>
            <div class="form-group pb-3">
                <label for="start_date">Start Date and Time:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" name="start_date_date" value="{{ $limit->start_date ? $limit->start_date->format('Y-m-d') : '' }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" name="start_date_time" value="{{ $limit->start_date ? $limit->start_date->format('H:i') : '' }}" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group pb-3">
                <label for="end_date">End Date and Time:</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" name="end_date_date" value="{{ $limit->end_date ? $limit->end_date->format('Y-m-d') : '' }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" name="end_date_time" value="{{ $limit->end_date ? $limit->end_date->format('H:i') : '' }}" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group pb-3">
                <label for="max_submissions">Max Submissions:</label>
                <input type="number" name="max_submissions" value="{{ $limit->max_submissions }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-0 mb-3">Update</button>
        </form>
    </div>
@endsection
