@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Room Details</h1>
    <p><strong>Name:</strong> {{ $room->name }}</p>
    <p><strong>Level:</strong> {{ $room->level }}</p>
    <p><strong>Availability:</strong> {{ $room->is_available ? 'Available' : 'Occupied' }}</p>
    <a href="{{ route('rooms.index') }}" class="btn btn-primary">Back to Rooms</a>
</div>
@endsection
