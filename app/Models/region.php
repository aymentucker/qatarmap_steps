<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'name', 'name_en', 'lat_lng'];

    /**
     * Get the city that the region belongs to.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
