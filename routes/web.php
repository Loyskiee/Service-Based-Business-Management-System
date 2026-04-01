<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Enums\BookingStatus;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // OMS related routes
    Route::resource('customers', CustomerController::class) 
    ->only('index', 'create', 'store', 'show'); 

    Route::resource('services', ServiceController::class)
    ->only('index', 'create', 'store');

    Route::get('/bookings/status/{status}', [BookingController::class, 'getByStatus']); // get specific booking based on status
    Route::resource('bookings', BookingController::class);
    
    // Admin only related routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index')
    ->can('admin');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->can('admin');
    Route::post('/users', [UserController::class, 'store'])->name('users.store')
    ->can('admin');

    
});


Route::get('/dashboard', function () {
    $businessId = Auth::user()->business_id;

    return view('dashboard', [
        'totalBookings'     => Booking::where('business_id', $businessId)->count(),
        'pendingBookings'   => Booking::where('business_id', $businessId)->where('status', BookingStatus::Pending)->count(),
        'confirmedBookings' => Booking::where('business_id', $businessId)->where('status', BookingStatus::Confirmed)->count(),
        'completedBookings' => Booking::where('business_id', $businessId)->where('status', BookingStatus::Completed)->count(),
        'upcomingBookings'  => Booking::where('business_id', $businessId)->with(['customer', 'service'])->latest()->take(10)->get(),
    ]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
