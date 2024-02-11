<?php

namespace App\Http\Controllers\Api;

use App\Models\User; // User model
use App\Models\FileDoc; // FileDoc model
use App\Models\Company;
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
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|numeric',
            // 'gender' => 'required|string',
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        // $user->gender = $request->gender;
        // Add other fields as necessary

        $user->save();

        return response()->json(['message' => 'Profile updated successfully', 'user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'token' => 'required|string', // Token for further validation if needed
        ]);

        $name = explode(' ', $request->name, 2); // Assuming the name is a single string
        $name = $name[0];
        $name_en = count($name) > 1 ? $name[1] : '';

        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'username' => $this->generateUniqueUsername($name, $name_en),
                'name' => $name,
                'name_en' => $name_en,
                'password' => Hash::make(Str::random(10)), // Random password, as it won't be used
                'status' => 'active', // or 'pending' based on your logic
                // Set other default values if necessary
            ]
        );

        // Here, you can implement logic to generate and return an API token
        // if your application requires it.

        return response()->json(['message' => 'User logged in successfully', 'user' => $user]);
    }

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
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }


    /**
     * Store a new manager with file uploads and company information.
     */
    public function storeManager(Request $request)
    {
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
            'status' => 'Active', // Assuming you want to set the status to Active once created
            'about' => $request->about,
            'about' => $request->about_en,
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
                'user' => $user,
                'company' => $company,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 201);
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
}

