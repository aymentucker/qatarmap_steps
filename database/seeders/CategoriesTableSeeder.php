<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
    
        $categories = [
            ['name' => 'شقق سكنية', 'name_en' => 'Residential Apartments'],
            ['name' => 'فلل سكنية', 'name_en' => 'Residential Villas'],
            ['name' => 'مستودعات', 'name_en' => 'Warehouses'],
            ['name' => 'مكاتب تجارية', 'name_en' => 'Commercial Offices'],
            ['name' => 'محلات تجارية', 'name_en' => 'Commercial Shops'],
            ['name' => 'فلل ادارية وتجارية', 'name_en' => 'Administrative and Commercial Villas'],
            ['name' => 'عمارات وابراج', 'name_en' => 'Buildings and Towers'],
            ['name' => 'بيوت شعبية', 'name_en' => 'Traditional Houses'],
            ['name' => 'سكن عمال', 'name_en' => 'Labor Accommodation'],
            ['name' => 'عقارات اخري', 'name_en' => 'Other Properties'],
            ['name' => 'خارج قطر', 'name_en' => 'Outside Qatar'],
        ];
        

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'name_en' => $category['name_en'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
