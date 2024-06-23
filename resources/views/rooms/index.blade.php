@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Level</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->level }}</td>
                    <td>{{ $room->is_available ? 'Available' : 'Occupied' }}</td>
                    <td>
                        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline-block;">
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
