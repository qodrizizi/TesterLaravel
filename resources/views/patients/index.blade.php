@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Room</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->room->name }}</td>
                    <td>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
