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
        $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'adType', 'city', 'region'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
            ];
        });

        return new PropertyCollection($propertiesData); // Assuming PropertyCollection is a custom collection or resource that formats the response
        // or use
        // return response()->json($propertiesData);
    }
    public function show($id)
    {
        $property = Property::with([
            'propertyType',
            'furnishing',
            'adType',
            'category',
            'images',
            'user',
            'company',
            'city',
            'region'
        ])->findOrFail($id);

        // Assuming the User model has a relationship 'userProfile' that contains 'img_profile'
        $imgProfile = $property->user->userProfile->img_profile ?? 'Not Available';

        // Assuming the Company model contains 'logo' and 'address' fields
        $companyLogo = $property->company->logo ?? 'Not Available';
        $companyAddress = $property->company->address ?? 'Not Available';


        $propertyData = [
            'id' => $property->id,
            'property_name' => $property->property_name,
            'property_name_en' => $property->property_name_en ?? 'Not Available',
            'property_type' => $property->propertyType->name ?? 'Not Available',
            'property_type_en' => $property->propertyType->name_en ?? 'Not Available',
            'category_name' => $property->category->name,
            'category_name_en' => $property->category->name_en ?? 'Not Available',
            'city' => $property->city->name,
            'city_name_en' => $property->city->name_en ?? 'Not Available',
            'region' => $property->region->name,
            'region_name_en' => $property->region->name_en ?? 'Not Available',
            'floor' => $property->floor,
            'rooms' => $property->rooms,
            'bathrooms' => $property->bathrooms,
            'furnishing' => $property->furnishing->name ?? 'Not Available',
            'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available',
            'ad_type' => $property->adType->name ?? 'Not Available',
            'ad_type_name_en' => $property->adType->name_en ?? 'Not Available',
            'property_area' => $property->property_area,
            'price' => $property->price,
            'description' => $property->description,
            'description_en' => $property->description_en ?? 'Not Available',
            'status' => $property->status,
            'user_email' => $property->user->email ?? 'Not Available',
            'user_name' => $property->user->name ?? 'Not Available',
            'user_name_en' => $property->user->name_en ?? 'Not Available',
            'phone_number' => $property->user->phone_number ?? 'Not Available',
            'img_profile' => $imgProfile, // Add the user's profile image URL here
            'company_id' => $property->company_id,
            'company_name' => $property->company->company_name ?? 'Not Available',
            'company_name_en' => $property->company->company_name_en ?? 'Not Available',
            'company_logo' => $companyLogo, // Company logo URL
            'company_address' => $companyAddress, // company address
            'images' => $property->images->map(fn($image) => $image->url),
            'updated_at' => $property->updated_at->toDateTimeString(),
        ];

        \Log::debug('Company Data:', [
            'company' => $property->company
        ]);

        return response()->json($propertyData);
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
        return response()->json(['view_count' => $viewCount,]);
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
    public function fetchPropertiesForCity($cityId)
    {
        $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
            ->whereHas('city', function ($query) use ($cityId) {
                $query->where('id', $cityId); // Filter by city ID
            })
            ->orderBy('updated_at', 'desc')->get();

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
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

    public function fetchPropertiesForRegion($regionId)
    {
        $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
            ->whereHas('region', function ($query) use ($regionId) {
                $query->where('id', $regionId); // Filter by region ID
            })
            ->orderBy('updated_at', 'desc')->get();



        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
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
            ->with(['images', 'user', 'company', 'propertyType', 'furnishing', 'category', 'city', 'region'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
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

        $properties = Property::with(['propertyType', 'furnishing', 'adType', 'category', 'images', 'user', 'company', 'city', 'region'])
            ->where('property_name', 'LIKE', "%{$searchTerm}%")
            ->leftJoin('regions', 'properties.region_id', '=', 'regions.id') // Assuming 'region_id' is the FK in 'properties' table
            ->where('properties.property_name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('regions.name', 'LIKE', "%{$searchTerm}%") // Search by region name in 'regions' table
            ->select('properties.*', 'regions.name as region_name', 'regions.name_en as region_name_en') // Select region names
            ->get(); // Retrieve all matching records without pagination

        if ($properties->isEmpty()) {
            return response()->json(['message' => 'No properties found matching the search term'], 404);
        } else {
            $propertiesData = $properties->map(function ($property) {
                return [
                    // Structured data similar to fetchSellPropertiesForCategory method
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_name_en' => $property->property_name_en ?? 'Not Available',
                    'property_type' => $property->propertyType->name ?? 'Not Available',
                    'property_type_en' => $property->propertyType->name_en ?? 'Not Available',
                    'category_name' => $property->category->name,
                    'category_name_en' => $property->category->name_en ?? 'Not Available',
                    'city' => $property->city->name,
                    'city_name_en' => $property->city->name_en ?? 'Not Available',
                    'region' => $property->region->name,
                    'region_name_en' => $property->region->name_en ?? 'Not Available',
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available',
                    'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available',
                    'ad_type' => $property->adType->name ?? 'Not Available',
                    'ad_type_name_en' => $property->adType->name_en ?? 'Not Available',
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'user_name_en' => $property->user->name_en ?? 'Not Available',
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'images' => $property->images->map(fn($image) => $image->url),
                    'updated_at' => $property->updated_at->toDateTimeString(),
                ];
            });

            // Return the structured properties data
            return response()->json(['data' => $propertiesData]);
        }
    }
    /**
     * filter properties
     */

    // Method to handle property filtering
    public function filterProperties(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized access.'], 401);
        }

        // Starting the query builder
        $query = Property::query();

        // Applying filters
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        if ($request->filled('region')) {
            $query->where('region', $request->region);
        }

        if ($request->filled('minPrice')) {
            $query->where('price', '>=', $request->minPrice);
        }

        if ($request->filled('maxPrice')) {
            $query->where('price', '<=', $request->maxPrice);
        }

        if ($request->filled('minArea')) {
            $query->where('property_area', '>=', $request->minArea);
        }

        if ($request->filled('maxArea')) {
            $query->where('property_area', '<=', $request->maxArea);
        }

        if ($request->filled('bedrooms')) {
            $query->where('rooms', $request->bedrooms);
        }

        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', $request->bathrooms);
        }

        if ($request->filled('propertyType')) {
            $query->whereHas('propertyType', function ($query) use ($request) {
                $query->where('name', $request->propertyType);
            });
        }

        if ($request->filled('furnishing')) {
            $query->whereHas('furnishing', function ($query) use ($request) {
                $query->where('name', $request->furnishing);
            });
        }

        // Execute the query and get the results
        $properties = $query->with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'adType'])->get();

        return response()->json([
            'message' => 'Filtered properties retrieved successfully!',
            'data' => $properties, // Changed 'properties' to 'data'
        ]);

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
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'required|exists:regions,id',
            // 'city' => 'required|string|max:255',
            // 'region' => 'required|string|max:255',
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

        if (!Storage::disk('public')->exists('images/properties')) {
            Storage::disk('public')->makeDirectory('images/properties');
        }

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
                'property' => $property->load(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'adType', 'city', 'region']),
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

        try {
            // Assuming each property has multiple images or related entities
            // Delete associated images from the storage and database
            $images = $property->images; // Assuming you have a relationship defined in Property model as 'images'
            foreach ($images as $image) {
                // Extract the file path relative to the disk root from the URL
                $relativePath = str_replace(config('app.url') . '/storage/', '', $image->url);
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath);
                }
                $image->delete();
            }

            // Now, attempt to delete the property itself
            $property->delete();

            return response()->json(['message' => 'Property deleted successfully.'], 200);
        } catch (\Exception $e) {
            // You can log the error or handle it as needed
            \Log::error('Property Deletion Error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to delete the property. ' . $e->getMessage()], 500);
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
        $favorites = $user->favorites()->with(['property.images', 'property.user', 'property.company', 'property.category', 'property.propertyType', 'property.furnishing', 'property.city', 'property.region'])->get();

        $favoritesData = $favorites->map(function ($favorite) {
            $property = $favorite->property;
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
                // Include any other details you want from the $favorite or related models
            ];
        });

        return response()->json(['data' => $favoritesData]);
    }

    /**
     * Store a newly created favorite in storage.
     */
    public function getFavoriteStore(Request $request)
    {
        $request->validate(['property_id' => 'required|exists:properties,id']);

        $user = Auth::user();
        $exists = $user->favorites()->where('property_id', $request->property_id)->exists();
        if ($exists) {
            return response()->json(['message' => 'Property is already added to favorites'], 409);
        }

        $favorite = new Favorite();
        $favorite->user_id = $user->id;
        $favorite->property_id = $request->property_id;
        $favorite->save();

        return response()->json(['message' => 'Property added to favorites successfully'], 201);
    }
    /**
     * Remove the specified favorite from storage.
     */
    public function getFavoriteDestroy($id)
    {
        $user = Auth::user();
        $favorite = Favorite::where('user_id', $user->id)->where('property_id', $id)->first();
        if (!$favorite) {
            return response()->json(['message' => 'Favorite not found'], 404);
        }

        $favorite->delete();
        return response()->json(['message' => 'Favorite removed successfully']);
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

    public function getUserFavoritePropertyIds()
    {
        $user = Auth::user(); // Get the authenticated user

        $favoritePropertyIds = $user->favorites()->pluck('property_id');

        return response()->json(['favoritePropertyIds' => $favoritePropertyIds]);
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
    public function getRegionsForCity($cityId)
    {
        // Check if the city exists with the given ID
        $cityExists = City::where('id', $cityId)->exists();

        if (!$cityExists) {
            return response()->json(['message' => 'City not found'], 404);
        }

        // Fetch the entire region objects associated with the city ID
        $regions = Region::where('city_id', $cityId)->get();

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
        $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
            ->where('company_id', $companyId)
            ->where('ad_type_id', 1)
            ->orderBy('updated_at', 'desc')
            ->get();

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
            ];
        });

        // Return the properties data, wrapping it into a Resource or a simple array as per your application's design
        return response()->json(['data' => $propertiesData]);
    }

    public function fetchRentPropertiesForCompany($companyId)
    {
        $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
            ->where('company_id', $companyId)
            ->where('ad_type_id', 2)
            ->orderBy('updated_at', 'desc')
            ->get();

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
            ];
        });

        // Return the properties data, wrapping it into a Resource or a simple array as per your application's design
        return response()->json(['data' => $propertiesData]);
    }

    public function fetchRentPropertiesForCategory($categoryId)
    {
        // Fetch properties filtered by category_id instead of company_id
        $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
            ->where('category_id', $categoryId) // Changed from company_id to category_id
            ->where('ad_type_id', 2) // Assuming you still want to filter by ad_type_id for rent properties
            ->orderBy('updated_at', 'desc')
            ->get();

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
            ];
        });

        // Return the properties data, wrapping it into a Resource or a simple array as per your application's design
        return response()->json(['data' => $propertiesData]);
    }

    public function fetchSellPropertiesForCategory($categoryId)
    {
        // Fetch properties filtered by category_id and ad_type_id for sell properties
        $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
            ->where('category_id', $categoryId) // Filter by category_id
            ->where('ad_type_id', 1) // Adjusted for sell properties
            ->orderBy('updated_at', 'desc')
            ->get();

        $propertiesData = $properties->map(function ($property) {
            return [
                'id' => $property->id,
                'property_name' => $property->property_name,
                'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                'property_type' => $property->propertyType->name ?? 'Not Available',
                'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                'category_name' => $property->category->name,
                'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                'city' => $property->city->name,
                'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                'region' => $property->region->name,
                'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                'floor' => $property->floor,
                'rooms' => $property->rooms,
                'bathrooms' => $property->bathrooms,
                'furnishing' => $property->furnishing->name ?? 'Not Available',
                'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                'ad_type' => $property->adType->name ?? 'Not Available',
                'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                'property_area' => $property->property_area,
                'price' => $property->price,
                'description' => $property->description,
                'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                'status' => $property->status,
                'user_email' => $property->user->email ?? 'Not Available',
                'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                'phone_number' => $property->user->phone_number ?? 'Not Available',
                'company_id' => $property->company_id,
                'company_name' => $property->company->name ?? 'Not Available',
                'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                'images' => $property->images->map(fn($image) => $image->url),
                'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
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


            $properties = Property::with(['propertyView','images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
                ->where('user_id', $user->id)
                ->orderBy('updated_at', 'desc')
                ->get();

            $propertiesData = $properties->map(function ($property) {
                // Transform the property data for the response
                return [
                    'id' => $property->id,
                    'property_name' => $property->property_name,
                    'property_name_en' => $property->property_name_en, // Assuming this attribute exists
                    'property_type' => $property->propertyType->name ?? 'Not Available',
                    'property_type_en' => $property->propertyType->name_en ?? 'Not Available', // Assuming this attribute exists
                    'category_name' => $property->category->name,
                    'category_name_en' => $property->category->name_en ?? 'Not Available', // Assuming this attribute exists
                    'city' => $property->city->name,
                    'city_name_en' => $property->city->name_en ?? 'Not Available', // Assuming this attribute exists
                    'region' => $property->region->name,
                    'region_name_en' => $property->region->name_en ?? 'Not Available', // Assuming this attribute exists
                    'floor' => $property->floor,
                    'rooms' => $property->rooms,
                    'bathrooms' => $property->bathrooms,
                    'furnishing' => $property->furnishing->name ?? 'Not Available',
                    'furnishing_name_en' => $property->furnishing->name_en ?? 'Not Available', // Assuming this attribute exists
                    'ad_type' => $property->adType->name ?? 'Not Available',
                    'ad_type_name_en' => $property->adType->name_en ?? 'Not Available', // Assuming this attribute exists
                    'property_area' => $property->property_area,
                    'price' => $property->price,
                    'description' => $property->description,
                    'description_en' => $property->description_en ?? '', // Assuming this attribute exists
                    'status' => $property->status,
                    'user_email' => $property->user->email ?? 'Not Available',
                    'user_name' => $property->user->name ?? 'Not Available', // Assuming user has a name attribute
                    'user_name_en' => $property->user->name_en ?? 'Not Available', // Assuming this attribute exists
                    'phone_number' => $property->user->phone_number ?? 'Not Available',
                    'company_id' => $property->company_id,
                    'company_name' => $property->company->name ?? 'Not Available',
                    'company_name_en' => $property->company->name_en ?? 'Not Available', // Assuming this attribute exists
                    'images' => $property->images->map(fn($image) => $image->url),
                    'viewCount' => $property->propertyView->view_count ?? 'Not Available', // Assuming this attribute exists
                    'updated_at' => $property->updated_at->toDateTimeString(), // Format updated_at to a DateTime string
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


