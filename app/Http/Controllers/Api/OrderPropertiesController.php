<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Region;
use App\Models\PropertyType;
use App\Models\Furnishing;
use App\Models\OrderProperty;
use App\Models\AdType;
use App\Http\Resources\OrderPropertyCollection;
use App\Http\Resources\OrderPropertyResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderPropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderProperties = OrderProperty::with(['user', 'category', 'region', 'region', 'adType', 'furnishing','propertyType',])
            ->orderBy('updated_at', 'desc')
            ->get();

        $orderPropertiesData = $orderProperties->map(function ($orderProperty) {
            return [
                'id' => $orderProperty->id,
                'user_name' => $orderProperty->user->name ?? 'Not Available',
                'user_name_en' => $orderProperty->user->name_en ?? 'Not Available',
                'phone_number' => $orderProperty->user->phone_number ?? 'Not Available',
                'category_name' => $orderProperty->category->name,
                'category_name_en' => $orderProperty->category->name_en ?? 'Not Available',
                'city_name' => $orderProperty->city->name,
                'city_name_en' => $orderProperty->city->name_en ?? 'Not Available',
                'region_name' => $orderProperty->region->name,
                'region_name_en' => $orderProperty->region->name_en ?? 'Not Available',
                'ad_type' => $orderProperty->adType->name ?? 'Not Available',
                'ad_type_name_en' => $orderProperty->adType->name_en ?? 'Not Available',
                'property_type_name' => $orderProperty->propertyType->name ?? 'Not Available',
                'property_type_name_en' => $orderProperty->propertyType->name_en ?? 'Not Available',
                'furnishing' => $orderProperty->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $orderProperty->furnishing->name_en ?? 'Not Available',
                'img_profile' => $orderProperty->user->userProfile->img_profile ?? 'Not Available',
                'floor' => $orderProperty->floor,
                'rooms' => $orderProperty->rooms,
                'bathrooms' => $orderProperty->bathrooms,
                'price_min' => $orderProperty->price_min,
                'price_max' => $orderProperty->price_max,
                'property_area_min' => $orderProperty->property_area_min,
                'property_area_max' => $orderProperty->property_area_max,
                'description' => $orderProperty->description,
                'description_en' => $orderProperty->description_en ?? '', // Change null to empty string for consistency
                'updated_at' => $orderProperty->updated_at->toDateTimeString(),
            ];
        });

        // Wrap the orderPropertiesData in a 'data' key
        return response()->json(['data' => $orderPropertiesData]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized access.'], 401);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'property_type_id' => 'required|exists:property_types,id',
            'furnishing_id' => 'required|exists:furnishings,id',
            'ad_type_id' => 'required|exists:ad_types,id',
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'required|exists:regions,id',
            'floor' => 'sometimes|integer',
            'rooms' => 'sometimes|integer',
            'bathrooms' => 'sometimes|integer',
            'price_min' => 'required|numeric',
            'price_max' => 'required|numeric',
            'property_area_min' => 'required|numeric',
            'property_area_max' => 'required|numeric',
            'description' => 'sometimes|string',
            'description_en' => 'sometimes|string',
        ]);

        $orderProperty = new OrderProperty();
        $orderProperty->fill($validatedData);
        $orderProperty->user_id = $user->id;
        // Assuming you have a status or any additional fields you wish to auto-assign
        // $orderProperty->status = 'some_default_value';

        if ($orderProperty->save()) {
            return response()->json([
                'message' => 'Order Property added successfully!',
                'orderProperty' => $orderProperty->load(['user', 'category', 'propertyType', 'furnishing', 'adType', 'city', 'region']),
                // Include any other relationships you wish to load with the response
            ], 201);
        } else {
            return response()->json(['message' => 'Failed to save Order Property.'], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $orderProperty = OrderProperty::with([
                'propertyType',
                'furnishing',
                'adType',
                'category',
                'city',
                'region',
                'user',
            ])->findOrFail($id);

            // You can adjust the fields according to what's available in your OrderProperty model
            $orderPropertyData = [
                'id' => $orderProperty->id,
                'user_name' => $orderProperty->user->name ?? 'Not Available',
                'user_name_en' => $orderProperty->user->name_en ?? 'Not Available',
                'phone_number' => $orderProperty->user->phone_number ?? 'Not Available',
                'category_name' => $orderProperty->category->name,
                'category_name_en' => $orderProperty->category->name_en ?? 'Not Available',
                'city_name' => $orderProperty->city->name,
                'city_name_en' => $orderProperty->city->name_en ?? 'Not Available',
                'region_name' => $orderProperty->region->name,
                'region_name_en' => $orderProperty->region->name_en ?? 'Not Available',
                'ad_type' => $orderProperty->adType->name ?? 'Not Available',
                'ad_type_name_en' => $orderProperty->adType->name_en ?? 'Not Available',
                'property_type_name' => $orderProperty->propertyType->name ?? 'Not Available',
                'property_type_name_en' => $orderProperty->propertyType->name_en ?? 'Not Available',
                'furnishing' => $orderProperty->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $orderProperty->furnishing->name_en ?? 'Not Available',
                'img_profile' => $orderProperty->user->userProfile->img_profile ?? 'Not Available',
                'price_min' => $orderProperty->price_min,
                'price_max' => $orderProperty->price_max,
                'floor' => $orderProperty->floor,
                'rooms' => $orderProperty->rooms,
                'bathrooms' => $orderProperty->bathrooms,
                'property_area_min' => $orderProperty->property_area_min,
                'property_area_max' => $orderProperty->property_area_max,
                'description' => $orderProperty->description,
                'description_en' => $orderProperty->description_en ?? '', // Change null to empty string for consistency
                'updated_at' => $orderProperty->updated_at->toDateTimeString(),
            ];

            return response()->json(['data' => $orderPropertyData]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'OrderProperty not found'], 404);
        }
    }

    public function fetchOrdersPropertiesForCurrentUser()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Fetch order properties that belong to the user
        $orderProperties = OrderProperty::with(['category', 'region', 'adType', 'furnishing' , 'propertyType',
        ])
            ->where('user_id', $user->id) // Filter to only include order properties for this user
            ->orderBy('updated_at', 'desc')
            ->get();

        // Map the properties to format the data
        $orderPropertiesData = $orderProperties->map(function ($orderProperty) {
            return [
                'id' => $orderProperty->id,
                'user_name' => $orderProperty->user->name ?? 'Not Available',
                'user_name_en' => $orderProperty->user->name_en ?? 'Not Available',
                'phone_number' => $orderProperty->user->phone_number ?? 'Not Available',
                'category_name' => $orderProperty->category->name,
                'category_name_en' => $orderProperty->category->name_en ?? 'Not Available',
                'city_name' => $orderProperty->city->name,
                'city_name_en' => $orderProperty->city->name_en ?? 'Not Available',
                'region_name' => $orderProperty->region->name,
                'region_name_en' => $orderProperty->region->name_en ?? 'Not Available',
                'ad_type' => $orderProperty->adType->name ?? 'Not Available',
                'ad_type_name_en' => $orderProperty->adType->name_en ?? 'Not Available',
                'property_type_name' => $orderProperty->propertyType->name ?? 'Not Available',
                'property_type_name_en' => $orderProperty->propertyType->name_en ?? 'Not Available',
                'furnishing' => $orderProperty->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $orderProperty->furnishing->name_en ?? 'Not Available',
                'img_profile' => $orderProperty->user->userProfile->img_profile ?? 'Not Available',
                'floor' => $orderProperty->floor,
                'rooms' => $orderProperty->rooms,
                'bathrooms' => $orderProperty->bathrooms,
                'price_min' => $orderProperty->price_min,
                'price_max' => $orderProperty->price_max,
                'property_area_min' => $orderProperty->property_area_min,
                'property_area_max' => $orderProperty->property_area_max,
                'description' => $orderProperty->description,
                'description_en' => $orderProperty->description_en ?? '', // Change null to empty string for consistency
                'updated_at' => $orderProperty->updated_at->toDateTimeString(),
            ];
        });

        // Return the data wrapped in a 'data' key
        return response()->json(['data' => $orderPropertiesData]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized access.'], 401);
        }

        $orderProperty = OrderProperty::find($id);

        if (!$orderProperty) {
            return response()->json(['message' => 'Order Property not found.'], 404);
        }

        // Ensure the user is allowed to update this Order Property
        if ($orderProperty->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden. You do not have permission to update this Order Property.'], 403);
        }

        // Validate the request data
        $validatedData = $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'property_type_id' => 'sometimes|exists:property_types,id',
            'furnishing_id' => 'sometimes|exists:furnishings,id',
            'ad_type_id' => 'sometimes|exists:ad_types,id',
            'city_id' => 'sometimes|exists:cities,id',
            'region_id' => 'sometimes|exists:regions,id',
            'floor' => 'sometimes|integer',
            'rooms' => 'sometimes|integer',
            'bathrooms' => 'sometimes|integer',
            'price_min' => 'sometimes|numeric',
            'price_max' => 'sometimes|numeric',
            'property_area_min' => 'sometimes|numeric',
            'property_area_max' => 'sometimes|numeric',
            'description' => 'sometimes|string',
            'description_en' => 'sometimes|string',
        ]);

        // Update the OrderProperty with validated data
        $orderProperty->fill($validatedData);

        if ($orderProperty->save()) {
            return response()->json([
                'message' => 'Order Property updated successfully!',
                'orderProperty' => $orderProperty->load(['user', 'category', 'propertyType', 'furnishing', 'adType', 'city', 'region']),
            ], 200);
        } else {
            return response()->json(['message' => 'Failed to update Order Property.'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $user = auth()->user();
        Log::info('User detected', ['user' => $user]);
        if (!$user) {
            return response()->json(['message' => 'Unauthorized access.'], 401);
        }

        // Find the order property by ID and ensure it belongs to the current user
        $orderProperty = OrderProperty::where('id', $id)->where('user_id', $user->id)->first();

        if (!$orderProperty) {
            return response()->json(['message' => 'Order Property not found or you do not have permission to delete this Order Property.'], 404);
        }

        try {
            // Now, attempt to delete the order property itself
            $orderProperty->delete();

            return response()->json(['message' => 'Order Property deleted successfully.'], 200);
        } catch (\Exception $e) {
            // You can log the error or handle it as needed
            \Log::error('Order Property Deletion Error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete the Order Property. ' . $e->getMessage()], 500);
        }
    }

}
