<?php

namespace App\Enums;

enum BookingStatus: string
{    
    // put the status here (pending, confirmed, cancelled, completed)
    
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Cancelled = 'cancelled';
    case Completed = 'completed';
}
