<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'name'];

    /**
     * Get the city that the region belongs to.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
