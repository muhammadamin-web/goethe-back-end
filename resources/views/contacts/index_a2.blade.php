@extends('layouts.app')

@section('header', 'Applications')

@section('content')
    <div class="container">
        <h2>List of Applications A2</h2>
        <form action="{{ route('contacts_a2.delete') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th> <!-- Check All Checkbox -->
                        <th>ID</th>
                        <th>Name and surname</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Date of birth</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td><input type="checkbox" name="lead_ids[]" value="{{ $contact->id }}"></td> <!-- Individual Checkbox -->
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->phone_number }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->city }}</td>
                            <td>{{ $contact->birth_date }}</td>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger">Delete Selected Contacts</button> <!-- Delete Button -->
        </form>
    </div>

    <script>
        document.getElementById('checkAll').onclick = function() {
            var checkboxes = document.querySelectorAll('input[name="lead_ids[]"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        };
    </script>
@endsection