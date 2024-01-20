<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Region;

class CityRegionSeeder extends Seeder
{
    public function run()
    {
        //cities
        $city1 = City::create(['name' => 'الدوحة']);
        $city2 = City::create(['name' => 'الخور']);
        $city3 = City::create(['name' => 'الشمال']);
        $city4 = City::create(['name' => 'الوسيل']);
        $city5 = City::create(['name' => 'الوكرة']);
        $city6 = City::create(['name' => 'دخان']);
        $city7 = City::create(['name' => 'مسيعيد']);
        $city8 = City::create(['name' => 'الشحانية']);

        //  regions for City  => الدوحة
        Region::create(['city_id' => $city1->id, 'name' => 'الخريطيات']);
        Region::create(['city_id' => $city1->id, 'name' => 'الخيسة']);
        Region::create(['city_id' => $city1->id, 'name' => 'ابوهامور']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام صلال علي']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام صلال محمد']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام غويلينا']);
        Region::create(['city_id' => $city1->id, 'name' => 'ازغوه']);
        Region::create(['city_id' => $city1->id, 'name' => 'الاصمخ']);
        Region::create(['city_id' => $city1->id, 'name' => 'البدع']);
        Region::create(['city_id' => $city1->id, 'name' => 'الثمامة']);
        Region::create(['city_id' => $city1->id, 'name' => 'الجاسرة']);
        Region::create(['city_id' => $city1->id, 'name' => 'الهتمي']);
        Region::create(['city_id' => $city1->id, 'name' => 'الحي الدبلوماسي ']);
        Region::create(['city_id' => $city1->id, 'name' => 'الخليج الغربي']);
        Region::create(['city_id' => $city1->id, 'name' => 'الدحيل']);
        Region::create(['city_id' => $city1->id, 'name' => 'الدفنة']);
        Region::create(['city_id' => $city1->id, 'name' => 'الدوحة الجديدة']);
        Region::create(['city_id' => $city1->id, 'name' => 'الروضة']);
        Region::create(['city_id' => $city1->id, 'name' => 'الريان']);
        Region::create(['city_id' => $city1->id, 'name' => 'السد']);
        Region::create(['city_id' => $city1->id, 'name' => 'السودان']);
        Region::create(['city_id' => $city1->id, 'name' => 'السيلية']);
        Region::create(['city_id' => $city1->id, 'name' => 'العزيزية']);
        Region::create(['city_id' => $city1->id, 'name' => 'العسيري']);
        Region::create(['city_id' => $city1->id, 'name' => 'الغانم']);
        Region::create(['city_id' => $city1->id, 'name' => 'الغرافة']);
        Region::create(['city_id' => $city1->id, 'name' => 'اللؤلؤة']);
        Region::create(['city_id' => $city1->id, 'name' => 'اللقطة']);
        Region::create(['city_id' => $city1->id, 'name' => 'المرخية']);
        Region::create(['city_id' => $city1->id, 'name' => 'المرقاب']);
        Region::create(['city_id' => $city1->id, 'name' => 'مريخ']);
        Region::create(['city_id' => $city1->id, 'name' => 'المسيلة']);
        Region::create(['city_id' => $city1->id, 'name' => 'المعمورة']);
        Region::create(['city_id' => $city1->id, 'name' => 'المنتزه']);
        Region::create(['city_id' => $city1->id, 'name' => 'المنصورة']);
        Region::create(['city_id' => $city1->id, 'name' => 'المنطقة الصناعية']);
        Region::create(['city_id' => $city1->id, 'name' => 'النجمة']);
        Region::create(['city_id' => $city1->id, 'name' => 'النخيل']);
        Region::create(['city_id' => $city1->id, 'name' => 'النصر']);
        Region::create(['city_id' => $city1->id, 'name' => 'نعيجة']);
        Region::create(['city_id' => $city1->id, 'name' => 'الهلال']);
        Region::create(['city_id' => $city1->id, 'name' => 'الوعب']);
        Region::create(['city_id' => $city1->id, 'name' => 'بحيرة وست لاجون']);
        Region::create(['city_id' => $city1->id, 'name' => 'بن عمران']);
        Region::create(['city_id' => $city1->id, 'name' => 'حي الاعمال']);
        Region::create(['city_id' => $city1->id, 'name' => 'راس ابو عبود']);
        Region::create(['city_id' => $city1->id, 'name' => 'روضة النخيل']);
        Region::create(['city_id' => $city1->id, 'name' => 'سلطه']);
        Region::create(['city_id' => $city1->id, 'name' => 'شارع الخليج']);
        Region::create(['city_id' => $city1->id, 'name' => 'شارع الكورنيش']);
        Region::create(['city_id' => $city1->id, 'name' => 'شارع كليب']);
        Region::create(['city_id' => $city1->id, 'name' => 'طريق المطار القديم']);
        Region::create(['city_id' => $city1->id, 'name' => 'طريق سلوي']);
        Region::create(['city_id' => $city1->id, 'name' => 'عنيزة']);
        Region::create(['city_id' => $city1->id, 'name' => 'عين خالد']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج بن محمود']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج بن عبدالعزيز']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج كليب']);
        Region::create(['city_id' => $city1->id, 'name' => 'مدينة خليفة']);
        Region::create(['city_id' => $city1->id, 'name' => 'مسيمر']);
        Region::create(['city_id' => $city1->id, 'name' => 'مشيرب']);
        Region::create(['city_id' => $city1->id, 'name' => 'منطقة المطار']);
        Region::create(['city_id' => $city1->id, 'name' => 'منطقة معيذر']);
        Region::create(['city_id' => $city1->id, 'name' => 'وادي السيل']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام قرن']);
        Region::create(['city_id' => $city1->id, 'name' => 'سميسمة']);
        Region::create(['city_id' => $city1->id, 'name' => 'روضة الحمامة']);
        Region::create(['city_id' => $city1->id, 'name' => 'الايركية']);
        Region::create(['city_id' => $city1->id, 'name' => 'المره الغربية']);
        Region::create(['city_id' => $city1->id, 'name' => 'المرة الشرقية']);
        Region::create(['city_id' => $city1->id, 'name' => 'المناصير']);


        //  regions for City  => الخور
        Region::create(['city_id' => $city2->id, 'name' => 'الذخيرة']);
        Region::create(['city_id' => $city2->id, 'name' => 'وسط المدينة']);

        //  regions for City  => الشمال

        Region::create(['city_id' => $city3->id, 'name' => 'ام العمد']);   
        Region::create(['city_id' => $city3->id, 'name' => ' الرويس']);   
        Region::create(['city_id' => $city3->id, 'name' => 'مدينة الشمال ']);   
        Region::create(['city_id' => $city3->id, 'name' => 'مسيكة ']);  

        //  regions for City  => الوسيل

        Region::create(['city_id' => $city4->id, 'name' => 'الواجهة المائية ']);   
        Region::create(['city_id' => $city4->id, 'name' => ' فوكس هيلز']);   
        Region::create(['city_id' => $city4->id, 'name' => ' منطقة المارينا ']);   
        Region::create(['city_id' => $city4->id, 'name' => 'جزر قطيفان ']);   

          //  regions for City  => الوكرة

        Region::create(['city_id' => $city5->id, 'name' => 'الوكير']);   
        Region::create(['city_id' => $city5->id, 'name' => ' قرية بروة ']);   
        Region::create(['city_id' => $city5->id, 'name' => ' مسلخ']);   
        Region::create(['city_id' => $city5->id, 'name' => 'المشاف']);   

          
         //  regions for City  => دخان

        Region::create(['city_id' => $city6->id, 'name' => 'دخان']);  
        
        
         //  regions for City  => مسيعيد

        Region::create(['city_id' => $city7->id, 'name' => 'المنطقة الصناعية']);  
        Region::create(['city_id' => $city7->id, 'name' => 'بركة العوامر ']);  

         //  regions for City  => مسيعيد

        Region::create(['city_id' => $city8->id, 'name' => 'المنطقة الصناعية']);  
        Region::create(['city_id' => $city8->id, 'name' => 'بركة العوامر ']);  
 

 }
}
