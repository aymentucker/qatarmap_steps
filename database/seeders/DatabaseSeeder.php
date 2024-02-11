<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            AppSettingTableSeeder::class,
            CategoriesTableSeeder::class,
            CityRegionSeeder::class,
            AdSliderSeeder::class,
            PropertyTypeSeeder::class,
            FurnishingSeeder::class,
            AdTypeSeeder::class,
        ]);
        if(env('IS_DEMO')) {
            $count = $this->command->ask("How much demo user you wan't", 0);
            if($count > 0) {
                \App\Models\User::factory($count)->create()->each(function($user) {
                    $user->assignRole('user');
                });
                \App\Models\UserProfile::factory($count)->create();
            }
        }
    }
}
