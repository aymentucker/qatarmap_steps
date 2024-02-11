<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('property_types')->insert([
            ['name' => 'سكني', 'name_en' => 'Residential'],
            ['name' => 'تجاري', 'name_en' => 'Commercial'],
        ]);
    }
}

