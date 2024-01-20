<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Helpers\AuthHelper;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
class EmployeesController extends Controller
{
    /**
     * Display a listing of employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the company_id of the currently logged-in user
        $currentCompanyId = Auth::user()->company_id;

        // Fetch users who belong to the same company
        $users = User::where('company_id', $currentCompanyId)->get();

        // Pass the users to the view
        return view('employees.index', compact('users'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $user = new User(); // Create an empty User object
        return view('employees.create', compact('user', 'companies'));
    }

    /**
     * Store a newly created employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            // Add any other necessary validation rules
        ]);
    
        // Retrieve company_id of the currently logged-in user
        $currentUserId = Auth::id();
        $currentUser = User::find($currentUserId);
        $company_id = $currentUser->company_id;
    
        // Generate a unique username
        $id = User::orderBy('id', 'desc')->first()->id + 1;
        $username = strtolower($request->first_name).strtolower($request->last_name).'_'.$id;
    
        // Create new employee
        $user = User::create([
            'username' => $username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'company_id' => $company_id,
            'password' => Hash::make($request->password),
            'user_type' => 'employee' // Explicitly setting user_type to 'employee'
        ]);
    
        // Assign 'employee' role to the user
        $user->assignRole('employee');
    
        // Redirect to the employees index page with a success message
        return redirect()->route('employees.index')->withSuccess('Employee created successfully');
    }
    /**
     * Display the specified employee.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Fetch the user by ID
        $companies = Company::all(); // Assuming you need to list companies
    
        // Pass the user and companies to the view. 
        // The user object includes the user's ID.
        return view('employees.create', compact('user', 'id'));
    }
    
    
    /**
     * Update the specified employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        {
            // Validate the request data
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => $id ? 'nullable|string|confirmed|min:8' : 'required|string|confirmed|min:8',
            ]);

            // Find the user by ID
            $user = User::findOrFail($id);

            // Update the user data
            $user->update([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
                // Other fields...
            ]);

            // Update password if provided
            if ($request->filled('password')) {
                $user->password = Hash::make($validatedData['password']);
                $user->save();
            }

            // Redirect to the employees index page with a success message
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
        }


    /**
     * Remove the specified employee from the database.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // Or (Employee $employee) if using route model binding
    {
        // Find the user by id and delete
        $user = User::findOrFail($id); // If using route model binding, this line is not needed
        $user->delete();
    
        // Redirect to the employees index page with a success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
