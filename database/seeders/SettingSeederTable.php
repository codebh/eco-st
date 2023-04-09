<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

            'sitename_ar'=>'تفصيل',
            'sitename_en'=>'Tafseel',
            'logo'=>'Setting/logo/cYwRmrhqEbc1KKIyMTeAfJ8WTIKfQZIJBPDgTRyR.png',
            'icon'=>'Setting/icon/QPeAR9zM5ZwcLVffzMkAlutK0igDYaCBgL69JSaw.png',
            'main_lang'=>'en',
            'status'=>'close',

        ]);
    }
}
