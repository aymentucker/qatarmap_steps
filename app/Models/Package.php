<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name', // e.g., 5 properties, 10 employees
        'type', // e.g., properties, employees
        'limit',
        'price'
    ];

    // User relationship
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_packages')
                    ->withTimestamps()
                    ->withPivot(['current_usage']);
    }

    // Company relationship if packages are also applicable to companies
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_packages')
                    ->withTimestamps()
                    ->withPivot(['current_usage']);
    }
}
