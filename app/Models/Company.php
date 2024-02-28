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
        'company_name_en',
        'license_number',
        'status', // Since you're setting a default value, you might still want to allow mass assignment in case you need to override the default.
        'about',
        'about_en',
        'logo',
        'valuation',
        'address',
        
    ];
    
    /**
     * Get the users for the company.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /// a relationship to Property:

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    // /// a relationship to files:

    // public function files()
    // {
    //     return $this->morphMany(File::class, 'fileable');
    // }

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

    public function followers()
    {
        return $this->belongsToMany(User::class, 'company_user', 'company_id', 'user_id')->withTimestamps();
    }

    // Subscriptions for companies, if different from individual users
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'company_subscriptions')->withTimestamps();
    }

    // Packages could be handled similarly if different from individual users
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'company_packages')->withTimestamps();
    }


}
