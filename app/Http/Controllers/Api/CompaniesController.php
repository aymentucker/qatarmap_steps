<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\Category; 
use App\Models\City;
use App\Models\Region;
use App\Models\PropertyType;
use App\Models\Furnishing;
use App\Models\AdType;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\PropertyView;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{


     // Return all companies
     public function index()
     {
        // Filter companies by 'Active' status before wrapping them in CompanyCollection
        $activeCompanies = Company::where('status', 'Active')->get();

        return new CompanyCollection($activeCompanies);

        //  return new CompanyCollection(Company::all());
     }

     // Return a single company
     public function show($id)
     {
         $company = Company::with(['properties', 'users'])
             ->findOrFail($id);
     
         // Assuming you want to get the email and phone number of the first related user
         $firstUser = $company->users->first();
     
         // Construct the response array with only the fields you need
         $response = [
            'id' => $company->id,
             'company_name' => $company->company_name,
             'company_name_en' => $company->company_name_en,
             'license_number' => $company->license_number,
             'about' => $company->about,
             'about_en' => $company->about_en,
             'logo' => $company->logo,
             'address' => $company->address,
             'email' => $firstUser?->email, // Use null safe operator
             'phone_number' => $firstUser?->phone_number, // Use null safe operator
         ];

           // Wrap the response data within a 'data' key
             return response()->json(['data' => $response]);
   
     }

    /**
     * Display a list of companies that have valuation.
     */
    public function fetchValuationCompanies()
    {
        $valuationCompanies = Company::where('valuation', true)
            ->where('status', 'Active') // filter by Active status
            ->orderBy('updated_at', 'desc')
            ->get();
    
        if ($valuationCompanies->isEmpty()) {
            return response()->json(['message' => 'No valuation companies found'], 200); // Consider using 200 if this is not an error but a valid empty state
        }
    
        return response()->json(['data' => $valuationCompanies]);

        // return response()->json($valuationCompanies);
    }
    
    public function followCompany(Request $request, $companyId)
        {
            $user = Auth::user(); // Get the authenticated user
            $company = Company::findOrFail($companyId); // Ensure the company exists

            // Attach the user to the company's followers
            $user->followedCompanies()->syncWithoutDetaching([$companyId]);

            return response()->json(['message' => 'Successfully followed the company']);
        }

    public function unfollowCompany(Request $request, $companyId)
    {
        $user = Auth::user(); // Get the authenticated user
        $company = Company::findOrFail($companyId); // Ensure the company exists

        // Detach the user from the company's followers
        $user->followedCompanies()->detach($companyId);

        return response()->json(['message' => 'Successfully unfollowed the company']);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
