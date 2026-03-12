<?php

use App\Http\Controllers\Admin\PassengerController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TravelScheduleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/travel', TravelScheduleController::class);
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('reports', [ReportController::class, 'passengerReport'])->name('report.passenger');
    Route::get('reports/{id}', [ReportController::class, 'passengerHistory'])->name('report.history');
});
Route::middleware(['auth', 'role:passenger'])->prefix('passenger')->group(function () {
    Route::get('bookings', [PassengerController::class, 'index'])->name('bookings.index');
    Route::get('bookings/create/{travelId}', [PassengerController::class, 'create'])->name('bookings.create');
    Route::post('bookings', [PassengerController::class, 'store'])->name('bookings.store');
});
require __DIR__ . '/auth.php';
