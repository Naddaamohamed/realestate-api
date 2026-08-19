<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarImageController extends Controller
{
    /**
     * Add images to a car.
     */
    public function store(Request $request, Car $car)
    {
        // Only owner can add images
        if ($car->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store('cars', 'public');

            $car->images()->create([
                'image' => $path,
            ]);
        }

        return back()->with(
            'success',
            'Car images added successfully.'
        );
    }

    /**
     * Delete a car image.
     */
    public function destroy(CarImage $carImage)
    {
        // Only owner can delete image
        if ($carImage->car->user_id !== auth()->id()) {
            abort(403);
        }

        if (Storage::disk('public')->exists($carImage->image)) {
            Storage::disk('public')->delete($carImage->image);
        }

        $carImage->delete();

        return back()->with(
            'success',
            'Car image deleted successfully.'
        );
    }
}