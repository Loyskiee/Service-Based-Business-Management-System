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

    public function serviceJob():HasMany
    {
        return $this->hasMany(ServiceJob::class);
    }
}
