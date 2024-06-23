@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Patient</h1>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Patient Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="room_id">Room</label>
            <select name="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }} ({{ $room->level }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Patient</button>
    </form>
</div>
@endsection
