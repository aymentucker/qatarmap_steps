<?php

namespace App\Http\Controllers\Api;

use App\Models\User; // Assuming you have a User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
