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
    // public function index()
    // {
    //     // Retrieve the company_id of the currently logged-in user
    //     $currentCompanyId = Auth::user()->company_id;

    //     // Fetch users who belong to the same company
    //     $users = User::where('company_id', $currentCompanyId)->get();

    //     // Pass the users to the view
    //     return view('employees.index', compact('users'));
    // }

    public function index(Request $request)
{
    // Fetch all companies for the filter dropdown
    $companies = Company::all();

    // Check if a company_id filter is applied
    if ($request->has('company_id') && $request->company_id != '') {
        // Filter users belonging to the selected company
        $users = User::where('company_id', $request->company_id)->get();
    } else {
        // No company filter applied, fetch all users
        $users = User::all();
    }

    // Pass users and companies to the view
    return view('employees.index', compact('users', 'companies'));
}


    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        // Fetch companies
        $companies = Company::all()->pluck('company_name', 'id');
        // $user = new User(); // Create an empty User object
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'company_id' => 'required|integer|exists:companies,id',
            'status' => 'required|string|in:Active,Inactive,Pending', // Validate status
        ]);

        // Generate a unique username
        $id = User::orderBy('id', 'desc')->first() ? User::orderBy('id', 'desc')->first()->id + 1 : 1;
        $username = strtolower($request->name) . strtolower($request->name_en) . '_' . $id;

        // Create the user with employee type and status
        $user = User::create([
            'username' => $username,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => $request->company_id,
            'user_type' => 'employee', // Set user_type to 'employee'
            'status' => $request->status, // Set the user status
        ]);

        // Optionally, assign 'employee' role to the user if you're using a role management package like spatie/laravel-permission
        // $user->assignRole('employee');

        // Redirect to a given route with a success message
        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
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
        // Fetch the user by ID
        $user = User::findOrFail($id);
    
        // Fetch all companies and create a list suitable for a dropdown.
        // Here, 'id' is the value of the option, and 'company_name' is the display text.
        $companies = Company::pluck('company_name', 'id');
    
        // Pass both the user and the companies list to the view.
        // Additionally, pass the 'id' of the user to the view, though it's accessible through the $user object as well.
        // You might not need to pass 'id' separately if the $user object suffices.
        return view('employees.create', compact('user', 'companies', 'id'));
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
                'name' => 'required|string|max:255',
                'name_en' => 'required|string|max:255',
                'phone_number' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => $id ? 'nullable|string|confirmed|min:8' : 'required|string|confirmed|min:8',
                'status' => 'required|string|in:Active,Inactive,Pending', // Validate status

            ]);

            // Find the user by ID
            $user = User::findOrFail($id);

            // Update the user data
            $user->update([
                'name' => $validatedData['name'],
                'name_en' => $validatedData['name_en'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
                'status' => $validatedData['status'], // Update the status
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
