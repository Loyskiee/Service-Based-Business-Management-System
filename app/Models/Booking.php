<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    use HasFactory, Notifiable;
    /**
     * Add pay, cancel, and complete behavior
     */
    protected $fillable = [
        'customer_id',
        'service_id',
        'user_id',
        'status',
        'scheduled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'status' => BookingStatus::class,
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function service():BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
