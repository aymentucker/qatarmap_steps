<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdSlider;

class AdSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adSliders = [
            [
                'name' => 'Resort Aerial View',
                'image' => 'https://qatarmap.qa/wp-content/uploads/2023/07/WhatsApp-Image-2023-07-24-at-11.39.59.jpeg',
                'url_link' => 'https://qatarmap.qa',
                'subscription_period' => 'annually',
                'end_date' => now()->addYear(),
            ],
            [
                'name' => 'High-rise Buildings',
                'image' => 'https://qatarmap.qa/wp-content/uploads/2023/07/WhatsApp-Image-2023-07-24-at-11.39.59.jpeg',
                'url_link' => 'https://qatarmap.qa',
                'subscription_period' => 'annually',
                'end_date' => now()->addYear(),
            ],
            [
                'name' => 'Palm Trees Near Building',
                'image' => 'https://qatarmap.qa/wp-content/uploads/2023/07/WhatsApp-Image-2023-07-24-at-11.39.59.jpeg',
                'url_link' => 'https://qatarmap.qa',
                'subscription_period' => 'annually',
                'end_date' => now()->addYear(),
            ],
        ];

        foreach ($adSliders as $slider) {
            AdSlider::create($slider);
        }
    }
}
