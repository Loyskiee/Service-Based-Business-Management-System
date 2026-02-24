<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Business extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'address',
        'contact',
    ];

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function customers():HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function services():HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function bokings():HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
