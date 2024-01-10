<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the user's favorite properties.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('property')->get();
        return view('favorites.index', compact('favorites'));
    }

    /**
     * Store a newly created favorite in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $propertyId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $propertyId)
    {
        Favorite::create([
            'user_id' => Auth::id(),
            'property_id' => $propertyId
        ]);

        return back()->with('success', 'Property added to favorites.');
    }

    /**
     * Remove the specified favorite from the database.
     *
     * @param  int $favoriteId
     * @return \Illuminate\Http\Response
     */
    public function destroy($favoriteId)
    {
        $favorite = Favorite::findOrFail($favoriteId);

        if ($favorite->user_id != Auth::id()) {
            abort(403);
        }

        $favorite->delete();
        return back()->with('success', 'Favorite removed successfully.');
    }
}
