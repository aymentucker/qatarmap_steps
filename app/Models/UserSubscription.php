<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSubscription extends Pivot
{
    protected $fillable = [
        'user_id',
        'subscription_id',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public $timestamps = true;
}
