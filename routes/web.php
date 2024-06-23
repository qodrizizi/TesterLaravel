<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PatientController;


Route::get('/', function () {
    return redirect()->route('rooms.index');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::post('/rooms/{id}/update-availability', [RoomController::class, 'updateAvailability'])->name('rooms.update.availability');
Route::resource('rooms', RoomController::class)->except([
    'index'
]);


Route::post('/patients/{id}/discharge', [PatientController::class, 'discharge'])->name('patients.discharge');
Route::resource('patients', PatientController::class)->except([
    'store', 
]);


