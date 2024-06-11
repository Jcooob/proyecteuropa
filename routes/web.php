<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

Route::get('/bookings/create/{room}', [BookingController::class, 'create'])->name('bookings.create');

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');


Route::get('/dashboard', function () {
    return redirect()->route('rooms.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
