<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'license_number', 
        'address', 
        'description', 
        'logo', 
        'social_media_links'
    ];

    // Define relationships here if needed, e.g., a company has many employees
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
