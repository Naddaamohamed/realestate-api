<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display user's favorites.
     */
    public function index()
    {
        $favorites = auth()->user()
            ->favorites()
            ->with('favoritable')
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Add item to favorites.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:car,property',
            'id' => 'required|integer',
        ]);

        if ($request->type === 'car') {
            $item = Car::findOrFail($request->id);
        } else {
            $item = Property::findOrFail($request->id);
        }

        Favorite::firstOrCreate([
            'user_id' => auth()->id(),
            'favoritable_type' => get_class($item),
            'favoritable_id' => $item->id,
        ]);

        return back()->with('success', 'Added to favorites.');
    }

    /**
     * Remove item from favorites.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'type' => 'required|in:car,property',
            'id' => 'required|integer',
        ]);

        $model = $request->type === 'car'
            ? Car::class
            : Property::class;

        Favorite::where('user_id', auth()->id())
            ->where('favoritable_type', $model)
            ->where('favoritable_id', $request->id)
            ->delete();

        return back()->with('success', 'Removed from favorites.');
    }
}