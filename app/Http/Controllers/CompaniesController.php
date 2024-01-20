<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $companies = Company::all();
        // return view('companies.index', compact('companies'));
        return view('companies.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'license_number' => 'required|unique:companies',
            // 'address' => 'required',
            // 'description' => 'nullable',
            // 'logo' => 'nullable|url',
            // 'social_media_links' => 'nullable|json'
        ]);

        Company::create($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('companies.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('companies.edit', compact('id'));
    }

     /**
     * Update the specified company in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'license_number' => 'required|unique:companies,license_number,' . $id->id,
            // 'address' => 'required',
            // 'description' => 'nullable',
            // 'logo' => 'nullable|url',
            // 'social_media_links' => 'nullable|json'
        ]);

        $id->update($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
 
    }
}
