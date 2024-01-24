<?php

namespace App\Http\Controllers\Api;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyCollection;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $properties = Property::with(['images', 'user', 'company'])->orderBy('updated_at', 'desc')->get();

        $propertiesData = $properties->map(function ($property) {
            return [
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
                'user_email' => $property->user->email ?? 'Not Available',
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->company_name ?? 'Not Available',
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
            ];
        });

        return new PropertyCollection($propertiesData);

        // return response()->json($propertiesData);
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
            'user_email' => $property->user->email ?? 'Not Available',
            'phone_number' => $property->user->phone_number ?? 'Not Available',
            'company_id' => $property->company_id,
            'company_name' => $property->company->company_name ?? 'Not Available',
            'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string

        
            // 'company_logo' => $property->company->logo_url ?? 'Not Available', // Add this line

            'images' => $property->images->map(function ($image) {
                return $image->url; // Assuming 'url' is the field for image URL
            }),
        ]);
    }

     /**
     * comment the specified in property.
     */

    public function comment($property_id)
    {
        $property = Property::with(['comments.user'])->findOrFail($property_id);

        $comments = $property->comments->map(function ($comment) {
            return [
                'id' => $comment->id,
                'body' => $comment->body,
                'username' => $comment->user->name, // Assuming 'name' is the username field in your User model
                'created_at' => $comment->created_at,
                'replies' => $comment->replies // You might want to format this similarly
            ];
        });

        return response()->json([
            'property_id' => $property->id,
            'comments' => $comments
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

     /**
     * getSimilarProperties .
     */

    public function getSimilarProperties($propertyId)
    {
        $property = Property::findOrFail($propertyId);

        // Assuming 'type' and 'location' are columns in your properties table
        $similarProperties = Property::where('id', '!=', $propertyId)
                                    ->where('type', $property->type)
                                    ->where('location', $property->location)
                                    ->limit(10) // You can adjust the number of similar properties
                                    ->get();

        return response()->json($similarProperties);
    }
}
