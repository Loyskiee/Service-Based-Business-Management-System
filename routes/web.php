<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    

Route::middleware(['auth'])->group(function () {

     // Creating a business
    Route::resource('business', BusinessController::class)
    ->only('create', 'store');

    // OMS related routes
    Route::resource('customers', CustomerController::class) 
    ->only('index', 'create', 'store'); 

    Route::resource('services', ServiceController::class)
    ->only('index', 'create', 'store');

    Route::resource('bookings', BookingController::class)
    ->except('show');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        
        'totalBookings' => Booking::count(),
        'pendingBookings' => Booking::where('status', 'pending')->count(),

        
        'upcomingBookings' => Booking::with(['customer', 'service'])
            ->orderBy('scheduled_at', 'asc')
            ->take(10)
            ->get(),
    ]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
