<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display all cars.
     */
    public function index()
    {
        $cars = Car::with(['images', 'user'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $cars,
        ]);
    }

    /**
     * Display a single car.
     */
    public function show(string $id)
    {
        $car = Car::with(['images', 'user'])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $car,
        ]);
    }

    /**
     * Store a newly created car.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'contact' => 'required|string|max:255',
            'mileage' => 'required|integer',
            'transmission' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        $car = Car::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Car created successfully.',
            'data' => $car,
        ], 201);
    }

    public function update(Request $request, string $id)
{
    $car = Car::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer',
        'price' => 'required|numeric',
        'contact' => 'required|string|max:255',
        'mileage' => 'required|integer',
        'transmission' => 'required|string|max:255',
        'fuel_type' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|string|max:255',
    ]);

    $car->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Car updated successfully.',
        'data' => $car,
    ]);
}

public function destroy(string $id)
{
    $car = Car::findOrFail($id);

    $car->delete();

    return response()->json([
        'success' => true,
        'message' => 'Car deleted successfully.',
    ]);
}
}