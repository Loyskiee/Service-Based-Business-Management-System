<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact',
    ];

    public function user():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function customer():HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function service():HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function boking():HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
