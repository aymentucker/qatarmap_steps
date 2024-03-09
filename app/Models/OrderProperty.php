<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProperty extends Model
{
    use HasFactory;

    protected $table = 'order_properties';

    protected $fillable = [
        'user_id', 'category_id', 'property_type_id', 'furnishing_id', 'ad_type_id',
        'city_id', 'region_id', 'floor', 'rooms', 'bathrooms',
        'price_min', 'price_max', 'property_area_min', 'property_area_max',
        'description', 'description_en',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function furnishing()
    {
        return $this->belongsTo(Furnishing::class);
    }

    public function adType()
    {
        return $this->belongsTo(AdType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
