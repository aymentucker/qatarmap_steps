<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the regions for the city.
     */
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
