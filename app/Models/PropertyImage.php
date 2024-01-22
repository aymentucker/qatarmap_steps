<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = ['url','property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id'); // Adjust 'property_id' if your column has a different name
    }

}

