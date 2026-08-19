<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyImage;


class PropertyController extends Controller
{
    /**
     * Display all properties.
     */
    public function index()
    {
        $properties = Property::with('images')
            ->latest()
            ->get();

        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created property.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'type' => 'required|string|max:100',
        'purpose' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',

        // Contact information
        'contact' => 'required|string|max:255',

        'location' => 'required|string|max:255',
        'area' => 'required|numeric|min:0',
        'bedrooms' => 'required|integer|min:0',
        'bathrooms' => 'required|integer|min:0',
        'status' => 'required|string|max:100',

        // Images
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
    ]);

    // Assign the logged-in user as the owner
    $validated['user_id'] = auth()->id();

    // Create the property
    $property = Property::create($validated);

    // Upload property images
    if ($request->hasFile('images')) {

        foreach ($request->file('images') as $image) {

            $path = $image->store('properties', 'public');

            PropertyImage::create([
                'property_id' => $property->id,
                'image' => $path,
            ]);
        }
    }

    return redirect()
        ->route('properties.index')
        ->with('success', 'Property created successfully.');
}
    /**
     * Display a single property.
     */
    public function show(string $id)
    {
        $property = Property::with(['user', 'images'])
            ->findOrFail($id);

        return view('properties.show', compact('property'));
    }

    /**
     * Show the form for editing a property.
     */
    public function edit(string $id)
    {
        $property = Property::with('images')
            ->findOrFail($id);

        // Only the owner can edit the property
        if ($property->user_id !== auth()->id()) {
            abort(403);
        }

        return view('properties.edit', compact('property'));
    }

    /**
     * Update a property.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::findOrFail($id);

        // Only the owner can update the property
        if ($property->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'purpose' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',

            // Contact information
            'contact' => 'required|string|max:255',

            'location' => 'required|string|max:255',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'status' => 'required|string|max:100',
        ]);

        $property->update($validated);

        return redirect()
            ->route('properties.show', $property->id)
            ->with('success', 'Property updated successfully.');
    }

    /**
     * Delete a property.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        // Only the owner can delete the property
        if ($property->user_id !== auth()->id()) {
            abort(403);
        }

        $property->delete();

        return redirect()
            ->route('properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}