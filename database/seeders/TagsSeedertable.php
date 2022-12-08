<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeedertable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=[
            ['name_ar'=>'عباية','name_en'=>'Abaya'],
            ['name_ar'=>'محتشم','name_en'=>'modest'],
            ['name_ar'=>'يومي','name_en'=>'Casual'],
            ['name_ar'=>'فانسي','name_en'=>'Glamorous'],
            ['name_ar'=>'راقي','name_en'=>'Elegant'],
            ['name_ar'=>'فنتج','name_en'=>'Vintage'],
            ['name_ar'=>'أساسي','name_en'=>'Basics'],
            ['name_ar'=>'ملون','name_en'=>'Multicolors'],
            ['name_ar'=>'ساده','name_en'=>'plain'],
            ['name_ar'=>'هندسي','name_en'=>'Geometry'],

        ];
        foreach ($tags as $tag){
            Tag::create($tag);
        }
    }
}
