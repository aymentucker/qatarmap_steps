<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscription;
use App\Models\Package;

class SubscriptionsAndPackagesSeeder extends Seeder
{
    public function run()
    {
        // Subscription types with prices
        $subscriptionTypes = [
            ['name' => 'Monthly', 'type' => 'owner', 'price' => 29.99],
            ['name' => 'Annual', 'type' => 'owner', 'price' => 299.99],
            ['name' => 'Semi-Annual', 'type' => 'owner', 'price' => 159.99],
            ['name' => 'Monthly', 'type' => 'company', 'price' => 99.99],
            ['name' => 'Annual', 'type' => 'company', 'price' => 999.99],
            ['name' => 'Semi-Annual', 'type' => 'company', 'price' => 519.99],
        ];

        foreach ($subscriptionTypes as $type) {
            Subscription::create($type);
        }

        // Package options with prices
        $packageOptions = [
            ['name' => '5 Properties', 'type' => 'properties', 'limit' => 5, 'price' => 19.99],
            ['name' => '10 Properties', 'type' => 'properties', 'limit' => 10, 'price' => 34.99],
            ['name' => '20 Properties', 'type' => 'properties', 'limit' => 20, 'price' => 59.99],
            ['name' => '5 Employees', 'type' => 'employees', 'limit' => 5, 'price' => 49.99],
            ['name' => '10 Employees', 'type' => 'employees', 'limit' => 10, 'price' => 89.99],
            ['name' => '20 Employees', 'type' => 'employees', 'limit' => 20, 'price' => 169.99],
        ];

        foreach ($packageOptions as $option) {
            Package::create($option);
        }
    }
}
