<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Region;

class CityRegionSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have added 'name_en' and 'lat_lng' columns to your cities and regions tables
        $city1 = City::create(['name' => 'الدوحة', 'name_en' => 'Doha', 'lat_lng_city' => '25.285735, 51.531645']);
        $city2 = City::create(['name' => 'الخور', 'name_en' => 'Al Khor', 'lat_lng_city' => '25.680403, 51.496823']);
        $city3 = City::create(['name' => 'الشمال', 'name_en' => 'Al Shamal', 'lat_lng_city' => '26.048607, 51.209230']);
        $city4 = City::create(['name' => 'الوسيل', 'name_en' => 'Lusail', 'lat_lng_city' => '25.424921, 51.503561']);
        $city5 = City::create(['name' => 'الوكرة', 'name_en' => 'Al Wakra', 'lat_lng_city' => '25.164897, 51.596867']);
        $city6 = City::create(['name' => 'دخان', 'name_en' => 'Dukhan', 'lat_lng_city' => '25.428177, 50.782882']);
        $city7 = City::create(['name' => 'مسيعيد', 'name_en' => 'Mesaieed', 'lat_lng_city' => '24.989265, 51.549178']);
        $city8 = City::create(['name' => 'الشحانية', 'name_en' => 'Ash Shaḩānīyah', 'lat_lng_city' => '25.406469, 51.187973']);

        // Regions for City => الدوحة (Doha)
        Region::create(['city_id' => $city1->id, 'name' => 'الخريطيات', 'name_en' => 'Al Kharaitiyat', 'lat_lng' => '25.381392, 51.434874']);
        Region::create(['city_id' => $city1->id, 'name' => 'الخيسة', 'name_en' => 'Al Kheesa', 'lat_lng' => '25.398471, 51.451856']);
        Region::create(['city_id' => $city1->id, 'name' => 'العب', 'name_en' => 'Al Ebb', 'lat_lng' => '25.390823, 51.449361']);
        Region::create(['city_id' => $city1->id, 'name' => 'ابوهامور', 'name_en' => 'Abu Hamour', 'lat_lng' => '25.240888, 51.488436']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام صلال علي', 'name_en' => 'Umm Salal Ali', 'lat_lng' => '25.469155, 51.396999']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام صلال محمد', 'name_en' => 'Umm Salal Mohammed', 'lat_lng' => '25.397552, 51.424567']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام غويلينا', 'name_en' => 'Umm Ghuwailina', 'lat_lng' => '25.276890, 51.547954']);
        Region::create(['city_id' => $city1->id, 'name' => 'ازغوى', 'name_en' => 'Izghawa', 'lat_lng' => '25.359247, 51.435795']);
        Region::create(['city_id' => $city1->id, 'name' => 'الأصمخ', 'name_en' => 'Al Asmakh', 'lat_lng' => '25.280557, 51.533690']);
        Region::create(['city_id' => $city1->id, 'name' => 'البدع', 'name_en' => 'Al Bidda', 'lat_lng' => '25.291712, 51.522521']);
        Region::create(['city_id' => $city1->id, 'name' => 'الثمامة', 'name_en' => 'Al Thumama', 'lat_lng' => '25.230689, 51.542240']);
        Region::create(['city_id' => $city1->id, 'name' => 'الجاسرة', 'name_en' => 'Al Jasra', 'lat_lng' => '25.288668, 51.532183']);
        Region::create(['city_id' => $city1->id, 'name' => 'الهتمي', 'name_en' => 'Al Hitmi', 'lat_lng' => '25.284772, 51.545420']);
        Region::create(['city_id' => $city1->id, 'name' => 'الحي الدبلوماسي', 'name_en' => 'Diplomatic Area', 'lat_lng' => '25.344355, 51.515144']);
        Region::create(['city_id' => $city1->id, 'name' => 'الخليج الغربي', 'name_en' => 'West Bay', 'lat_lng' => '25.328181, 51.530444']);
        Region::create(['city_id' => $city1->id, 'name' => 'الدحيل', 'name_en' => 'Al Duhail', 'lat_lng' => '25.358865, 51.464202']);
        Region::create(['city_id' => $city1->id, 'name' => 'الدفنة', 'name_en' => 'Al Dafna', 'lat_lng' => '25.312122, 51.519045']);
        Region::create(['city_id' => $city1->id, 'name' => 'الدوحة الجديدة', 'name_en' => 'New Doha', 'lat_lng' => '25.276724, 51.531959']);
        Region::create(['city_id' => $city1->id, 'name' => 'الروضة', 'name_en' => 'Al Rawda', 'lat_lng' => ' 25.246765, 51.559720']);
        Region::create(['city_id' => $city1->id, 'name' => 'الريان الجديد', 'name_en' => 'Al Rayyan Al Jadeed', 'lat_lng' => '25.289828, 51.421895']);
        Region::create(['city_id' => $city1->id, 'name' => 'الريان القديم', 'name_en' => 'Al Rayyan Al Qadeem', 'lat_lng' => '25.300651, 51.447724']);
        Region::create(['city_id' => $city1->id, 'name' => 'السد', 'name_en' => 'Al Sadd', 'lat_lng' => '25.283196, 51.493987']);
        Region::create(['city_id' => $city1->id, 'name' => 'السودان', 'name_en' => 'Al Soudan', 'lat_lng' => '25.270268, 51.484179']);
        Region::create(['city_id' => $city1->id, 'name' => 'السيلية', 'name_en' => 'Al Sailiya', 'lat_lng' => '25.201684, 51.360648']);
        Region::create(['city_id' => $city1->id, 'name' => 'العزيزية', 'name_en' => 'Al Aziziya', 'lat_lng' => '25.236554, 51.446192']);
        Region::create(['city_id' => $city1->id, 'name' => 'العسيري', 'name_en' => 'Al Asiri', 'lat_lng' => '25.258805, 51.503610']);
        Region::create(['city_id' => $city1->id, 'name' => 'الغانم', 'name_en' => 'Al Ghanim', 'lat_lng' => '25.279893, 51.539349']);
        Region::create(['city_id' => $city1->id, 'name' => 'الغرافة', 'name_en' => 'Al Gharrafa', 'lat_lng' => '25.340759, 51.429176']);
        Region::create(['city_id' => $city1->id, 'name' => 'اللؤلؤة', 'name_en' => 'The Pearl', 'lat_lng' => '25.368072, 51.552149']);
        Region::create(['city_id' => $city1->id, 'name' => 'اللقطة', 'name_en' => 'Al Luqta', 'lat_lng' => '25.325383, 51.477826']);
        Region::create(['city_id' => $city1->id, 'name' => 'المرخية', 'name_en' => 'Al Markhiya', 'lat_lng' => '25.340262, 51.494686']);
        Region::create(['city_id' => $city1->id, 'name' => 'المرقاب', 'name_en' => 'Al Mirqab', 'lat_lng' => '25.281039, 51.535019']);
        Region::create(['city_id' => $city1->id, 'name' => 'المريخ', 'name_en' => 'Muraikh', 'lat_lng' => '25.266047, 51.540374']);
        Region::create(['city_id' => $city1->id, 'name' => 'المسيلة', 'name_en' => 'Al Messila', 'lat_lng' => '225.301578, 51.481653']);
        Region::create(['city_id' => $city1->id, 'name' => 'المعمورة', 'name_en' => 'Al Maamoura', 'lat_lng' => '25.244925, 51.502226']);
        Region::create(['city_id' => $city1->id, 'name' => 'المنتزه', 'name_en' => 'Al Muntazah', 'lat_lng' => '25.271255, 51.520021']);
        Region::create(['city_id' => $city1->id, 'name' => 'المنصورة', 'name_en' => 'Al Mansoura', 'lat_lng' => '25.267883, 51.528417']);
        Region::create(['city_id' => $city1->id, 'name' => 'المنطقة الصناعية القديمة', 'name_en' => 'Old Industrial Area', 'lat_lng' => '25.200739, 51.424609']);
        Region::create(['city_id' => $city1->id, 'name' => 'النجمة', 'name_en' => 'Al Najma', 'lat_lng' => '25.254209, 51.536711']);
        Region::create(['city_id' => $city1->id, 'name' => 'النخيل', 'name_en' => 'Al Nakheel', 'lat_lng' => '25.262514, 51.519699']);
        Region::create(['city_id' => $city1->id, 'name' => 'النصر', 'name_en' => 'Al Nasr', 'lat_lng' => '25.266727, 51.498682']);
        Region::create(['city_id' => $city1->id, 'name' => 'نعيجة', 'name_en' => 'Naija', 'lat_lng' => '25.245200, 51.532311']);
        Region::create(['city_id' => $city1->id, 'name' => 'الهلال', 'name_en' => 'Al Hilal', 'lat_lng' => '25.266338, 51.541311']);
        Region::create(['city_id' => $city1->id, 'name' => 'الوعب', 'name_en' => 'Al Waab', 'lat_lng' => '25.256639, 51.466672']);
        Region::create(['city_id' => $city1->id, 'name' => 'بحيرة وست لاجون', 'name_en' => 'West Bay Lagoon', 'lat_lng' => '25.363889, 51.506588']);
        Region::create(['city_id' => $city1->id, 'name' => 'بن عمران', 'name_en' => 'Bin Omran', 'lat_lng' => '25.302505, 51.497742']);
        Region::create(['city_id' => $city1->id, 'name' => 'حي الأعمال', 'name_en' => 'Business District', 'lat_lng' => '25.324860, 51.527719']);
        Region::create(['city_id' => $city1->id, 'name' => 'ر اس ابو عبود', 'name_en' => 'Ras Abu Aboud', 'lat_lng' => '25.284998, 51.572490']);
        Region::create(['city_id' => $city1->id, 'name' => 'شارع الخليج', 'name_en' => 'Gulf Street', 'lat_lng' => '25.280196, 51.518574']);
        Region::create(['city_id' => $city1->id, 'name' => 'شارع الكورنيش', 'name_en' => 'Corniche Street', 'lat_lng' => '25.314689, 51.521750']);
        Region::create(['city_id' => $city1->id, 'name' => 'شارع كليب', 'name_en' => 'Kulaib Road', 'lat_lng' => '25.318256, 51.493415']);
        Region::create(['city_id' => $city1->id, 'name' => 'طريق المطار القديم', 'name_en' => 'Old Airport Road', 'lat_lng' => '25.248192, 51.552906']);
        Region::create(['city_id' => $city1->id, 'name' => 'طريق سلوى', 'name_en' => 'Salwa Road', 'lat_lng' => '25.065137, 51.109165']);
        Region::create(['city_id' => $city1->id, 'name' => 'عنيزة', 'name_en' => 'Onaiza', 'lat_lng' => '25.330905, 51.513114']);
        Region::create(['city_id' => $city1->id, 'name' => 'عين خالد', 'name_en' => 'Ain Khaled', 'lat_lng' => '25.224816, 51.457514']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج بن محمود', 'name_en' => 'Fereej Bin Mahmoud', 'lat_lng' => '25.283421, 51.511935']);
        Region::create(['city_id' => $city1->id, 'name' => 'فر يج بن عبدالعز يز', 'name_en' => 'Fereej Bin Abdul Aziz', 'lat_lng' => '25.277644, 51.524073']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج الغانم الجديد', 'name_en' => 'Fereej Al Ghanim', 'lat_lng' => '25.235700,51.444754']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج كليب', 'name_en' => 'Fereej Kulaib', 'lat_lng' => '25.313721, 51.491952']);
        Region::create(['city_id' => $city1->id, 'name' => 'مدينة خليفة الجنوبية', 'name_en' => 'Khalifa South City', 'lat_lng' => '25.314125, 51.479617']);
        Region::create(['city_id' => $city1->id, 'name' => 'مدينة خليفة الشمالية', 'name_en' => 'Khalifa North City', 'lat_lng' => '25.328010, 51.473793']);
        Region::create(['city_id' => $city1->id, 'name' => 'مسيمير', 'name_en' => 'Mesaimeer', 'lat_lng' => '25.193936, 51.496651']);
        Region::create(['city_id' => $city1->id, 'name' => 'مشيرب', 'name_en' => 'Msheireb', 'lat_lng' => '25.283245, 51.522012']);
        Region::create(['city_id' => $city1->id, 'name' => 'منطقة المطار', 'name_en' => 'Airport Area', 'lat_lng' => '25.250014, 51.552691']);
        Region::create(['city_id' => $city1->id, 'name' => 'منطقة معيذر', 'name_en' => 'Muaither Area', 'lat_lng' => '25.254772, 51.412109']);
        Region::create(['city_id' => $city1->id, 'name' => 'وادي السيل', 'name_en' => 'Wadi Al Sail', 'lat_lng' => '25.309458, 51.503969']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام قرن', 'name_en' => 'Umm Qarn', 'lat_lng' => '25.551635, 51.437624']);
        Region::create(['city_id' => $city1->id, 'name' => 'سميسمة', 'name_en' => 'Simaisma', 'lat_lng' => '25.576123, 51.483264']);
        Region::create(['city_id' => $city1->id, 'name' => 'روضة الحمامة', 'name_en' => 'Rawdat Al Hamama', 'lat_lng' => '25.443214, 51.458294']);
        Region::create(['city_id' => $city1->id, 'name' => 'المره الغربية', 'name_en' => 'Al Mearad', 'lat_lng' => '25.231839, 51.428998']);
        Region::create(['city_id' => $city1->id, 'name' => 'المره الشرقية', 'name_en' => 'Al Mearad East', 'lat_lng' => '25.237579, 51.433599']);
        Region::create(['city_id' => $city1->id, 'name' => 'المناصير', 'name_en' => 'Al Manaseer', 'lat_lng' => '25.237140, 51.417617']);
        Region::create(['city_id' => $city1->id, 'name' => 'الضعاين', 'name_en' => 'Az̧ Z̧a‘āyin', 'lat_lng' => '25.57744, 51.48306']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام سعيد', 'name_en' => 'Umm Sa‘īd ', 'lat_lng' => '24.99611, 51.54889']);
        Region::create(['city_id' => $city1->id, 'name' => 'الضحى', 'name_en' => 'Ad-Daẖirah', 'lat_lng' => '25.897238, 51.533930']);
        Region::create(['city_id' => $city1->id, 'name' => 'الغويرية', 'name_en' => 'Al-Ghuwayriyah', 'lat_lng' => '25.842589, 51.245522']);
        Region::create(['city_id' => $city1->id, 'name' => 'مكينيس', 'name_en' => 'Mukaynis', 'lat_lng' => '25.123111, 51.217677']);
        Region::create(['city_id' => $city1->id, 'name' => 'الجميلية', 'name_en' => 'Al-Jumayliyah', 'lat_lng' => '25.619197, 51.084322']);
        Region::create(['city_id' => $city1->id, 'name' => 'ام باب', 'name_en' => 'Umm Bab', 'lat_lng' => '25.208396, 50.801725']);
        Region::create(['city_id' => $city1->id, 'name' => 'روضة راشد ', 'name_en' => 'Rawdat Rashed', 'lat_lng' => '25.235386, 51.204689']);
        Region::create(['city_id' => $city1->id, 'name' => 'أم عبيرية', 'name_en' => 'Umm Ebairiya', 'lat_lng' => '25.494431, 51.375000']);
        Region::create(['city_id' => $city1->id, 'name' => 'النصرانية', 'name_en' => 'Al Nasraniya', 'lat_lng' => '25.407434, 51.075853']);
        Region::create(['city_id' => $city1->id, 'name' => 'ناصرية', 'name_en' => 'Nasiriyah', 'lat_lng' => '25.332249, 51.424334']);
        Region::create(['city_id' => $city1->id, 'name' => 'بني هاجر', 'name_en' => 'Bani Hajer', 'lat_lng' => '25.316228, 51.402029']);
        Region::create(['city_id' => $city1->id, 'name' => 'الثميد', 'name_en' => 'Al Themaid', 'lat_lng' => '25.354941, 51.379243']);
        Region::create(['city_id' => $city1->id, 'name' => 'السلطة الجديدة', 'name_en' => 'As Salatah al Jadidah', 'lat_lng' => '25.260968, 51.515051']);
        Region::create(['city_id' => $city1->id, 'name' => 'السلطة القديمة', 'name_en' => 'Old As Salatah', 'lat_lng' => '25.289696, 51.545593']);
        Region::create(['city_id' => $city1->id, 'name' => 'أبا الحيران', 'name_en' => 'Aba Al-Hiran', 'lat_lng' => '25.258165, 51.370416']);
        Region::create(['city_id' => $city1->id, 'name' => 'سوق واقف', 'name_en' => 'Souq Waqif', 'lat_lng' => '25.288040, 51.532794']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج الأمير', 'name_en' => 'Fereej Al Amir', 'lat_lng' => '25.285128, 51.469767']);
        Region::create(['city_id' => $city1->id, 'name' => 'فريج بن محمود', 'name_en' => 'Fereej Bin Mahmoud', 'lat_lng' => '25.282257, 51.512665']);
        Region::create(['city_id' => $city1->id, 'name' => 'لعبيب', 'name_en' => 'Leabaib', 'lat_lng' => '25.376996, 51.456177']);

        // Regions for City => الخور (AlKhor)
        Region::create(['city_id' => $city2->id, 'name' => 'الذخيرة', 'name_en' => 'Al Dhakhira', 'lat_lng' => '25.730350, 51.538456']);
        
        // Regions for City => الشمال (Al Shamal)
        Region::create(['city_id' => $city3->id, 'name' => 'أم العمد', 'name_en' => 'Umm Al Amad', 'lat_lng' => '25.488063, 51.396906']);
        Region::create(['city_id' => $city3->id, 'name' => 'الرويس', 'name_en' => 'Al Ruwais', 'lat_lng' => '26.129201, 51.198735']);
        Region::create(['city_id' => $city3->id, 'name' => 'مدينة الشمال', 'name_en' => 'Madinat ash Shamal', 'lat_lng' => '26.116525, 51.215892']);
        Region::create(['city_id' => $city3->id, 'name' => 'مسيكة', 'name_en' => 'Mseke', 'lat_lng' => '25.960514, 51.097217']);


        // Regions for City => الوسيل (Lusail)
        Region::create(['city_id' => $city4->id, 'name' => 'الواجهة المائية', 'name_en' => 'Waterfront', 'lat_lng' => '25.351681, 51.522810']);
        Region::create(['city_id' => $city4->id, 'name' => 'فوكس هيلز', 'name_en' => 'Fox Hills', 'lat_lng' => '25.426004, 51.502532']);
        Region::create(['city_id' => $city4->id, 'name' => 'منطقة المارينا', 'name_en' => 'Marina District', 'lat_lng' => '25.372322, 51.539961']);
        Region::create(['city_id' => $city4->id, 'name' => 'جزر قطيفان', 'name_en' => 'Qtaifan Islands', 'lat_lng' => '25.432088, 51.523955']);


        // Regions for City => الوكرة (Al Wakra)
        Region::create(['city_id' => $city5->id, 'name' => 'الوكير', 'name_en' => 'Al Wukair', 'lat_lng' => '25.148484, 51.547542']);
        Region::create(['city_id' => $city5->id, 'name' => 'قرية بروة', 'name_en' => 'Barwa Village', 'lat_lng' => '25.211434, 51.580992']);
        Region::create(['city_id' => $city5->id, 'name' => 'المشاف', 'name_en' => 'Al Meshaf', 'lat_lng' => '25.176237, 51.563062']);
        Region::create(['city_id' => $city5->id, 'name' => 'جبل الوكرة', 'name_en' => 'Wakrah Hill', 'lat_lng' => '25.149255, 51.613523']);
        Region::create(['city_id' => $city5->id, 'name' => 'معيذر الوكير', 'name_en' => 'Muaither Wakra', 'lat_lng' => '25.125042, 51.532644']);
       

        // Regions for City => دخان (Dukhan)
        Region::create(['city_id' => $city6->id, 'name' => 'دخان', 'name_en' => 'Dukhan', 'lat_lng' => '25.427613, 50.783250']);
       

         // Regions for City => مسيعيد (Mesaieed)
         Region::create(['city_id' => $city7->id, 'name' => 'المنطقة الصناعية الجديدة', 'name_en' => 'New Industrial Area', 'lat_lng' => '25.079475, 51.476136']);
         Region::create(['city_id' => $city7->id, 'name' => 'بركة العوامر', 'name_en' => 'Umm Al Houl', 'lat_lng' => '25.074315, 51.490860']);
        
        // Regions for City => الشحانية (Ash Shaḩānīyah)
        Region::create(['city_id' => $city8->id, 'name' => 'الشحانية', 'name_en' => 'Ash Shaḩānīyah', 'lat_lng' => '25.36861, 51.22639']);

      }
}
