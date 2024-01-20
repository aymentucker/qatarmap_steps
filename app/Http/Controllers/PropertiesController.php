<?php
namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\User;
use App\Models\Company;
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

    public function getRegionsForCity($cityId)
    {
        $regions = Region::where('city_id', $cityId)->get();
        return response()->json($regions);
    }

    public function create()
    {
         $users = User::all();
        // return view('properties.create', compact('employees'));

        $cities = City::all();
        return view('properties.create', compact('cities','users'));
    }

    public function store(Request $request)
    {

        // Get the current authenticated user
        $user = auth()->user();

        // Validate the request data
        $validatedData = $request->validate([
            'property_name' => 'required|string',
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
            // Uncomment the line below if you want to handle pictures
            // 'pictures' => 'nullable|string',
        ]);

            // Add user_id, company_id, and default status to the validated data
            $validatedData['user_id'] = $user->id;
            $validatedData['company_id'] = $user->company->id; // Assuming a user belongs to a company
            $validatedData['status'] = 'منشور'; // Default status

    
        // Create a new property
        $property = Property::create($validatedData);
    
        // Redirect or return a response
        // Change the redirection as per your application's flow
        return redirect()->back()->with('message', 'Property added successfully!');
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $employees = Employee::all();
        return view('properties.edit', compact('property', 'employees'));
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
