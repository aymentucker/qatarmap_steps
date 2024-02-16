<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'user_id', 'company_id', 'property_name','property_name_en', 'property_type_id', 'category_id',
        'city', 'region', 'floor', 'rooms', 'bathrooms', 'furnishing_id', 'ad_type_id',
        'property_area', 'price', 'description' , 'description_en','status'
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id'); // If owned by an individual user
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function propertyView()
    {
        return $this->hasOne(PropertyView::class);
    }
    public function propertyType() {
        return $this->belongsTo(PropertyType::class);
    }
    
    public function furnishing() {
        return $this->belongsTo(Furnishing::class);
    }
    
    public function adType() {
        return $this->belongsTo(AdType::class);
    }
    
    
    
    


    // Add other relationships here if needed, like favorited by users, etc.
}
