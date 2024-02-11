<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $fillable = ['name', 'name_en'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

}
