<?php

namespace App\Http\Controllers\Api;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $properties = Property::all();
        return response()->json($properties);


        // $properties = Property::with('company', 'user'); // or any other pagination number you prefer

        // return response()->json($properties);
    }

     /**
     * get Properties By Category
     */


    public function getPropertiesByCategory($category)
    {
        $properties = Property::with(['images', 'user', 'company'])
            ->where('categories', 'like', '%' . $category . '%')
            ->paginate(10); // You can adjust pagination as needed

        return response()->json($properties);
    }

    /**
     * search a searchTerm.
     */

    public function search(Request $request)
    {
        $searchTerm = $request->query('searchTerm', '');

        $properties = Property::where('name', 'LIKE', "%{$searchTerm}%")
                      ->get();

        return response()->json($properties);
    }

     /**
     * filter properties
     */

    public function filter(Request $request)
    {
        $query = Property::query();

        // Filter by City
        if ($request->has('city') && $request->city != '') {
            $query->where('city', $request->city);
        }

        // Filter by Area
        if ($request->has('area') && $request->area != '') {
            $query->where('area', $request->area);
        }

        // Filter by Furnishing
        if ($request->has('furnishing') && $request->furnishing != '') {
            $query->where('furnishing', $request->furnishing);
        }

        // Filter by Price Range
        if ($request->has('price_from') && $request->price_from != '') {
            $query->where('price', '>=', $request->price_from);
        }
        if ($request->has('price_to') && $request->price_to != '') {
            $query->where('price', '<=', $request->price_to);
        }

        // Filter by Property Type
        if ($request->has('property_type') && $request->property_type != '') {
            $query->where('property_type', $request->property_type);
        }

        // Filter by Number of Bedrooms
        if ($request->has('bedrooms') && $request->bedrooms != '') {
            $query->where('bedrooms', $request->bedrooms);
        }

        // Filter by Number of Bathrooms
        if ($request->has('bathrooms') && $request->bathrooms != '') {
            $query->where('bathrooms', $request->bathrooms);
        }

        // Add other filters as needed

        $properties = $query->get();

        return response()->json($properties);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $property = Property::with(['images', 'user', 'company'])->findOrFail($id);

    return response()->json([
        'id' => $property->id,
        'property_name' => $property->property_name,
        'property_type' => $property->property_type,
        'categories' => $property->categories,
        'city' => $property->city,
        'region' => $property->region,
        'floor' => $property->floor,
        'rooms' => $property->rooms,
        'bathrooms' => $property->bathrooms,
        'furnishing' => $property->furnishing,
        'property_area' => $property->property_area,
        'price' => $property->price,
        'description' => $property->description,
        'status' => $property->status,
        'images' => $property->images,

        'user_email' => $property->user->email ?? null,
        'user_phone' => $property->user->phone ?? null,
        'company_id' => $property->company_id,
      
        'company_logo' => $property->company->logo_url ?? 'Not Available', // Add this line

        
        'user_email' => $property->user->email ?? 'Not Available',
        'user_phone' => $property->user->phone ?? 'Not Available',
        'company_name' => $property->company->name ?? 'Not Available',

        'images' => $property->images->map(function ($image) {
            return $image->url; // Assuming 'url' is the field for image URL
        }),
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /**
    *Favorite properties
    */
     /**
     * Display a list of the user's favorite properties.
     */
    public function getFavoriteIndex()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->with('property')->get();

        return response()->json($favorites);
    }

    /**
     * Store a newly created favorite in storage.
     */
    public function getFavoriteStore(Request $request)
    {
        $user = Auth::user();
        $favorite = new Favorite();
        $favorite->user_id = $user->id;
        $favorite->property_id = $request->property_id;
        $favorite->save();

        return response()->json(['message' => 'Property added to favorites successfully']);
    }

    /**
     * Remove the specified favorite from storage.
     */
    public function getFavoriteDestroy($id)
    {
        $user = Auth::user();
        $favorite = Favorite::where('user_id', $user->id)->where('property_id', $id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Favorite removed successfully']);
        }

        return response()->json(['message' => 'Favorite not found'], 404);
    }
}
