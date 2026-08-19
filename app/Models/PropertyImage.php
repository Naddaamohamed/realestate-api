<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Property;

class PropertyImage extends Model
{
    protected $fillable = [
        'property_id',
        'image',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}