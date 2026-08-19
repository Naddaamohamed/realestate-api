<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Car extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'brand',
        'model',
        'year',
        'price',
        'contact',
        'mileage',
        'transmission',
        'fuel_type',
        'location',
        'description',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }
    public function favorites(): MorphMany
{
    return $this->morphMany(Favorite::class, 'favoritable');
}
}