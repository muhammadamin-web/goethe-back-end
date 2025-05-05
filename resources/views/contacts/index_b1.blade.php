@extends('layouts.app')

@section('header', 'Applications')

@section('content')
    <div class="container">
        <h2>List of Applications B1</h2>
        <form method="GET" class="mb-3">
            <div class="row g-2 align-items-end">
                <div class="col-auto">
                    <label for="testFilter" class="form-label">Filter by test</label>
                    <select name="test_id" id="testFilter" class="form-select" onchange="this.form.submit()">
                        <option value="">All tests</option>
                        @foreach($tests as $test)
                            <option value="{{ $test->id }}" {{ (isset($testId) && $testId==$test->id) ? 'selected' : '' }}>{{ $test->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <form action="{{ route('contacts_b1.delete') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"></th>
                        <th>ID</th>
                        <th>Name and surname</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Test</th>
                        <th>Module</th>
                        <th>Date of birth</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td><input type="checkbox" name="lead_ids[]" value="{{ $contact->id }}"></td>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->phone_number }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->city }}</td>
                            <td>{{ $contact->test->name ?? 'Test topilmadi' }}</td>
                            <td>
                            @php
                                $rawModule = $contact->module;
                                $decodedOnce = json_decode($rawModule);
                                $modules = is_string($decodedOnce) ? json_decode($decodedOnce) : $decodedOnce;

                                $moduleTexts = [
                                    '1' => 'Понимание на слух',
                                    '2' => 'Понимание прочитанного',
                                    '3' => 'Запись',
                                    '4' => 'Говорящий',
                                ];
                            @endphp

                            @if(is_array($modules))
                                @foreach($modules as $module)
                                    {{ $moduleTexts[$module] ?? 'N/A' }}@if(!$loop->last), @endif
                                @endforeach
                            @else
                                {{ $contact->module }}
                            @endif
                            </td>
                            <td>{{ $contact->birth_date }}</td>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger">Delete Selected Contacts</button>
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