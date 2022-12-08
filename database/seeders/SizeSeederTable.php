<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes=[
            ['name'=>'XS'],
            ['name'=>'S'],
            ['name'=>'M'],
            ['name'=>'L'],
            ['name'=>'XL'],
            ['name'=>'2XL'],
            ['name'=>'3XL'],
            ['name'=>'4XL'],
            ['name'=>'Free Size'],

        ];
        foreach ($sizes as $size){
            Size::create($size);
        }
    }
}
