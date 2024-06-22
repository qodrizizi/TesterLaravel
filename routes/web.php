<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\PatientController;

Route::get('/rooms', [RoomController::class, 'index']);
Route::post('/rooms/{id}/update-availability', [RoomController::class, 'updateAvailability']);

Route::post('/patients', [PatientController::class, 'store']);
Route::post('/patients/{id}/discharge', [PatientController::class, 'discharge']);

