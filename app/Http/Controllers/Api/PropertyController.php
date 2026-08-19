<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display all properties.
     */
    public function index()
    {
        $properties = Property::with(['images', 'user'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $properties,
        ]);
    }

    /**
     * Display a single property.
     */
    public function show(string $id)
    {
        $property = Property::with(['images', 'user'])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $property,
        ]);
    }

    /**
     * Store a new property.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'purpose' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'contact' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'status' => 'required|string|max:100',
        ]);

        $validated['user_id'] = auth()->id();

        $property = Property::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Property created successfully.',
            'data' => $property,
        ], 201);
    }

    /**
     * Update a property.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::findOrFail($id);

        // Only the owner can update the property
        if ($property->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'purpose' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'contact' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'status' => 'required|string|max:100',
        ]);

        $property->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Property updated successfully.',
            'data' => $property,
        ]);
    }

    /**
     * Delete a property.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        // Only the owner can delete the property
        if ($property->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $property->delete();

        return response()->json([
            'success' => true,
            'message' => 'Property deleted successfully.',
        ]);
    }
}