<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FurnishingSeeder extends Seeder
{
    public function run()
    {
        DB::table('furnishings')->insert([
            ['name' => 'مفروشة', 'name_en' => 'Furnished'],
            ['name' => 'شبه مفروشة', 'name_en' => 'Semi-Furnished'],
            ['name' => 'غير مفروشة', 'name_en' => 'Unfurnished'],
        ]);
    }
}
