<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppSetting;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // saveLocal: 'sessionStorage', 'localStorage'
        AppSetting::create([
            'user_id' => 1,
            'type' => 'setting',
            'name' => 'layout_setting',
            'value' => '{
        "saveLocal": "sessionStorage",
        "storeKey": "quisetting-laravel",
        "setting": {
            "app_name": {
                "value": "Qompac UI"
            },
            "theme_scheme_direction": {
                "value": "ltr"
            },
            "theme_scheme": {
                "value": "light"
            },
            "theme_color": {
                "colors": {
                    "--{{prefix}}primary": "#7016d0",
                    "--{{prefix}}secondary": "#aca4bc",
                    "--{{prefix}}tertiray": "#3FF0B9",
                    "--{{prefix}}success": "#1AA053",
                    "--{{prefix}}danger": "#C03221",
                    "--{{prefix}}warning": "#F16A1B"
                },
                "value": "theme-color-default"
            },
            "theme_font_size": {
                "value": "theme-fs-sm"
            },
            "page_layout": {
                "value": "container"
            },
            "sidebar_color": {
                "value": "sidebar-white"
            },
            "sidebar_type": {
                "value": []
            },
            "sidebar_menu_style": {
                "value": "sidebar-default navs-rounded-all"
            }
        }
    }',
            'status' => 1,
            'is_global' => 1,
        ]);
    }
}
