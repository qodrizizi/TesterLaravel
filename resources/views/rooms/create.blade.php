@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Room Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" name="level" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Room</button>
    </form>
</div>
@endsection
