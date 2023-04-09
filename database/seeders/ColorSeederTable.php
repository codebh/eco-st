<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors=[
            ['name_ar'=>'أسود','name_en'=>'Black','color'=>'#000000'],
            ['name_ar'=>'رمادي','name_en'=>'Gray ','color'=>'#808080'],
            ['name_ar'=>'فضي','name_en'=>'Silver','color'=>'#C0C0C0'],
            ['name_ar'=>'كحلي','name_en'=>'Navy','color'=>'#000080'],
            ['name_ar'=>'أزرق','name_en'=>'Blue','color'=>'#2B65EC'],
            ['name_ar'=>'فيروزي','name_en'=>'Turquoise','color'=>'#40E0D0'],
            ['name_ar'=>'زيتي','name_en'=>'Olive','color'=>'#808000'],
            ['name_ar'=>'أخضر','name_en'=>'Green','color'=>'#008000'],
            ['name_ar'=>'كريم','name_en'=>'Cream','color'=>'#FFFFCC'],
            ['name_ar'=>'بيج','name_en'=>'Beige','color'=>'#F5F5DC'],
            ['name_ar'=>'بطيخي','name_en'=>'Peach','color'=>'#FFE5B4'],
            ['name_ar'=>'كاكي','name_en'=>'Khaki','color'=>'#F0E68C'],
            ['name_ar'=>'أصفر','name_en'=>'Yellow','color'=>'#FFFF00'],
            ['name_ar'=>'ذهبي','name_en'=>'Gold','color'=>'#FFD700'],
            ['name_ar'=>'برتقالي','name_en'=>'Orange','color'=>'#FFA500'],
            ['name_ar'=>'بني','name_en'=>'Brown','color'=>'#835C3B'],
            ['name_ar'=>'أحمر','name_en'=>'Red','color'=>'#FF0000'],
            ['name_ar'=>'ماروني','name_en'=>'Maroon','color'=>'#800000'],
            ['name_ar'=>'وردي','name_en'=>'Pink','color'=>'#F660AB'],
            ['name_ar'=>'بنفسجي','name_en'=>'Purple','color'=>'#A74AC7'],
            ['name_ar'=>'أبيض مطفي','name_en'=>'Off White','color'=>'#F8F0E3'],
            ['name_ar'=>'أبيض','name_en'=>'White','color'=>'#FFFFFF'],
        ];
        foreach ($colors as $color){
            Color::create($color);
        }
    }
}
