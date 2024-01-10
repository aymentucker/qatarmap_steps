<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

    protected $fillable = [
        'companies_id',
        'identification_number',
        'client_name',
        'phone_number',
        'address',
        'notes',
        'status',
    ];

    public function companies()
    {
        return $this->belongsTo(companies::class);
    }
}
