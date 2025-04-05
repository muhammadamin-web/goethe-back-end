@extends('layouts.app')

@section('header', 'Limits')

@section('content')
    <div class="container">
        <h2>Limit Management</h2>
        <form action="{{ route('limits.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="end_date">End date:</label>
                <input type="date" name="end_date" value="{{ $limit->end_date ? $limit->end_date->format('Y-m-d') : '' }}" class="form-control">            </div>
            <div class="form-group">
                <label for="max_submissions">Maximum number of applications:</label>
                <input type="number" name="max_submissions" value="{{ $limit->max_submissions ?? '' }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
        @if(session('success'))
            <div class="alert alert-success" style="margin-top: 20px;">{{ session('success') }}</div>
        @endif
    </div>
@endsection