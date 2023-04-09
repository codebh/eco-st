<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\StoresDatatables;
use App\Http\Controllers\Controller;
use App\Mail\Admin\StoreCreate;
use App\Models\Product;
use App\Models\Store;
use AWS\CRT\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Log as FacadesLog;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StoresDatatables $shop)
    {
        return $shop->render('admin.stores.index',['title'=> trans('admin.shops')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stores.create',['title'=>trans('admin.create_shops')]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:stores',
            'password'=>'required|min:6',
            'code'=>'required',
            'f_name'=>'required',
            'l_name'=>'required',
            'mobile'=>'required',
            'cpr'=>'required',
            'cr'=>'required',
            'iban'=>'required',
            'percentage'=>'required',
            'logo'=>'required|dimensions:ratio=1/1',
            'i_account'=>'sometimes',
            'address'=>'sometimes',
        ],[],[
            'name'=>trans('admin.name'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password')
        ]);

        // $data['password']= bcrypt(request('password'));






        // Store::create($data);
        if ($request->has('logo')) {
            // $file=$request->file('logo');
            $image_path_main = $request->file('logo');
            $extenstion = $request->file('logo')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('shops/logos',$image_path_main,time().'.'.$extenstion,'public');

        }
        $store = new Store();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = bcrypt(request('password'));
        $store->code = $request->code;
        $store->f_name = $request->f_name;
        $store->l_name = $request->l_name;
        $store->mobile = $request->mobile;
        $store->cpr = $request->cpr;
        $store->cr = $request->cr;
        $store->iban = $request->iban;
        $store->percentage = $request->percentage;
        $store->i_account = $request->i_account;
        $store->address = $request->address;
        $store->logo = $path;

        $store->save();
        Mail::queue(new StoreCreate($store));


        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('stores'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Store::find($id);
        $title = trans('admin.edit');
        return view('admin.stores.edit',compact('shop','title'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
         $this->validate($request,[
            'name'=>'required',
            // 'email'=>'required|email|unique:stores',
            'password'=>'required|min:6',
            'code'=>'required',
            'f_name'=>'required',
            'l_name'=>'required',
            'mobile'=>'required',
            'cpr'=>'required',
            'cr'=>'required',
            'iban'=>'required',
            'new'=>'required',
            'percentage'=>'required',
            'i_account'=>'sometimes',
            'address'=>'sometimes',
        ],[],[
            'name'=>trans('admin.name'),
            // 'email'=>trans('admin.email'),
            'password'=>trans('admin.password')
        ]);


        $shop = Store::findOrFail($id);
        $shop->name =   $request->name;
        // $shop->slug = $request->replicate();
        $shop->slug = SlugService::createSlug(Store::class, 'slug', $request->name);

        if ($request->email !== null)

        {
            $this->validate($request,[
                'email'=>'required|email|unique:stores',
            ],[],[
                'email'=>trans('admin.email'),
            ]);
            $shop->email =  $request->email;
        }

        $shop->password =   bcrypt(request('password'));
        $shop->code =   $request->code;
        $shop->f_name =     $request->f_name;
        $shop->l_name =     $request->l_name;
        $shop->mobile =     $request->mobile;
        $shop->cpr =    $request->cpr;
        $shop->cr =     $request->cr;
        $shop->iban =   $request->iban;
        $shop->new =   $request->new;
        $shop->percentage =     $request->percentage;
        $shop->i_account =  $request->i_account;
        $shop->address =    $request->address;

        // $main = Store::findOrFail($id);

        if (request()->has('logo')) {
            $this->validate($request, [
                'logo' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=1/1',
            ]);

        if ($image_path = Storage::disk('do_spaces')->exists($shop->logo)) {

            Storage::disk('do_spaces')->delete($shop->logo);
            $image_path = $request->file('logo');
            $extenstion = $request-> file('logo')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('shops/logos',$image_path,time().'.'.$extenstion,'public');
            $shop->logo =   $path;

        }else{

            $image_path = $request->file('logo');
            $extenstion = $request-> file('logo')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('shops/logos',$image_path,time().'.'.$extenstion,'public');
            $shop->logo =   $path;

        }
    }
        $shop->save();


        // $data['password']=

        // Store::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('stores'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities= Store::find($id);

        if ($image_path = Storage::disk('do_spaces')->exists($cities->logo)) {

            Storage::disk('do_spaces')->delete($cities->logo);
        }
        $cities->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('stores'));
    }
    public function multi_delete(){

        if (is_array(request('item'))){
//            Shop::destroy(request('item'));
            foreach (request('item') as $id){
                $cities= Store::find($id);
                Storage::delete($cities->logo);
                $cities->delete();
            }



        }else{
//            Shop::find(request('item'))->delete();
            $cities= Store::find(request('item'));
            Storage::delete($cities->logo);
            $cities->delete();
        }
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('stores'));
    }

    public function update_close(Request $request,$id){
            // dd($id);
            // dd($request->all());


            if($request->close == 1){
                $this->validate($request,[
                    'date_of_end'=>'required',
                    'close'      =>'required',
                    'reason'     =>'required',
                ]);

                $store= Store::findOrFail($id);
                $store->date_of_end=$request->date_of_end;
                $store->close=$request->close;
                $store->reason=$request->reason;
                $store->save();
            }elseif($request->close == 0){
                $this->validate($request,[

                    'close'      =>'required',

                ]);

                $store= Store::findOrFail($id);

                $store->close=$request->close;

                $store->save();

            }
            return redirect()->back();


    }

    public function update_password()
    {
        // dd('faisal');



        try{
            $store = Store::all();
            foreach($store as $item){
                Store::where('id', $item->id)->update(['password' =>$item->password]);
                     FacadesLog::alert('update shop'.$item->name);
            }
            // dd('done');

        } catch (CardErrorException $e) {
                       dd('not work');

        }

        return redirect()->back()->with('success_message','update all password for stores');

    }

}
