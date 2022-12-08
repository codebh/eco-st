<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors=[
            ['name_ar'=>'عباية','name_en'=>'abaya','image'=>'categories/abaya.png'],
            ['name_ar'=>'شيلة','name_en'=>'shailah','image'=>'categories/shailah2.png'],
            ['name_ar'=>'فستان','name_en'=>'dress','image'=>'categories/dress.jpg'],
            ['name_ar'=>'جلابية','name_en'=>'jalabia','image'=>'categories/jalabia.png'],
            ['name_ar'=>'طقم','name_en'=>'set','image'=>'categories/set.png'],
            ['name_ar'=>'لباس رسمي','name_en'=>'uniform','image'=>'categories/uniform.png'],
            ['name_ar'=>'تنانير وبنطلونات','name_en'=>'skirts and pants','image'=>'categories/pants_and_skirts.png'],
            ['name_ar'=>' بلايزر و كارديغان','name_en'=>'blazer and cardigen','image'=>'categories/cardigen.png'],
            ['name_ar'=>'توب','name_en'=>'top','image'=>'categories/top.png'],
            ['name_ar'=>'قطع اخرى','name_en'=>'others','image'=>'categories/others.png'],

        ];
        foreach ($colors as $color){
            Category::create($color);
        }
    }
}
