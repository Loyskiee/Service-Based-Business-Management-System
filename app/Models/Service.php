<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'service_name',
        'price',
    ];

    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class);
    }     

    public function bookings():HasMany
    {
        return $this->hasMany(Booking::class);
    }
    
}
