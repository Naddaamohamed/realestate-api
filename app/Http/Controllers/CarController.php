<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\CarImage;

class CarController extends Controller
{
    /**
     * Display all cars.
     */
    public function index()
    {
        $cars = Car::with('images')
            ->latest()
            ->get();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new car.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created car.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'brand' => 'required|string|max:100',
        'model' => 'required|string|max:100',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'price' => 'required|numeric|min:0',
        'mileage' => 'required|integer|min:0',
        'transmission' => 'required|string|max:100',
        'fuel_type' => 'required|string|max:100',
        'location' => 'required|string|max:255',
        'contact' => 'nullable|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string|max:100',

        // Images
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
    ]);

    $validated['user_id'] = auth()->id();

    // Create the car
    $car = Car::create($validated);

    // Upload car images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {

            $path = $image->store('cars', 'public');

            CarImage::create([
                'car_id' => $car->id,
                'image' => $path,
            ]);
        }
    }

    return redirect()
        ->route('cars.index')
        ->with('success', 'Car created successfully.');
}
    /**
     * Display a single car.
     */
    public function show(string $id)
    {
        $car = Car::with(['user', 'images'])
            ->findOrFail($id);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing a car.
     */
    public function edit(string $id)
    {
        $car = Car::with('images')
            ->findOrFail($id);

        // Only the owner can edit the car
        if ($car->user_id !== auth()->id()) {
            abort(403);
        }

        return view('cars.edit', compact('car'));
    }

    /**
     * Update a car.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::findOrFail($id);

        // Only the owner can update the car
        if ($car->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'transmission' => 'required|string|max:100',
            'fuel_type' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:100',
        ]);

        $car->update($validated);

        return redirect()
            ->route('cars.show', $car->id)
            ->with('success', 'Car updated successfully.');
    }

    /**
     * Delete a car.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        // Only the owner can delete the car
        if ($car->user_id !== auth()->id()) {
            abort(403);
        }

        $car->delete();

        return redirect()
            ->route('cars.index')
            ->with('success', 'Car deleted successfully.');
    }
}
