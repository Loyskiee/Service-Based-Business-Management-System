<?php

namespace App\Repositories;

use App\Models\Booking;

/**
 * Implementation of Base Repository
 */

class BookingRepository extends Repository
{

    public function __construct(protected Booking $booking){}

    /**
     * It gets all booking
     */
    public function all()
    {
        return $this->booking
        ->with(['customer', 'service', 'user'])
        ->get();

    }

    /**
     * Find specific booking based on id, if not found throws an 404
     */
    public function find($id)
    {
        return $this->booking
        ->with(['customer', 'service', 'user'])
        ->findOrFail($id);
    }

    /**
     * Creates a booking
     */
    public function create(array $data)
    {
        return $this->booking->create($data);
    }

    /**
     * Update a specific booking 
     */

    public function update($id, array $data)
    {
        $booking = $this->find($id);
        $booking->update($data);
        return $booking;
    }

    /**
     * Delete a specific booking
     */
    public function delete($id)
    {
        $booking = $this->find($id);
        return $booking->delete();
    }
    
    public function findByBusinessId($businessId)
    {
        return $this->booking
        ->with(['customer', 'service', 'user'])
        ->where('business_id', $businessId)
        ->latest();
    }


}