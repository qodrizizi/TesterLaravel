@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Patient</h1>
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Patient Name</label>
            <input type="text" name="name" class="form-control" value="{{ $patient->name }}" required>
        </div>
        <div class="form-group">
            <label for="room_id">Room</label>
            <select name="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $room->id == $patient->room_id ? 'selected' : '' }}>
                        {{ $room->name }} ({{ $room->level }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Patient</button>
    </form>
</div>
@endsection
