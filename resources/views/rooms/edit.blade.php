@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Room Name</label>
            <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" name="level" class="form-control" value="{{ $room->level }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Room</button>
    </form>
</div>
@endsection
