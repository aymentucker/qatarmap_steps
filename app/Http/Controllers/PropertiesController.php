<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\PropertyType;
use App\Models\Furnishing;
use App\Models\AdType;
use App\Models\Company;
use App\Models\Category;
use App\Models\City;
use App\Models\Region;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index(Request $request)
    {
        // Start the query
        $query = Property::with(['user', 'images', 'company', 'category', 'propertyType', 'adType', 'city', 'region']);

        // If a company_id is provided, add it to the query conditions
        if ($request->has('company_id') && $request->company_id) {
            $query->where('company_id', $request->company_id);
        }

        // Execute the query
        $properties = $query->get();

        // Fetch all companies for the filter dropdown
        $companies = Company::all();

        // Pass the properties and companies to the view
        return view('properties.index', compact('properties', 'companies'));
    }
 
    public function getRegionsForCity($cityId)
    {
        $regions = Region::where('city_id', $cityId)->get();
        return response()->json($regions);
    }
    

    public function create()
        {
            $users = User::all(); // Fetch all Users from the database

            $categories = Category::all(); // Fetch all categories from the database

            $cities = City::all(); // Fetch all Cities from the database

            $propertyTypes = PropertyType::all(); // Fetch all property types from the database
            $furnishings = Furnishing::all(); // Fetch all furnishing statuses from the database
            $adTypes = AdType::all(); // Fetch all ad types from the database
        
            return view('properties.create', compact('cities', 'users', 'categories', 'propertyTypes', 'furnishings', 'adTypes'));
        }

    public function store(Request $request)
        {
            // Get the current authenticated user
            $user = auth()->user();
        
            // Validate the request data
            $validatedData = $request->validate([
                'property_name' => 'required|string',
                'property_type_id' => 'required|exists:property_types,id', 
                'category_id' => 'required|exists:categories,id', // Assuming the input name is 'category_id'
                'city_id' => 'required|exists:cities,id', 
                'region_id' => 'required|exists:regions,id', 
                 'floor' => 'required|integer',
                'rooms' => 'required|integer',
                'bathrooms' => 'required|integer',
                'furnishing_id' => 'required|exists:furnishings,id', 
                'ad_type_id' => 'required|exists:ad_types,id', 
                'property_area' => 'required|numeric',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'images' => 'required|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 2048 KB = 2 MB
            ]);
        
            // Create a new property instance and fill with validated data
            $property = new Property($validatedData);
            
            $property->category_id = $validatedData['category_id']; // Assign the category ID to the property

            $property->property_type_id = $validatedData['property_type_id']; 

            $property->furnishing_id = $validatedData['furnishing_id'];
            
            $property->ad_type_id = $validatedData['ad_type_id']; 

            $property->city_id = $validatedData['city_id'];
            $property->region_id = $validatedData['region_id'];        

            // Assign user_id and company_id from the authenticated user
            $property->user_id = $user->id;
            $property->company_id = $user->company_id; // Assuming the company_id is directly accessible
            $property->status = 'منشور'; // Default status
        
            // Save the property
            $property->save();

            if (!Storage::disk('public')->exists('images/properties')) {
                Storage::disk('public')->makeDirectory('images/properties');
            }        
        
            // Handle image upload
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = $image->store('images/properties', 'public');

                    // Create full URL including the domain
                    $fullUrl = config('app.url') . Storage::url($filename);

                    // $fullUrl = config('http://10.0.2.2:8000') . Storage::url($filename);
                    

                    // Create and save property image
                
                    $propertyImage = new PropertyImage();
                    $propertyImage->property_id = $property->id; // Ensure this is the correct foreign key
                    $propertyImage->url = $fullUrl; // Store the full URL, including the domain
                    $propertyImage->save();
                }
            }
        
            // Redirect with success message
            return redirect()->back()->with('message', 'Property added successfully!');
        }
    public function show(Property $property)
        {
            return view('properties.show', compact('property'));
        }

    public function edit(Property $property)
        {
            $employees = user::all();
            return view('properties.edit', compact('property', 'users'));
        }

    public function update(Request $request, Property $property)
            {
            // Validate the request data
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'company_id' => 'required|exists:companies,id',
                'property_name' => 'required|string|max:255',
                'property_type' => 'required|string|max:255',
                'categories' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'region' => 'required|string|max:255',
                'floor' => 'required|integer',
                'rooms' => 'required|integer',
                'bathrooms' => 'required|integer',
                'furnishing' => 'required|string|max:255',
                'ad_type' => 'required|string|max:255',
                'property_area' => 'required|numeric',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'status' => 'required|string|max:255',
                // Uncomment the line below if you want to handle pictures
                // 'pictures' => 'nullable|string',
            ]);

            // Create a new property
            $property = Property::create($validatedData);

            // Redirect or return a response
            // Change the redirection as per your application's flow
            return redirect()->back()->with('message', 'Property added successfully!');
        }

        public function destroy($id)
        {
            try {
                // Find the property by its ID
                $property = Property::findOrFail($id);
        
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
        
                // Delete the property itself
                $property->delete();
        
                // Redirect with a success message
                return redirect()->route('properties.index')->with('success', 'Property and all associated images deleted successfully.');
            } catch (\Exception $e) {
                // Handle the error appropriately
                return back()->withErrors(['error' => 'An error occurred while deleting the property: ' . $e->getMessage()]);
            }
        }



    public function fetchPropertiesForCompany($companyId)
        {
            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
                ->where('company_id', $companyId)
                ->where('ad_type_id', 1) // Assuming 1 signifies a specific ad type, like sales
                ->orderBy('updated_at', 'desc')
                ->get();
        
            // No need to transform the data if you're going to access the properties directly in the view
            return view('properties.index', ['properties' => $properties]); // Adjust 'properties.index' to your view's path
        }
    public function fetchRentPropertiesForCompany($companyId)
        {
            $properties = Property::with(['images', 'user', 'company', 'category', 'propertyType', 'furnishing', 'city', 'region'])
                ->where('company_id', $companyId)
                ->where('ad_type_id', 2) // Assuming 2 signifies another specific ad type, like rentals
                ->orderBy('updated_at', 'desc')
                ->get();

            // Again, directly pass the properties collection to the view
            return view('properties.rentals', ['properties' => $properties]); // Adjust 'properties.rentals' to your view's path
        }


    }
