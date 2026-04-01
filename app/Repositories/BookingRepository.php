<?php

namespace App\Repositories;

use App\Enums\BookingStatus;
use App\Models\Booking;

/**
 * Implementation of Base Repository
 */

class BookingRepository extends Repository
{

    public function __construct(protected Booking $booking)
    {
        parent::__construct($booking);
    }

    /**
     * Find a specific booking by id with customer, service, and user
     *  
     */
    public function findByBusinessId($businessId)
    {
        return $this->booking
        ->with(['customer', 'service', 'user'])
        ->where('business_id', $businessId)
        ->latest();
    }

    // Find a specific booking with a status
    public function findByStatus(int $businessId, BookingStatus $status)
    {
        return $this->booking
        ->with(['customer', 'service', 'user'])
        ->where('business_id', $businessId)
        ->where('status', $status)
        ->latest()
        ->paginate(10);

    }
}