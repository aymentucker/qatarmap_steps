<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'employee_id', 
        'name', 
        'price', 
        'city', 
        'region', 
        'description', 
        'num_bathrooms', 
        'num_rooms', 
        'type', 
        'furnishing_status', 
        'area', 
        'pictures', // assuming it's stored as a JSON string or single path
        'address', 
        'status'
    ];

    /**
     * Get the employee that added the property.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Add other relationships here if needed, like favorited by users, etc.
}
