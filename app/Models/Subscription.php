<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $fillable = [
        'name', // e.g., monthly, annual, semi-annual
        'type', // e.g., owner, company
        'price',
    ];

    // User relationship
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subscriptions')
                    ->withTimestamps()
                    ->withPivot(['start_date', 'end_date']);
    }

    // Add a company relationship if you have a separate company entity
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_subscriptions')
                    ->withTimestamps()
                    ->withPivot(['start_date', 'end_date']);
    }
}
