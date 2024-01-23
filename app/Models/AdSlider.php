<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdSlider extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image', 'subscription_period', 'end_date'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'end_date' => 'date',
    ];

}
