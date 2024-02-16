<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPackage extends Pivot
{
    protected $fillable = [
        'user_id',
        'package_id',
        'current_usage', // Tracks how much of the package the user has utilized
    ];

    public $timestamps = true;

    /**
     * Increment the usage of the package.
     *
     * @param int $amount The amount to increment by, defaulting to 1.
     * @return bool Whether the increment was successful.
     */
    public function incrementUsage(int $amount = 1): bool
    {
        // Check if incrementing does not exceed the package limit
        if ($this->canIncrement($amount)) {
            $this->current_usage += $amount;
            $this->save();
            return true;
        }

        // Return false if the increment would exceed the limit
        return false;
    }

    /**
     * Check if the package usage can be incremented by a given amount.
     *
     * @param int $amount The amount to check for increment.
     * @return bool Whether the usage can be incremented.
     */
    public function canIncrement(int $amount = 1): bool
    {
        $package = $this->package; // Assuming you have a relationship defined to the Package model
        return ($this->current_usage + $amount) <= $package->limit;
    }

    /**
     * Check if the current usage has reached the package limit.
     *
     * @return bool Whether the usage has reached the limit.
     */
    public function isLimitReached(): bool
    {
        return $this->current_usage >= $this->package->limit;
    }

     // Relationship to the Package model, assuming it's defined
     public function package()
     {
         return $this->belongsTo(Package::class);
     }
}
