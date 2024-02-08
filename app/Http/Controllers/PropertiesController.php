<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\City;
use App\Models\Region;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::with('user')->get();
        return view('properties.index', compact('properties'));
    }

    public function getRegionsForCity($cityName)
    {
        $city = City::where('name', $cityName)->first();
        if (!$city) {
            return response()->json([], 404);
        }
    
        $regions = Region::where('city_id', $city->id)->get();
        return response()->json($regions);
    }
    

    public function create()
    {
         $users = User::all(); // Fetch all Users from the database

        $categories = Category::all(); // Fetch all categories from the database

        $cities = City::all(); // Fetch all Cities from the database

        return view('properties.create', compact('cities','users','categories'));
    }

    public function store(Request $request)
    {
        // Get the current authenticated user
        $user = auth()->user();
    
        // Validate the request data
        $validatedData = $request->validate([
            'property_name' => 'required|string',
            'property_type' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Assuming the input name is 'category_id'
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
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 2048 KB = 2 MB
        ]);
    
        // Create a new property instance and fill with validated data
        $property = new Property($validatedData);
        
        $property->category_id = $validatedData['category_id']; // Assign the category ID to the property

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

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
