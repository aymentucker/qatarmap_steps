<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Employee;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::with('employee')->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('properties.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'city' => 'required',
            'region' => 'required',
            'description' => 'required',
            'num_bathrooms' => 'required|integer',
            'num_rooms' => 'required|integer',
            'type' => 'required',
            'furnishing_status' => 'required',
            'area' => 'required|numeric',
            'pictures' => 'required', // Adjust validation based on your implementation
            'address' => 'required',
            'status' => 'required'
        ]);

        Property::create($validatedData);
        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
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
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'city' => 'required',
            'region' => 'required',
            'description' => 'required',
            'num_bathrooms' => 'required|integer',
            'num_rooms' => 'required|integer',
            'type' => 'required',
            'furnishing_status' => 'required',
            'area' => 'required|numeric',
            'pictures' => 'required', // Adjust validation based on your implementation
            'address' => 'required',
            'status' => 'required'
        ]);

        $property->update($validatedData);
        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
