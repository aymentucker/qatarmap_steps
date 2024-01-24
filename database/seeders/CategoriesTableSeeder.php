<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'شقق سكنية',
            'فلل سكنية',
            'مستودعات',
            'مكاتب تجارية',
            'محلات تجارية',
            'فلل ادارية وتجارية',
            'عمارات وابراج',
            'بيوت شعبية',
            'سكن عمال',
            'عقارات اخري',
            'خارج قطر'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
