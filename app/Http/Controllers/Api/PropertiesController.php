<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\Category; 
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Region;
use App\Models\PropertyType;
use App\Models\Furnishing;
use App\Models\AdType;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\PropertyView;
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

            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'adType'])
            ->orderBy('updated_at', 'desc')
            ->get();

            $propertiesData = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_type' => $property->propertyType->name ?? 'Not Available', // Ensure null safety
                    'category_name' => $property->category->name,
                    'city' => $property->city,
                    'region' => $property->region,
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available',
                    'ad_type' => $property->adType->name ?? 'Not Available',
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
     * Display the specified resource.
     */
    public function show($id)
        {
            $property = Property::with(['propertyType', 'furnishing', 'adType', 'category', 'images', 'user', 'company'])->findOrFail($id);

            return response()->json([
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'category_name' => $property->category->name,
                'city' => $property->city,
                'region' => $property->region,
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'ad_type' => $property->adType->name ?? 'Not Available',
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->company_name ?? 'Not Available',
                'company_logo' => $property->company->logo ?? 'Not Available',
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string

            
                // 'company_logo' => $property->company->logo_url ?? 'Not Available', // Add this line

                'images' => $property->images->map(function ($image) {
                    return $image->url; // Assuming 'url' is the field for image URL
                }),
            ]);
        }
        

    /**
     *  CountView of listing properties 
     */


    public function countView($id)
        {
            // Increment the view count
                $propertyView = PropertyView::firstOrCreate(['property_id' => $id]);
                $propertyView->increment('view_count');

                // Retrieve the updated property details along with view count
                $property = Property::with(['propertyView'])->find($id);

                // Check if property exists
                if (!$property) {
                    return response()->json(['message' => 'Property not found'], 404);
                }

                // Extract the view count from the relationship
                $viewCount = $property->propertyView->view_count;

                // Return the property view count with the updated view count
                return response()->json([  'view_count' => $viewCount, ]); 
        }

     /**
     *  Fetch all cities with their regions and latlng.
     */

     public function getallCities()
     {
         $cities = City::all(); // Fetches all cities with their fields
         return response()->json($cities);
     }

     public function getallCategories()
     {
         $categories = Category::all(); // Fetches all cities with their fields
         return response()->json(['data' => $categories]);
        }


     public function getallRegions()
     {
         $regions = Region::all(); // Fetches all regions with their fields
         return response()->json($regions);
     }
     

    /**
     *  Fetch all Properties For City.
     */
    public function fetchPropertiesForCity($cityName)
        {
            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing'])
                ->where('city', $cityName)
                ->orderBy('updated_at', 'desc')->get();

            $propertiesData = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_type' => $property->propertyType->name ?? 'Not Available', // Assuming the propertyType relationship is correctly defined
                    'category_name' => $property->category->name,
                    'city' => $property->city,
                    'region' => $property->region,
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available', // Assuming the furnishing relationship is correctly defined
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'description' => $property->description,
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'company_id' => $property->company_id,
                    'company_name' => $property->company->name ?? 'Not Available', // Adjusted to match company relationship's attribute
                    'images' => $property->images->map(fn($image) => $image->url),
                    'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
                ];
            });

            // Assuming PropertyCollection is a custom collection or resource that formats the response
            return new PropertyCollection($propertiesData);
        }



     /**
     *  Fetch all Properties For Region.
     */

     public function fetchPropertiesForRegion($regionName)
     {
         $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing'])
             ->where('region', $regionName)
             ->orderBy('updated_at', 'desc')->get();
     
         $propertiesData = $properties->map(function ($property) {
             return [
                 'id' => $property->id,
                 'property_name' => $property->property_name,
                 'property_type' => $property->propertyType->name ?? 'Not Available', // Correctly access the property type name
                 'category_name' => $property->category->name ?? 'Not Available',
                 'city' => $property->city,
                 'region' => $property->region,
                 'floor' => $property->floor,
                 'rooms' => $property->rooms,
                 'bathrooms' => $property->bathrooms,
                 'furnishing' => $property->furnishing->name ?? 'Not Available', // Correctly access the furnishing name
                 'property_area' => $property->property_area,
                 'price' => $property->price,
                 'description' => $property->description,
                 'status' => $property->status,
                 'user_email' => $property->user->email ?? 'Not Available',
                 'phone_number' => $property->user->phone_number ?? 'Not Available',
                 'company_id' => $property->company_id,
                 'company_name' => $property->company->name ?? 'Not Available', // Correctly access the company name
                 'updated_at' => $property->updated_at->toDateTimeString(),
                 'images' => $property->images->map(function ($image) {
                     return $image->url; // Ensure 'url' is the correct field name
                 })->all(),
             ];
         });
     
         // Assuming PropertyCollection is a resource or collection class that formats your response
         return new PropertyCollection($propertiesData);
     }
     



     /**
     * Display a listing of properties for a given category.
     *
     * @param int $categoryId
     * @return \Illuminate\Http\Response
     */
    public function getPropertiesByCategory($categoryId)
        {
            // Find the category with the provided ID
            $category = Category::find($categoryId);

            // Check if category exists
            if (!$category) {
                return response()->json([
                    'message' => 'Category not found'
                ], 404);
            }

            // Get properties associated with the category
            $properties = $category->properties()
                ->with(['images', 'user', 'company', 'propertyType', 'furnishing', 'category'])
                ->orderBy('updated_at', 'desc')
                ->get();

            $propertiesData = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_type' => $property->propertyType->name ?? 'Not Available', // Adjusted to use the relationship
                    'category_name' => $property->category->name,
                    'city' => $property->city,
                    'region' => $property->region,
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available', // Adjusted to use the relationship
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'description' => $property->description,
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'company_id' => $property->company_id,
                    'company_name' => $property->company->name ?? 'Not Available', // Ensuring it matches your company relationship
                    'images' => $property->images->map(fn($image) => $image->url),
                    'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
                ];
            });

            // Assuming PropertyCollection is a custom collection or resource that formats the response
            return new PropertyCollection($propertiesData);
        }



    /**
     * search a searchTerm.
     */

     public function search(Request $request)
        {
            $searchTerm = $request->query('searchTerm', '');
        
            $properties = Property::where('property_name', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('region', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('property_type', 'LIKE', "%{$searchTerm}%") 
                        ->get(); // Retrieve all matching records without pagination
        
                        return new PropertyCollection($properties);

            //  return response()->json($properties);
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
        
            // Filter by Region
            if ($request->has('region') && $request->region != '') {
                $query->where('region', $request->region);
            }
        
            // Filter by Ad Type
            if ($request->has('ad_type') && is_array($request->ad_type) && count($request->ad_type) > 0) {
                $query->whereIn('ad_type', $request->ad_type);
            }

            // Filter by Furnishing
            if ($request->has('furnishing') && is_array($request->furnishing) && count($request->furnishing) > 0) {
                $query->whereIn('furnishing', $request->furnishing);
            }
        
            // Filter by Price Range
            if ($request->has('price_from') && $request->price_from != '') {
                $query->where('price', '>=', $request->price_from);
            }
            if ($request->has('price_to') && $request->price_to != '') {
                $query->where('price', '<=', $request->price_to);
            }
        
            // Filter by Property Type
            if ($request->has('property_type') && is_array($request->property_type) && count($request->property_type) > 0) {
                $query->whereIn('property_type', $request->property_type);
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
            $user = auth()->user();

            if (!$user) {
                return response()->json(['message' => 'Unauthorized access.'], 401);
            }
        
        
            // Validate the request data
            $validatedData = $request->validate([
                'property_name' => 'required|string',
                'property_name_en' => 'sometimes|string',
                'property_type_id' => 'required|exists:property_types,id',
                'category_id' => 'required|exists:categories,id',
                'city' => 'required|string|max:255',
                'region' => 'required|string|max:255',
                'floor' => 'required|integer',
                'rooms' => 'required|integer',
                'bathrooms' => 'required|integer',
                'furnishing_id' => 'required|exists:furnishings,id',
                'ad_type_id' => 'required|exists:ad_types,id',
                'property_area' => 'required|numeric',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'description_en' => 'sometimes|string',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            $property = new Property();
            $property->fill($validatedData);
            $property->user_id = $user->id;
            $property->company_id = $user->company_id ?? null; // Handle null company_id if necessary
            $property->status = 'منشور';
            $property->save();
        
            if ($property->save()) {
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $filename = $image->store('images/properties', 'public');
                        $fullUrl = url(Storage::url($filename));
        
                        $propertyImage = new PropertyImage();
                        $propertyImage->property_id = $property->id;
                        $propertyImage->url = $fullUrl;
                        $propertyImage->save();
                    }
                }
        
                return response()->json([
                    'message' => 'Property added successfully!',
                    'property' => $property->load(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'adType']),
                ], 201);
            } else {
                return response()->json(['message' => 'Failed to save property.'], 500);
            }
        }
   
        ///"refresh" to update the property's redeploy time t
    public function redeployProperty(Request $request, $propertyId)
     {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized access.'], 401);
        }

        // Find the property by ID and ensure the current user owns it
        $property = Property::where('id', $propertyId)
                            ->where('user_id', $user->id)
                            ->first();

        if (!$property) {
            return response()->json(['message' => 'Property not found or access denied.'], 404);
        }

        // Refresh the property's updated_at timestamp to "redeploy" it
        $property->touch(); // This updates the updated_at field to the current time

        return response()->json([
            'message' => 'Property redeployed successfully!',
            'property' => $property->load(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'adType']),
        ], 200);
     }

        /**
    * Method to store a new comment.
    */
    public function addComment(Request $request, $propertyId)
            {
                $validator = Validator::make($request->all(), [
                    'user_id' => 'required|exists:users,id',
                    'body' => 'required|string',
                    'rating' => 'required|integer|min:0|max:5',
                    'parent_id' => 'nullable|exists:comments,id'
                ]);

                if ($validator->fails()) {
                    return response()->json($validator->errors(), 422);
                }

                $data = $request->only(['user_id', 'body', 'rating', 'parent_id']);
                $data['property_id'] = $propertyId;

                $comment = Comment::saveComment($data);

                return response()->json([
                    'message' => 'Comment added successfully',
                    'comment' => $comment
                ], 201);
            }


    /**
    * comment the specified in property.
    */
    public function comment(Property $property)
        {
            // Adjusting the load method to order comments and replies by 'updated_at' in descending order
            $property->load([
                'comments' => function ($query) {
                    $query->orderBy('updated_at', 'desc');
                },
                'comments.user',
                'comments.replies' => function ($query) {
                    $query->orderBy('updated_at', 'desc');
                },
                'comments.replies.user'
            ]);
            $comments = $property->comments->map(function ($comment) {
                $formattedReplies = $comment->replies->map(function ($reply) {
                    return [
                        'id' => $reply->id,
                        'body' => $reply->body,
                        'username' => $reply->user->name,
                        'created_at' => $reply->created_at->toDateString(), // or use ->format('d.m.Y') if specific formatting is required
                        'rating' => $reply->rating
                    ];
                });

                return [
                    'id' => $comment->id,
                    'body' => $comment->body,
                    'username' => $comment->user->name,
                    'created_at' => $comment->created_at->toDateString(), // Adjusted for consistency
                    'rating' => $comment->rating,
                    'replies' => $formattedReplies
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
    * Deleting Images for peoperty
    */
    public function deleteImage($imageName)
    {
        // Assuming your images are stored in the `storage/app/public/images/properties` directory
        $path = 'public/images/properties/' . $imageName;

        if (Storage::exists($path)) {
            Storage::delete($path);
            return response()->json(['message' => 'Image deleted successfully'], 200);
        }

        return response()->json(['message' => 'Image not found'], 404);
    }

        
    
    /**
    * Remove the specified resource from storage.
    */
    public function destroy($id)
     {
        $user = auth()->user();
    
        if (!$user) {
            return response()->json(['message' => 'Unauthorized access.'], 401);
        }
    
        // Find the property by ID and ensure it belongs to the current user
        $property = Property::where('id', $id)->where('user_id', $user->id)->first();
    
        if (!$property) {
            return response()->json(['message' => 'Property not found or you do not have permission to delete this property.'], 404);
        }
    
        // Attempt to delete the property
        try {
            // Assuming each property has multiple images or related entities
              foreach ($property->images as $image) {
            // Delete related images or handle as needed
            $image->delete();
               }   

             // Now, attempt to delete the property itself
            $property->delete();
    
            return response()->json(['message' => 'Property deleted successfully.'], 200);
        } catch (\Exception $e) {
            // You can log the error or handle it as needed
            \Log::error('Property Deletion Error: '.$e->getMessage());
            return response()->json(['message' => 'Failed to delete the property. '.$e->getMessage()], 500);
        }
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
                try {
                    $favorite = Favorite::where('user_id', $user->id)->where('property_id', $id)->firstOrFail();
                    $favorite->delete();
                    return response()->json(['message' => 'Favorite removed successfully']);
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return response()->json(['message' => 'Favorite not found'], 404);
                }
            }

    /**
    * checkIfFavorite property
    */
    public function isFavorite($propertyId)
        {
            $user = Auth::user();
            $isFavorite = Favorite::where('user_id', $user->id)
                                  ->where('property_id', $propertyId)
                                  ->exists();
        
            return response()->json(['isFavorite' => $isFavorite]);
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

    /**
    * Fetch names of all cities.
    *
    */
    public function getCities()
        {
            $cities = City::all()->pluck('name');
            return response()->json($cities);
        }

    /**
         * Fetch names of all categories.
         */

    public function getcategories()
        {
            $categories = Category::all()->pluck('name');
            return response()->json($categories);
        }

    /**
         * Fetch names of all PropertyTypes.
         */

    public function getPropertyTypes()
        {
            $propertyTypes = PropertyType::all();
            return response()->json(['data' => $propertyTypes]);
        }

    /**
         * Fetch names of all Furnishings.
         */

    public function getFurnishings()
        {
            $furnishings = Furnishing::all();
            return response()->json(['data' => $furnishings]);
        }

    /**
         * Fetch names of all AdTypes.
         */

    public function getAdTypes()
        {
            $adTypes = AdType::all();
            return response()->json(['data' => $adTypes]);
        }



    /**
         * Fetch names of regions for a specific city.
         *
         * @param  string  $cityName
         * @return \Illuminate\Http\JsonResponse
         */
    public function getRegionsForCity($cityName)
        {
            $city = City::where('name', $cityName)->first();

            if (!$city) {
                return response()->json(['message' => 'City not found'], 404);
            }

            // Fetch the entire region objects
            $regions = Region::where('city_id', $city->id)->get();


            // Transform each region object into an array that includes all the required data
            $regionsData = $regions->map(function ($region) {
                return [
                    'id' => $region->id,
                    'name' => $region->name,
                    'nameEn' => $region->name_en, // Assuming you have a 'nameEn' attribute for English name
                    'latLng' => $region->lat_lng, // Assuming you have a 'latLng' attribute for latitude and longitude
                    // Add any other required fields here
                ];
            });

            
            return response()->json(['data' => $regionsData]);
        }

        public function fetchPropertiesForCompany($companyId)
        {
            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing'])
                ->where('company_id', $companyId)
                ->where('ad_type_id', 1)
                ->orderBy('updated_at', 'desc')
                ->get();
        
            $propertiesData = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_type' => $property->propertyType->name ?? 'Not Available',
                    'category_name' => $property->category->name ?? 'Not Available',
                    'city' => $property->city,
                    'region' => $property->region,
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available',
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'description' => $property->description,
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'company_id' => $property->company_id,
                    'company_name' => $property->company->name ?? 'Not Available',
                    'images' => $property->images->pluck('url'), // pluck is more concise for this case
                    'updated_at' => $property->updated_at->toDateTimeString(),
                ];
            });
        
            // Return the properties data, wrapping it into a Resource or a simple array as per your application's design
            return response()->json(['data' => $propertiesData]);
        }
        
        public function fetchRentPropertiesForCompany($companyId)
        {
            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing'])
                ->where('company_id', $companyId)
                ->where('ad_type_id', 2)
                ->orderBy('updated_at', 'desc')
                ->get();
        
            $propertiesData = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_type' => $property->propertyType->name ?? 'Not Available',
                    'category_name' => $property->category->name ?? 'Not Available',
                    'city' => $property->city,
                    'region' => $property->region,
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available',
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'description' => $property->description,
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'company_id' => $property->company_id,
                    'company_name' => $property->company->name ?? 'Not Available',
                    'images' => $property->images->pluck('url'), // pluck is more concise for this case
                    'updated_at' => $property->updated_at->toDateTimeString(),
                ];
            });
        
            // Return the properties data, wrapping it into a Resource or a simple array as per your application's design
            return response()->json(['data' => $propertiesData]);
        }

        public function fetchRentPropertiesForCategory($categoryId)
        {
            // Fetch properties filtered by category_id instead of company_id
            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing'])
                ->where('category_id', $categoryId) // Changed from company_id to category_id
                ->where('ad_type_id', 2) // Assuming you still want to filter by ad_type_id for rent properties
                ->orderBy('updated_at', 'desc')
                ->get();

            $propertiesData = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_type' => $property->propertyType->name ?? 'Not Available',
                    'category_name' => $property->category->name ?? 'Not Available',
                    'city' => $property->city,
                    'region' => $property->region,
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available',
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'description' => $property->description,
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'company_id' => $property->company_id,
                    'company_name' => $property->company->name ?? 'Not Available',
                    'images' => $property->images->pluck('url'),
                    'updated_at' => $property->updated_at->toDateTimeString(),
                ];
            });

            // Return the properties data, wrapping it into a Resource or a simple array as per your application's design
            return response()->json(['data' => $propertiesData]);
        }

        public function fetchSellPropertiesForCategory($categoryId)
        {
            // Fetch properties filtered by category_id and ad_type_id for sell properties
            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing'])
                ->where('category_id', $categoryId) // Filter by category_id
                ->where('ad_type_id', 1) // Adjusted for sell properties
                ->orderBy('updated_at', 'desc')
                ->get();

            $propertiesData = $properties->map(function ($property) {
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_type' => $property->propertyType->name ?? 'Not Available',
                    'category_name' => $property->category->name ?? 'Not Available',
                    'city' => $property->city,
                    'region' => $property->region,
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available',
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'description' => $property->description,
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'company_id' => $property->company_id,
                    'company_name' => $property->company->name ?? 'Not Available',
                    'images' => $property->images->pluck('url'),
                    'updated_at' => $property->updated_at->toDateTimeString(),
                ];
            });

            // Return the properties data, wrapping it into a Resource or a simple array as per your application's design
            return response()->json(['data' => $propertiesData]);
        }

        ///fetchPropertiesForCurrentUser
        public function fetchPropertiesForCurrentUser()
        {
            try {
                $user = Auth::user(); // Retrieve the currently authenticated user
                if (!$user) {
                    // If no user is authenticated, return an unauthorized error response
                    return response()->json(['error' => 'User not authenticated'], 401);
                }

                $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing'])
                ->where('user_id', $user->id)
                ->orderBy('updated_at', 'desc')
                ->get();
        
                $propertiesData = $properties->map(function ($property) {
                    // Transform the property data for the response
                    return [
                        'id' => $property->id,
                        'property_name' => $property->property_name,
                        'property_type' => $property->propertyType->name ?? 'Not Available',
                        'category_name' => $property->category->name ?? 'Not Available',
                        'city' => $property->city,
                        'region' => $property->region,
                        'floor' => $property->floor,
                        'rooms' => $property->rooms,
                        'bathrooms' => $property->bathrooms,
                        'furnishing' => $property->furnishing->name ?? 'Not Available',
                        'property_area' => $property->property_area,
                        'price' => $property->price,
                        'description' => $property->description,
                        'status' => $property->status,
                        'user_email' => $property->user->email ?? 'Not Available',
                        'phone_number' => $property->user->phone_number ?? 'Not Available',
                        'company_id' => $property->company_id,
                        'company_name' => $property->company->name ?? 'Not Available',
                        'images' => $property->images->pluck('url'), // Get all image URLs
                        'updated_at' => $property->updated_at->toDateTimeString(),
                    ];
                });

                // Return the transformed properties data in a JSON response
                return response()->json(['data' => $propertiesData]);
            } catch (\Exception $e) {
                // Log the exception and return a server error response
                Log::error("Failed to fetch properties for current user: " . $e->getMessage());
                return response()->json(['error' => 'Failed to fetch properties'], 500);
            }
        }



   
}


