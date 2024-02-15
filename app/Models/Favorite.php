<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'property_id'
    ];

    /**
     * Get the user that added the favorite.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the property that was favorited.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    
    protected static function boot() {
        parent::boot();
    
        static::created(function ($favorite) {
            $favorite->property->increment('favorites_count');
        });
    
        static::deleted(function ($favorite) {
            $favorite->property->decrement('favorites_count');
        });
    }
    
}
