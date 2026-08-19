<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PropertyImage;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Property extends Model
{

public function images()
{
    return $this->hasMany(PropertyImage::class);
}
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'purpose',
        'price',
        'location',
        'contact',
        'area',
        'bedrooms',
        'bathrooms',
        'status',
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function favorites(): MorphMany
{
    return $this->morphMany(Favorite::class, 'favoritable');
}
}