<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('ad_types')->insert([
            ['name' => 'للبيع', 'name_en' => 'Sell'],
            ['name' => 'للايجار', 'name_en' => 'Rent'],
        ]);
    }
}
