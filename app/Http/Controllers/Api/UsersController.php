<?php

namespace App\Http\Controllers\Api;

use App\Models\User; // User model
use App\Models\FileDoc; // FileDoc model
use App\Models\UserProfile;
use App\Models\Company;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * updateProfile the specified resource in storage.
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user(); // Using Laravel's authentication
    
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'phone_number' => 'sometimes|required|string',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:6',
            'img_profile' => 'sometimes|file|image|max:2048', // Validate only if file is provided
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Update user info if provided
        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('phone_number')) {
            $user->phone_number = $request->phone_number;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if (!Storage::disk('public')->exists('images/img_profile')) {
            Storage::disk('public')->makeDirectory('images/img_profile');
        }  
    
        if ($request->hasFile('img_profile')) {
            $path = $request->file('img_profile')->store('uploads/img_profile', 'public');
            $pathUrl = config('app.url') . Storage::url($path);
            Log::info("Uploading file: {$path}");
    
            // Check if user already has a profile, then update or create
            $userProfile = $user->userProfile()->updateOrCreate(
                ['user_id' => $user->id], // Keys to match
                ['img_profile' => $pathUrl] // Values to update or create
            );
    
            Log::info("img_profile updated or created: " . json_encode($userProfile));
        }
    
        $user->save();
    
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user->toArray(),
            'userProfile' => $userProfile->toArray(),
        ], 201);
    }

    /**
     * updateProfile the specified resource in storage.
     */
    public function updateCompanyProfile(Request $request)
    {
        $user = $request->user();
        $company = $user->company; // Assuming a one-to-one relationship for simplicity

        // Check if the user is authorized to update the company profile
        if (!$user->isManagerOf($company)) {
            return response()->json(['message' => 'Unauthorized'], 403); // Or use abort(403);
        }

        // Validate the input
        $validator = Validator::make($request->all(), [
            'company_name' => 'sometimes|required|string|max:255',
            'company_name_en' => 'sometimes|required|string|max:255',
            'about' => 'sometimes|required|string',
            'about_en' => 'sometimes|required|string',
            'logo' => 'sometimes|file|image|max:2048',
            // 'address' => 'sometimes|required|string|max:255',
            'valuation' => 'sometimes|required|boolean', // Updated validation rule for valuation
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update company info if provided
        
        if ($request->has('company_name')) {
            $company->company_name = $request->company_name;
        }
        if ($request->has('company_name_en')) {
            $company->company_name_en = $request->company_name_en;
        }
        if ($request->has('about')) {
            $company->about = $request->about;
        }
        if ($request->has('about_en')) {
            $company->about_en = $request->about_en;
        }
        // if ($request->has('address')) {
        //     $company->address = $request->address;
        // }
        if ($request->has('valuation')) {
            // Since the valuation is now expected to be a boolean, ensure proper assignment
            $company->valuation = filter_var($request->valuation, FILTER_VALIDATE_BOOLEAN);
        }


        if (!Storage::disk('public')->exists('images/company_logos')) {
            Storage::disk('public')->makeDirectory('images/company_logos');
        }  

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads/company_logos', 'public');
            $pathUrl = config('app.url') . Storage::url($path);
            Log::info("Uploading company logo: {$path}");

            $company->logo = $pathUrl;
        }

        $company->save();

        return response()->json([
            'message' => 'Company profile updated successfully',
            'company' => $company->toArray(),
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'token' => 'required|string', // Token for further validation if needed
    //     ]);

    //     $name = explode(' ', $request->name, 2); // Assuming the name is a single string
    //     $name = $name[0];
    //     $name_en = count($name) > 1 ? $name[1] : '';

    //     $user = User::firstOrCreate(
    //         ['email' => $request->email],
    //         [
    //             'username' => $this->generateUniqueUsername($name, $name_en),
    //             'name' => $name,
    //             'name_en' => $name_en,
    //             'password' => Hash::make(Str::random(10)), // Random password, as it won't be used
    //             'status' => 'active', // or 'pending' based on your logic
    //             // Set other default values if necessary
    //         ]
    //     );

    //     // Here, you can implement logic to generate and return an API token
    //     // if your application requires it.

    //     return response()->json(['message' => 'User logged in successfully', 'user' => $user]);
    // }

    private function generateUniqueUsername($name, $name_en)
    {
        $username = Str::slug($name . '-' . $name_en);
        $count = User::where('username', 'LIKE', "$username%")->count();
        return $count ? "{$username}-{$count}" : $username;
    }


     /**
     * Store a new owner with file uploads.
     */
    public function storeOwner(Request $request)
    {
        // Validate the incoming request
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string', // Arabic name
            'name_en' => 'required|string', // English name
            'phone_number' => 'required|string',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|unique:users',
            'files.*' => 'sometimes|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }

        // Create the user  with user_type => owner
        $user = User::create([
            'username' => $this->generateUsername($request->name), // This will temporarily set username without ID
            'name' => $request->name,
            'name_en' => $request->name_en,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'owner',
            'status' => 'Pending',
        ]);

        // Update the username to include the user ID for uniqueness
        $user->username = $user->username . $user->id;
        $user->save();

         // After successful user creation, automatically log in the user and generate a token
        $token = $user->createToken('auth_token')->plainTextToken;


        // Generate file folder : uploads/owners

        if (!Storage::disk('public')->exists('uploads/owners')) {
            Storage::disk('public')->makeDirectory('uploads/owners');
        }        
    

        // Handle file uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->store('uploads/owners', 'public');
                $fullUrl = config('app.url') . Storage::url($filename);
                Log::info("Uploading file: {$filename}"); //Debugging the File Saving Process

                // Create and save the file record
                $fileDoc = FileDoc::create([
                    'user_id' => $user->id,
                    'url' => $fullUrl,
                ]);
                
                Log::info("FileDoc created: " . json_encode($fileDoc));
                
            }
        }

         // Return the token along with the success message and user data
         return response()->json([
            'message' => 'Owner created and logged in successfully',
            'user' => $user->toArray(), // Ensure this contains 'id'
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
        
    }

    /**
     * Delete a  owner with file uploads.
     */
    public function deleteOwner(Request $request, $userId)
    {
        // Authenticate the user. Ensure this endpoint is protected by middleware.
        $currentUserId = Auth::id();
        $currentUser = User::find($currentUserId);
        
        if (!$currentUser) {
            return response()->json(['message' => 'Authentication required'], 401);
        }

        // Optionally, check if the current user has permission to delete owners
        // This might involve checking the user's role or permissions
        if (!$currentUser->can('delete_owner')) {
            return response()->json(['message' => 'Unauthorized to delete this owner'], 403);
        }

        // Find the owner by ID
        $owner = User::find($userId);
        
        if (!$owner) {
            return response()->json(['message' => 'Owner not found'], 404);
        }

        // Check if the found user is indeed an owner
        if ($owner->user_type !== 'owner') {
            return response()->json(['message' => 'User is not an owner'], 400);
        }
        
        // Begin transaction to ensure data integrity
        DB::beginTransaction();
        try {
            // Delete associated properties and their images
            $properties = Property::where('user_id', $userId)->get();
            foreach ($properties as $property) {
                $propertyImages = PropertyImage::where('property_id', $property->id)->get();
                foreach ($propertyImages as $propertyImage) {
                    // Remove image from storage
                    $imagePath = str_replace(url('/') . '/storage/', '', $propertyImage->url);
                    Storage::disk('public')->delete($imagePath);

                    // Delete the image record
                    $propertyImage->delete();
                }

                // Delete the property
                $property->delete();
            }

            // Delete associated files from storage and database
            $fileDocs = FileDoc::where('user_id', $userId)->get();
            foreach ($fileDocs as $fileDoc) {
                // Remove file from storage
                $filePath = str_replace(url('/') . '/storage/', '', $fileDoc->url);
                Storage::disk('public')->delete($filePath);
                
                // Delete the file record
                $fileDoc->delete();
            }

            // Delete the owner
            $owner->delete();

            DB::commit();
            return response()->json(['message' => 'Owner, their properties, files, and related images deleted successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle any exceptions, such as database errors
            return response()->json(['message' => 'Failed to delete owner and associated data', 'error' => $e->getMessage()], 500);
        }
    }


    /**
     * Store a new manager with file uploads and company information.
     */
    public function storeManager(Request $request)
    {

        // Preprocess the valuation field to convert from "true"/"false" string to boolean
        $request->merge([
            'valuation' => $request->input('valuation') === 'true',
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string', // Arabic name
            'name_en' => 'required|string', // English name
            'company_name' => 'required|string', //  Arabic company name
            'company_name_en' => 'required|string', //  English company name
            'license_number' => 'required|string|unique:companies',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:6',
            'email' => 'required|string|email|unique:users',
            'about' => 'nullable|string',
            'about_en' => 'nullable|string',
            'valuation' => 'required|boolean', // Validation for the valuation field
            'files.*' => 'sometimes|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        

        // Store Company Data
        $company = Company::create([
            'company_name' => $request->company_name, //  Arabic company name
            'company_name_en' => $request->company_name_en, //  English company name
            'license_number' => $request->license_number,
            'status' => 'Pending', // Assuming you want to set the status to Active once created
            'about' => $request->about,
            'about_en' => $request->about_en,
            'valuation' => $request->valuation, // Store the valuation field
        ]);

        // Create the user with user_type => manager

        $user = User::create([
            'username' => $this->generateUsername($request->name), // This will temporarily set username without ID
            'name' => $request->name,
            'name_en' => $request->name_en,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'manager',
            'status' => 'Pending',
            'company_id' => $company->id, // Ensure this column exists in your users table
        ]);

        // Update the username to include the user ID for uniqueness
        $user->username = $user->username . $user->id;
        $user->save();

        // After successful user creation, automatically log in the user and generate a token
         $token = $user->createToken('auth_token')->plainTextToken;

        // Handle file uploads
        if ($request->hasFile('files')) {
            // Generate file folder : uploads/owners
            if (!Storage::disk('public')->exists('uploads/companies')) {
                Storage::disk('public')->makeDirectory('uploads/companies');
            }

            foreach ($request->file('files') as $file) {
                $filename = $file->store('uploads/companies', 'public');
                $fullUrl = config('app.url') . Storage::url($filename);
                Log::info("Uploading file: {$filename}");

                FileDoc::create([
                    'user_id' => $user->id,
                    'url' => $fullUrl,
                ]);
            }
        }

        // Return the token along with the success message, user data, and company data
            return response()->json([
                'message' => 'Manager created and logged in successfully',
                'user' => $user->toArray(), // Ensure this contains 'id'
                'company' => $company->toArray(), // Ensure this contains 'id'
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 201);
    }
    /**
     * Delete a manager with file uploads , company & employees.
     */

     public function deleteManagerAndCompany(Request $request, $managerId)
     {
         // Authenticate the user. Ensure this endpoint is protected by middleware.
         $currentUserId = Auth::id();
         $currentUser = User::find($currentUserId);
         
         if (!$currentUser) {
             return response()->json(['message' => 'Authentication required'], 401);
         }
     
           // Ensure the current user is the manager attempting the deletion
        if ($currentUserId != $managerId) {
            return response()->json(['message' => 'Unauthorized: Only the primary manager can delete the company'], 403);
        }

     
         // Find the manager by ID, including the associated company
         $manager = User::with('company')->find($managerId);
         
         if (!$manager || $manager->user_type !== 'manager') {
             return response()->json(['message' => 'Manager not found or user is not a manager'], 404);
         }

         // Ensure the manager is the primary manager of the company
        // This logic might involve checking if the manager is the first user added to the company
        // For simplicity, we're assuming the first manager has the lowest user ID in the company
        $firstManagerId = User::where('company_id', $manager->company_id)->min('id');
        if ($managerId != $firstManagerId) {
            return response()->json(['message' => 'Unauthorized: Only the primary manager can delete the company'], 403);
        }
     
         // Retrieve the company ID from the manager
         $companyId = $manager->company_id;
         if (!$companyId) {
             return response()->json(['message' => 'Manager does not have a company associated'], 400);
         }
     
         // Attempt deletion within a database transaction for data integrity
         DB::beginTransaction();
         try {
             // Delete all properties and their images associated with the company
             Property::where('company_id', $companyId)->get()->each(function ($property) {
                 PropertyImage::where('property_id', $property->id)->get()->each(function ($image) {
                     // Delete image from storage
                     $imagePath = str_replace(config('app.url') . '/storage/', '', $image->url);
                     Storage::disk('public')->delete($imagePath);
                     // Delete the image record
                     $image->delete();
                 });
                 $property->delete();
             });
     
             // Delete all employees associated with the company, excluding the manager
             User::where('company_id', $companyId)->where('id', '!=', $managerId)->delete();
     
             // Delete all file documents associated with the manager
             FileDoc::where('user_id', $managerId)->get()->each(function ($fileDoc) {
                 // Delete file from storage
                 $filePath = str_replace(config('app.url') . '/storage/', '', $fileDoc->url);
                 Storage::disk('public')->delete($filePath);
                 // Delete the file record
                 $fileDoc->delete();
             });
     
             // Delete the company
             Company::destroy($companyId);
     
             // Finally, delete the manager
             $manager->delete();
     
             DB::commit();
             return response()->json(['message' => 'Manager, their company, properties, and employees deleted successfully'], 200);
         } catch (\Exception $e) {
             DB::rollBack();
             // Handle any exceptions
             return response()->json(['message' => 'Failed to delete manager and related data', 'error' => $e->getMessage()], 500);
         }
     }
     


    /**
     * fetchEmployeeForCompany
     */
    public function fetchEmployeeForCompany(Request $request)
    {
        // Assuming you have some form of API authentication
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Retrieve the company_id of the currently logged-in user
        $currentCompanyId = Auth::user()->company_id;

        // Optionally, you could pass a company_id in the request and validate it
        // $currentCompanyId = $request->company_id;

        // Fetch users who belong to the same company
        $users = User::where('company_id', $currentCompanyId)
        ->where('user_type', 'employee')
        ->get();

        // Check if users exist
        if ($users->isEmpty()) {
               // If no users found, return an empty 'data' array
            return response()->json(['data' => [],'message' => 'No employees found for this company'], 404);
            // return response()->json(['message' => 'No employees found for this company'], 404);
        }

        $usersData = $users->map(function ($user) {

            // Transform the property data for the response
            return [
                'id' => $user->id,
                'name' => $user->name,
                'name_en' => $user->name_en ?? 'Not Available',
                'email' => $user->email ,
                'phone_number' => $user->phone_number,
                'user_type' => $user->user_type,
                'status' => $user->status,
                'company_id' => $user->company_id,
                'updated_at' => $user->updated_at->toDateTimeString(),
            ];
        });

        // Return the transformed properties data in a JSON response
        return response()->json(['data' => $usersData]);

                // Return the users as JSON

        // return response()->json(['data' => $users]);

        // return response()->json(['employees' => $users]);
    }
     /**
     * storeEmployee
     */
    public function storeEmployee(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            // Add any other necessary validation rules
        ]);

        try {
            // Retrieve company_id of the currently logged-in user
            $currentUserId = Auth::id();
            $currentUser = User::find($currentUserId);
            if (!$currentUser) {
                return response()->json(['message' => 'Current user not found'], 404);
            }
            $company_id = $currentUser->company_id;

            // Generate a unique username
            $id = User::orderBy('id', 'desc')->first() ? User::orderBy('id', 'desc')->first()->id + 1 : 1;
            $username = strtolower($request->name) . strtolower($request->name_en) . '_' . $id;

            // Create new employee
            $user = User::create([
                'username' => $username,
                'name' => $request->name,
                'name_en' => $request->name_en,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'company_id' => $company_id,
                'status' => 'Active',
                'password' => Hash::make($request->password),
                'user_type' => 'employee', // Explicitly setting user_type to 'employee'
            ]);

            // Assign 'employee' role to the user
            $user->assignRole('employee');

            // Respond with the created user and a 201 Created status
            return response()->json(['message' => 'Employee created successfully', 'employee' => $user], 201);
        } catch (\Exception $e) {
            // Handle any exceptions, including database errors, etc.
            return response()->json(['message' => 'Failed to create employee', 'error' => $e->getMessage()], 500);
        }
    }

     /**
     * deleteEmployee
     */
    public function deleteEmployee($id)
    {
        // Authenticate the user. Ensure this endpoint is protected by middleware.
        $currentUserId = Auth::id();
        $currentUser = User::find($currentUserId);
        
        if (!$currentUser) {
            return response()->json(['message' => 'Authentication required'], 401);
        }

        // Find the user by id
        $user = User::findOrFail($id);
        
        // Check if the current user is in the same company as the employee
        if ($currentUser->company_id != $user->company_id) {
            return response()->json(['message' => 'Unauthorized to delete this employee'], 403);
        }
        
        // Delete the user
        try {
            $user->delete();
            return response()->json(['message' => 'Employee deleted successfully.'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions, such as database errors
            return response()->json(['message' => 'Failed to delete employee', 'error' => $e->getMessage()], 500);
        }
    }




    /**
     * Register a new regular user.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            // Add other fields as necessary
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'username' => $this->generateUsername($request->name), // This will temporarily set username without ID
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'user_type' => 'user',
            'password' => Hash::make($request->password),
            'status' => 'Active',
            // Add other fields as necessary
        ]);

        // Update the username to include the user ID for uniqueness
        $user->username = $user->username . $user->id;
        $user->save();

        // Automatically log in the user upon registration
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user->toArray(), // Ensure this contains 'id'
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Check if a user with the specified email exists
        $user = User::where('email', $request->email)->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }

        // Load the user's profile to get the img_profile
        $user->load('userProfile'); 

        // Generate a new token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Prepare the user data including the img_profile
        $userData = $user->toArray();
        $userData['img_profile'] = $user->userProfile ? $user->userProfile->img_profile : null; // Add the img_profile to the user data

        return response()->json([
            'message' => 'User logged in successfully',
            'user' => $userData, // Modified to include 'img_profile'
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    /**
     * logout a User.
     */
    public function logoutUser(Request $request)
    {
        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'User logged out successfully'], 200);
    }


    public function deleteUser($id)
    {
        // Authenticate the user. Ensure this endpoint is protected by middleware.
        $currentUserId = Auth::id();
        $currentUser = User::find($currentUserId);
        
        if (!$currentUser) {
            return response()->json(['message' => 'Authentication required'], 401);
        }



        // Find the user by id
        $user = User::findOrFail($id);
        
        // Delete the user
        try {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully.'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions, such as database errors
            return response()->json(['message' => 'Failed to delete user', 'error' => $e->getMessage()], 500);
        }
    }




      /**
     * Generate a unique username for the user based on their name.
     * Implement this method based on your application's requirements.
     *
     * @param string $name The name of the user.
     * @return string The generated username.
     */
    protected function generateUsername($name)
    {
        // Placeholder implementation - adjust as needed
        return strtolower(str_replace(' ', '_', $name));
    }

    /**
     * Handle file uploads for a user.
     */
    protected function handleFileUploads(Request $request, $user)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('public/files');
                $user->files()->create([
                    'file_path' => $path,
                ]);
            }
        }
    }

    public function fetchStatusForCurrentUserAndCompany(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Retrieve the currently logged-in user
        $currentUser = Auth::user();

        // Retrieve the status of the user
        $userStatus = $currentUser->status;

        // Retrieve the company associated with the user and its status
        $companyStatus = $currentUser->company->status ?? 'Not Available'; // Default to 'Not Available' if no company is associated

        // Prepare the response data
        $responseData = [
            'userStatus' => $userStatus,
            'companyStatus' => $companyStatus,
        ];

        // Return the response as JSON
        return response()->json(['data' => $responseData]);
    }
}

