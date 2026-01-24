<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'business_id',
        'name',
        'price',
    ];

    public function business():BelongsTo
    {
        return $this->belongsTo(Business::class);
    }     

    public function serviceJob():HasMany
    {
        return $this->hasMany(ServiceJob::class);
    }
}
