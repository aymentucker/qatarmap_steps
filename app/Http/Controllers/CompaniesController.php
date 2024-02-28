<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\User;
use App\Models\FileDoc; // FileDoc model


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        $companies = Company::with('users')->get()->map(function ($company) {
            // Assuming there's a 'users' relationship already defined in your Company model
            $manager = $company->users->where('user_type', 'manager')->first();
            // Append the manager's phone number as a custom attribute to the company
            $company->manager_phone = $manager ? $manager->phone_number : 'N/A';

            // Example: Modify the status before sending it to the view
            // This is optional and depends on your requirements
            // For instance, converting a boolean status to a more readable format
            $company->formatted_status = $company->status;

            return $company;
        });

        // Pass the companies data to the view
        return view('companies.index', compact('companies'));
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

        
        // Validate company and manager data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_name_en' => 'required|string|max:255',
            'license_number' => 'required|string|unique:companies',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|unique:users',
            'valuation' => 'required|boolean',
            'files.*' => 'sometimes|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Preprocess the valuation field
        $validatedData['valuation'] = $validatedData['valuation'] === 'true';

        // Store Company Data
        $company = Company::create([
            'company_name' => $validatedData['company_name'],
            'company_name_en' => $validatedData['company_name_en'],
            'license_number' => $validatedData['license_number'],
            'status' => 'Pending',
            'valuation' => $validatedData['valuation'],
        ]);

        // Create the user as manager
        try {
            $user = User::create([
                'username' => $this->generateUsername($validatedData['name']), // Adjust the generation logic as needed
                'name' => $validatedData['name'],
                'name_en' => $validatedData['name_en'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'user_type' => 'manager',
                'status' => 'Pending',
                'company_id' => $company->id,
            ]);
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            // Optionally, redirect back with an error message
            return back()->withErrors(['msg' => 'User creation failed.'])->withInput();
        }
        
        
        // Update the username to include the user ID for uniqueness
        $user->username = $user->username . $user->id;
        $user->save();
        // Handle file uploads
        if ($request->hasFile('files')) {
            // Ensure the uploads/companies directory exists
            $directory = 'uploads/companies';
            Storage::disk('public')->makeDirectory($directory);

            foreach ($request->file('files') as $file) {
                $filename = $file->store($directory, 'public');
                $fullUrl = config('app.url') . Storage::url($filename);

                // Log the upload and associate it with the user
                FileDoc::create([
                    'user_id' => $user->id,
                    'url' => $fullUrl,
                ]);
            }
        }

        // Redirect to the companies index route with a success message
        return redirect()->route('companies.index')->with('success', 'Company and manager created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the specified company
        $company = Company::findOrFail($id);

        // Assuming there's a hasOne or belongsTo relationship set up in the Company model to find its manager
        // If not, you'll need to set one up or manually query for the manager based on the company_id and user_type
        $manager = User::where('company_id', $company->id)->where('user_type', 'manager')->first();

        // Fetch files associated with the manager
        // Ensure there's a relationship set up in the User model for files
        $files = $manager ? $manager->files : collect();

        // Preparing data for the view
        $data = [
            'company' => $company,
            'manager' => $manager,
            'files' => $files,
        ];

        // Return the show view with the data array
        return redirect()->route('companies.show', $company->id);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::with('users')->findOrFail($id);
        $manager = $company->users()->where('user_type', 'manager')->with('filedoc')->firstOrFail();
    
        // If there's still a possibility that `$manager->files` could be null,
        // you should check it before passing to the view or initialize it as an empty collection.
    
        return view('companies.edit', compact('company', 'manager'));
    }
    

     /**
     * Update the specified company in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            // Find the company and the manager by ID
            $company = Company::findOrFail($id);
            $manager = $company->users()->where('user_type', 'manager')->firstOrFail();

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_name_en' => 'required|string|max:255',
            'license_number' => 'required|string|unique:companies,license_number,' . $id,
            'phone_number' => 'required|string',
            'password' => 'nullable|string|min:6',
            'email' => 'required|string|email|unique:users,email,', // Assuming manager's email should be unique except for their own
            'valuation' => 'required|boolean',
            'status' => 'required|string|in:Active,Inactive,Pending', // Example validation for status
            'files.*' => 'sometimes|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'delete_files' => 'nullable|array',
            'delete_files.*' => 'nullable|numeric|exists:file_docs,id',
        ]);
    
    
        try {
             // Update company data
            $company->update([
                'company_name' => $validatedData['company_name'],
                'company_name_en' => $validatedData['company_name_en'],
                'license_number' => $validatedData['license_number'],
                'valuation' => $validatedData['valuation'],
                'status' => $validatedData['status'],
            ]);
    
            // Assuming the first user (manager) is the one you want to update
            $managerData = [
                'name' => $validatedData['name'],
                'name_en' => $validatedData['name_en'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
            ];
            if (!empty($validatedData['password'])) {
                $managerData['password'] = Hash::make($validatedData['password']);
            }
            $manager->update($managerData);
    
            // Handle file uploads
            if ($request->hasFile('files')) {
                $directory = 'uploads/companies';
                Storage::disk('public')->makeDirectory($directory);

                foreach ($request->file('files') as $file) {
                    $filename = $file->store($directory, 'public');
                    $fullUrl = config('app.url') . Storage::url($filename);

                    FileDoc::create([
                        'user_id' => $manager->id,
                        'url' => $fullUrl,
                    ]);
                }
            }
    
            if (!empty($validatedData['delete_files'])) {
                foreach ($validatedData['delete_files'] as $fileId) {
                    $file = FileDoc::findOrFail($fileId);
                    
                    // Assuming $file->url stores a full URL, let's convert it to a relative storage path
                    $relativePath = str_replace(config('app.url') . '/storage/', '', $file->url);
            
                    // Check if file exists before deleting
                    if (Storage::disk('public')->exists($relativePath)) {
                        Storage::disk('public')->delete($relativePath);
                        $file->delete(); // Delete the database record
                    }
                }
            }            
    
            // Redirect with a success message

            return redirect()->route('companies.index')->with('success', 'Company and manager updated successfully.');
        } catch (\Exception $e) {    
            return back()->withErrors(['msg' => 'There was an error updating the company and manager: ' . $e->getMessage()])->withInput();
        }
    }
    
    

    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the company by its ID
            $company = Company::findOrFail($id);

            // Delete associated files first to maintain data integrity
            $users = $company->users; // Assuming a Company hasMany Users relationship
            foreach ($users as $user) {
                // Delete files associated with each user
                $userFiles = $user->filedoc; // Assuming a User hasMany Files relationship named 'filedoc'
                foreach ($userFiles as $file) {
                    // Correctly handle the deletion of the physical file from storage
                    // Assuming $file->url stores a relative path or you need to extract the relative path
                    $relativePath = str_replace(config('app.url') . '/storage/', '', $file->url);
                    if (Storage::disk('public')->exists($relativePath)) {
                        Storage::disk('public')->delete($relativePath);
                    }

                    // Delete the file record
                    $file->delete();
                }

                // Delete the user
                $user->delete();
            }

            // Finally, delete the company
            $company->delete();

            // Redirect with a success message
            return redirect()->route('companies.index')->with('success', 'Company and all associated data deleted successfully.');
        } catch (\Exception $e) {
            // Handle the error appropriately
            return back()->withErrors(['error' => 'An error occurred while deleting the company: ' . $e->getMessage()]);
        }
    }

    protected function generateUsername($name)
    {
        // Placeholder implementation - adjust as needed
        return strtolower(str_replace(' ', '_', $name));
    }

}
