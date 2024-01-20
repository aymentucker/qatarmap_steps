<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'user_id', 'company_id', 'property_name', 'property_type', 'categories',
        'city', 'region', 'floor', 'rooms', 'bathrooms', 'furnishing', 'ad_type',
        'property_area', 'price', 'description', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    // Add other relationships here if needed, like favorited by users, etc.
}
