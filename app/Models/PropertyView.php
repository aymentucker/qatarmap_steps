<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyView extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 
        'view_count'
    ];

    /**
     * Get the property that this view belongs to.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
