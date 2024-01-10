<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'company_id', 
        'name', 
        'photo', // assuming it's stored as a URL or path
        'phone_number', 
        'email'
    ];

    /**
     * Get the company that the employee belongs to.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the properties associated with the employee.
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    // Add other relationships here if needed
}
