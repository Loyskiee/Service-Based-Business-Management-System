<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'business_id',
        'name',
        'contact',
    ];

    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function serviceJobs():HasMany
    {
        return $this->hasMany(ServiceJob::class);
    }
}
