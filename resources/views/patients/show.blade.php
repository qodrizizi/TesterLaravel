@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patient Details</h1>
    <p><strong>Name:</strong> {{ $patient->name }}</p>
    <p><strong>Room:</strong> {{ $patient->room->name }} ({{ $patient->room->level }})</p>
    <a href="{{ route('patients.index') }}" class="btn btn-primary">Back to Patients</a>
</div>
@endsection
