<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Car;
use App\Models\Property;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display the authenticated user's favorites.
     */
    public function index()
    {
        $favorites = Favorite::with('favoritable')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $favorites,
        ]);
    }

    /**
     * Add a property or car to favorites.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:property,car',
            'id' => 'required|integer',
        ]);

        if ($validated['type'] === 'property') {
            $favoritable = Property::findOrFail($validated['id']);
        } else {
            $favoritable = Car::findOrFail($validated['id']);
        }

        $favorite = Favorite::create([
            'user_id' => auth()->id(),
            'favoritable_type' => get_class($favoritable),
            'favoritable_id' => $favoritable->id,
        ]);

        $favorite->load('favoritable');

        return response()->json([
            'success' => true,
            'message' => 'Added to favorites successfully.',
            'data' => $favorite,
        ], 201);
    }

    /**
     * Remove a favorite.
     */
    public function destroy(string $id)
    {
        $favorite = Favorite::where('user_id', auth()->id())
            ->findOrFail($id);

        $favorite->delete();

        return response()->json([
            'success' => true,
            'message' => 'Removed from favorites successfully.',
        ]);
    }
}