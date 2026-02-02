<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreBookingRequest;
use App\Repositories\Interfaces\BookingRepositoryInterface;
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

    public function __construct(protected BookingRepositoryInterface $bookingRepo) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * fetch the model with customer, service, and user
         * 
         *  wherein you will get the authenticated business_id
         */

            $bookings = $this->bookingRepo->findByBusinessId(
            Auth::user()->business_id
        );

       // return view for booking index
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        // validate the request
       $validated = $request->validated();
        
        // Add business context and defaults
        $validated['business_id'] = Auth::user()->business_id;
        $validated['user_id'] = Auth::id();
        $validated['status'] = $validated['status'] ?? 'pending';
        
        $booking = $this->bookingRepo->create($validated);

        //return view
    }

    // edit

    // update

    // delete
}
