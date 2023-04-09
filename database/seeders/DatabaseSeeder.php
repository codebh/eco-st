<?php

namespace Database\Seeders;


use App\Models\Product;
use App\Models\Store;
use Database\Factories\ShopFactory;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(SettingSeederTable::class);


        $this->call(StoreSeederTable::class);
        $this->call(ColorSeederTable::class);
        $this->call(SizeSeederTable::class);
        $this->call(CategorySeederTable::class);
        $this->call(TagsSeedertable::class);
        $this->call(BlogTableSeedeer::class);
//      Product::factory(10)->create();
    }
}
