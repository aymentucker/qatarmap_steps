<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'license_number',
        // 'address',
        // 'phone_number',
        // 'logo',
    ];

    /**
     * Get the users for the company.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    ///In your Company model, define a relationship to Property:

    public function properties()
    {
        return $this->hasMany(Property::class);
    }


    // Other model methods...

    
    public function store(Request $request)
    {
        // ... existing code ...

        $request->validate([
            // ... other validation rules ...
            'company_name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
        ]);

        // ... existing user creation code ...

        // Create or associate the company data with the user
        $company = new Company([
            'company_name' => $request->company_name,
            'license_number' => $request->license_number
        ]);

        $user->company()->save($company);

        // ... remaining code ...

        return redirect(RouteServiceProvider::HOME);
    }
}
