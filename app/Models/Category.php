<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'name',
        // Include any other fields you may have in the categories table
    ];

    /**
     * Get the properties associated with the category.
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
