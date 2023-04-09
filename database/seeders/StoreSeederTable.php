<?php

namespace Database\Seeders;

use App\Models\Store;
use Database\Factories\ShopFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StoreSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         Store::factory()->count(30)->create();
       $shops=[
           ['name'=>'shop',  'code'=>'shop0', 'email'=>'shop@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
           ['name'=>'shop1', 'code'=>'shop1', 'email'=>'shop1@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
           ['name'=>'shop2', 'code'=>'shop2', 'email'=>'shop2@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
           ['name'=>'shop3', 'code'=>'shop3', 'email'=>'shop3@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
           ['name'=>'shop4', 'code'=>'shop4', 'email'=>'shop4@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
            ['name'=>'shop5','code'=>'shop5', 'email'=>'shop5@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
            ['name'=>'shop6','code'=>'shop6', 'email'=>'shop6@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
            ['name'=>'shop7','code'=>'shop7', 'email'=>'shop7@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011'],
            ['name'=>'shop8','code'=>'shop8', 'email'=>'shop8@shop.com', 'password'=>Hash::make('33626604'),'logo'=>'logo011']

        ];
        foreach ($shops as $shop){
            Store::create($shop);
        }
    }
}
