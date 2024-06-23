<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PatientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes for Rooms
Route::get('/rooms', [RoomController::class, 'index']); // GET all rooms
Route::post('/rooms', [RoomController::class, 'store']); // POST new room
Route::post('/rooms/{id}/update-availability', [RoomController::class, 'updateAvailability']); // POST update availability of a room

// Routes for Patients
Route::get('/patients', [PatientController::class, 'index']);
Route::post('/patients', [PatientController::class, 'store']);
Route::post('/patients/{id}/discharge', [PatientController::class, 'discharge']); 