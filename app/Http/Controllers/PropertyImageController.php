<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyImageController extends Controller
{
    /**
     * Add a new image to a property.
     */
    public function store(Request $request, Property $property)
    {
        // Only the owner can add images
        if ($property->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $path = $request->file('image')->store('properties', 'public');

        $property->images()->create([
            'image' => $path,
        ]);

        return back()->with('success', 'Image added successfully.');
    }

    /**
     * Delete a property image.
     */
    public function destroy(PropertyImage $propertyImage)
    {
        // Only the owner of the property can delete its image
        if ($propertyImage->property->user_id !== auth()->id()) {
            abort(403);
        }

        // Delete physical file from storage
        if (Storage::disk('public')->exists($propertyImage->image)) {
            Storage::disk('public')->delete($propertyImage->image);
        }

        // Delete database record
        $propertyImage->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}