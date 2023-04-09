<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function setting() {
        return view('admin.settings', ['title' => trans('admin.settings')]);
    }
    public function setting_save() {
        // dd(request()->all());








        $data = $this->validate(request(), [
            // 'logo' => v_image(),
            // 'icon' => v_image(),
            'status'=>'',
            'description'=>'',
            'keyword'=>'',
            'main_lang'=>'',
            'message_maintenance'=>'',
            'email'=>'',
            'sitename_en'=>'',
            'sitename_ar'=>'',
            'delivery_inside'=>'',
            'delivery_outside'=>'',

            ], [],
            [
                'logo' => trans('admin.logo'),
                'icon' => trans('admin.icon'),
            ]);
        if (request()->has('logo')){

            $logo =setting()->logo;

            if ($image_path = Storage::disk('do_spaces')->exists($logo)) {
                Storage::disk('do_spaces')->delete($logo);
                $path = request()->logo->storePublicly('Setting/logo', 'do_spaces');

                Setting::where('id', setting()->id)->update(
                    ['logo' =>$path]
                );

                }else{
                    $dataImage = request()->logo->storePublicly('Setting/logo', 'do_spaces');



                    Setting::where('id', setting()->id)->update(
                    ['logo' =>$dataImage]
                );


                }
        }


        if (request()->has('icon')){
            $logo =setting()->icon;

            if ($image_path = Storage::disk('do_spaces')->exists($logo)) {
                Storage::disk('do_spaces')->delete($logo);
                $path = request()->icon->storePublicly('Setting/icon', 'do_spaces');

                Setting::where('id', setting()->id)->update(
                    ['logo' =>$path]
                );

                }else{
                    $dataImage = request()->icon->storePublicly('Setting/icon', 'do_spaces');



                    Setting::where('id', setting()->id)->update(
                    ['icon' =>$dataImage]
                );


                }
        }
        Setting::orderBy('id', 'desc')->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('settings'));
    }
}
