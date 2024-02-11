<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company; // Assuming you have a Company model

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if(env('IS_DEMO')==true) {
            return redirect()->back()->with('error', "Permission denied you are in demo mode.");
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'company_name' => 'required|string|max:255', // Company name validation
            'license_number' => 'required|string|max:255', // License number validation
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'terms' => 'required',
        ]);

          // Create the company first
            $company = new Company([
                'company_name' => $request->company_name,
                'license_number' => $request->license_number,
                'status' => 'Pending',
                // Add other company fields as necessary
            ]);
            $company->save();

        $id = User::orderBy('id','desc')->first()->id + 1;
        Auth::login($user = User::create([
            'username' => strtolower($request->name).strtolower($request->name_en).'_'.$id,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'company_id' => $company->id, // Use the ID from the company you just created
            'password' => Hash::make($request->password),
            'user_type' => 'user'
        ]));
       
        $user->assignRole('user');

        // event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

  
}
