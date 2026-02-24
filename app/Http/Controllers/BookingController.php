<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Service;
use App\Repositories\BookingRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Transaction of the Service
 * 
 * Is it complete
 * 
 * When was the schedule given, etc.
 */
class BookingController extends Controller
{

    public function __construct(protected BookingRepository $bookingRepo) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get list of bookings
       $bookings = $this->bookingRepo->findByBusinessId(Auth::user()->business_id)
       ->paginate(10);

       return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        // Get the customer and services because it's fk
       $customers = Customer::where('business_id', Auth::user()->business_id)->get();
       $services  = Service::where('business_id', Auth::user()->business_id)->get();

        return view('booking.create', compact('customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        // validate the request
       $validated = $request->validated();
       $validated['business_id'] = Auth::user()->business_id; // Automatic goes to the business
       $validated['user_id'] = Auth::id();

        $this->bookingRepo->create($validated);

        return redirect()->route('bookings.index')
        ->with('success', 'Booking created');
    }

    /**
     * Show a form for updating a booking
     */
    public function edit(Booking $booking) 
    {
        $customers = Customer::where('business_id', Auth::user()->business_id)->get();
        $services = Service::where('business_id', Auth::user()->business_id)->get();
      
        return view('booking.edit', compact('booking','customers', 'services'));
    }

    /**
     * Update a specific booking
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking = $this->bookingRepo->update($booking->id, $request->validated());
        return redirect()->route('bookings.index');
    }

    /**
     * Delete specific booking
     */
     public function destroy(Booking $booking) 
     {
        $this->bookingRepo->delete($booking->id);

        return redirect()->route('bookings.index');
     }
}
