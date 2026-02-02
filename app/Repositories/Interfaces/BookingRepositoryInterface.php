<?php

namespace App\Repositories\Interfaces;

use App\Models\Booking;

/**
 * Contract on how the repository will work
 */
interface BookingRepositoryInterface
{
    public function all();
    public function find($id); // Add Booking model as a return type
      /**
     * public function save(Booking $booking) 
     * 
     * add void return 
     * 
     * save method persist the updated status
     */
    public function create(array $data);
    public function update($id,array $data);
    public function delete($id);
    public function findByBusinessId($businessId);
}
