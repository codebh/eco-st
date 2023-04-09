<?php

namespace App\Http\Livewire\Store;

use App\Mail\Store\ProductToAdmin;
use App\Models\Color;
use App\Models\ImageData;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeData;
use App\Models\SizeAbaya;
use App\Models\Tag;
use App\Models\TagData;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

use Livewire\WithFileUploads;
use Image;

class AddProduct extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $currentStep = 1;
    public $maxStep = 1;



    public $selectGroup;
    public $selected = [];





    public $category_master;
    public $category_id;
    public $category_name_ar;
    public $category_name_en;
    public $photoStatus;
    public $photoStatus2;
    public $photoStatus3;
    public $photoStatusImages;

    public
    $content,
    $title,
    $store_id,
    $store_name,
    $qty,
    $include_shailah,

    $status,
    $show,
    $color,
    $size_chart,
    $main_image,
    $tags_more,
    $input_image=[];
    public $colors;
    public    $price;
    public $price_offer;
    public $produt_mail;


    public $tags;
    public $tag;
    public $size=[], $size_qty=[''];
    public $sizes_abaya=[];



    protected $stepRules = [
        1 => [
            'main_image' => 'required',



        ],
        2 => [
            'content' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'price_offer' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'status' => 'required',
            'color' => 'required',
            // 'tag' => 'required',
            // 'main_image' => 'required',
        ],
        3 => [
            'show' => 'sometimes',
            'show' => 'sometimes',
        ]
        ];

        public function messages()
        {
            return [
                'main_image.required' => trans('shop.required'),
                'content.required' => trans('shop.required'),
                'price.required' => trans('shop.required'),
                'price_offer.required' => trans('shop.required'),
                'status.required' => trans('shop.required'),
                'color.required' => trans('shop.required'),

            ];
        }


    public function changeStep($step)
    {
        if ($this->maxStep < $step) {
            return;
        }

        $this->currentStep = $step;
    }

    public function nextStep()
    {
        // dd(request()->all());
        if (in_array($this->currentStep, array_keys($this->stepRules))) {
            $this->validate($this->stepRules[$this->currentStep]);
        }

        if ($this->currentStep >= 3) {
            // $this->price = $this->adults * 100 + $this->children * 75;
            // return;
            // dd(request()->all());
            $this->save();
            return $this->redirect(route('product.pending'));

        }

        $this->currentStep = $this->currentStep + 1;
        $this->maxStep = max($this->maxStep, $this->currentStep);

    }


    public $templates = [];
    public $all_templates;
    public $questions = [''];

    public $saved = FALSE;

    public function addQuestion()
    {
        $this->questions[] = '';
    }

    public function removeQuestion($index)
    {
        // dd($index);
        // // if()
        unset($this->size[$index]);
        unset($this->size_qty[$index]);

        unset($this->questions[$index]);
        $this->questions = array_values($this->questions);
    }

    public function updated($key, $value)
    {
        $this->saved = FALSE;

        $parts = explode(".", $key);
        if (count($parts) == 2 && $parts[0] == "templates") {
            $question = $this->all_templates->where('id', $value)->first()->text;
            if ($question) {
                $this->questions[$parts[1]] = $question;
            }
        }
    }




    public function mount($category_master){
        $this->category_id = $category_master->id;
        $this->category_name_ar = $category_master->name_ar;
        $this->category_name_en = $category_master->name_en;
        $this->store_id = shop()->user()->id;
        $this->store_name = shop()->user()->name;
        $this->tags = Tag::all();

        $this->countries = Tag::all();
        $this->colors = Color::all();
        $this->all_templates = Size::all();

    }
    // protected $rules = [
    //     'tag' => 'required',

    // ];
    public function save()
    {
        // dd(request()->all());


        if ($this->category_id == 1   ) {
            Validator::make(
                ['qty' => $this->qty],
                ['qty' => 'required'],
                ['qty.required' => trans('shop.required')],


            )->validate();
            Validator::make(
                ['include_shailah' => $this->include_shailah],
                ['include_shailah' => 'required'],
                ['include_shailah.required' => trans('shop.required')],
                // ['required' => 'The :attribute field is required'],


            )->validate();


        }elseif ($this->category_id == 2){
            Validator::make(
                ['qty' => $this->qty],
                ['qty' => 'required'],
                ['qty.required' => trans('shop.required')],


            )->validate();

        }else{
            Validator::make(
                ['size_chart' => $this->size_chart],
                ['size_chart' => 'required'],
                ['size_chart.required' => trans('shop.required')],

            )->validate();

            Validator::make(
                ['size' => $this->size],
                ['size' => 'required'],
                ['size.required' => trans('shop.required')],

            )->validate();

            Validator::make(
                ['size_qty' => $this->size_qty],
                ['size_qty' => 'required'],
                ['size_qty.required' => trans('shop.required')],

            )->validate();


        }
// dd(request()->all());
        $product = new Product();
        $product->content = $this->content;
        $product->store_id = shop()->user()->id;
        $product->category_id = $this->category_id;
        $product->color_id = $this->color;
        $product->price = $this->price;
        $product->price_offer = $this->price_offer;
        $product->status = $this->status;
        $product->show = 'pending';
//         this for abaya anad shela qty
        if ($this->qty !== null ) {
            $product->qty = $this->qty;
        }
//        only for abaya category
        if ($this->include_shailah !== null ) {
            $product->include_shailah = $this->include_shailah;
        }
//        all categories with out  abaya & shila
        if ($this->size_chart !== null ) {

            // $photo_name_size = rand() . '.' . $request->file('size_chart')->getClientOriginalExtension();
            // $image_path = $request->file('size_chart');
            // $extenstion = $request-> file('size_chart')->extension();
            // $path = Storage::disk('do_spaces')->putFileAs('products/SizeChart',$image_path,time().'.'.$extenstion,'public');
            // $product->size_chart = $path;

            $path = $this->size_chart->storePublicly('products/SizeChart', 'do_spaces');
            $product->size_chart = $path;



        }

        if ($this->main_image !== null) {

            $path = $this->main_image->storePublicly('products/mainImage', 'do_spaces');

            $product->main_image = $path;



// 600 to 800

            //     $imgFile = Image::make($this->main_image->getRealPath());
            //     $imgFile->resize(600, 800);
            //     $imgFile->stream();

            // Storage::disk('do_spaces')->put('products/mainImage/'.$imgFile->basename, $imgFile->__toString(),'public');
            // $product->main_image = 'products/mainImage/'.$imgFile->basename;

        }

        $product->save();







        if ($this->input_image !== null) {
            foreach ($this->input_image as $photo) {
                // 600 to 800 image resize
            //     $imgFile = Image::make($photo->getRealPath());
            //     $imgFile->resize(600, 800);
            //     $imgFile->stream();
            // Storage::disk('do_spaces')->put('products/'.$product->id.'/'.$imgFile->basename, $imgFile->__toString(),'public');
            //     // $path = $photo->storePublicly('products/'.$product->id, 'do_spaces');
            //     $image_path = new ImageData();
            //     $image_path->product_id = $product->id;
            //     $image_path->image_key = 'products/'.$product->id.'/'.$imgFile->basename;
            //     $image_path->save();


            $path = $photo->storePublicly('products/'.$product->id, 'do_spaces');
            $image_path = new ImageData();
            $image_path->product_id = $product->id;
            $image_path->image_key = $path;
            $image_path->save();

                 }
        }


        if ($this->tag !== null) {
            foreach ($this->tag as $key) {
                TagData::create([
                    'product_id' => $product->id,
                    'tag_id' => $key,
                ]);
            }
        }
        if ($this->size !== null && $this->size_qty!== null) {
            if (count($this->size) > 0) {
                foreach ($this->size as $item => $v) {
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_data' => $this->size[$item],
                        'size_qty' => $this->size_qty[$item],
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                    SizeData::insert($data2);
                }
            }
        }

        if ($this->sizes_abaya !== null) {
            if (count($this->sizes_abaya) > 0) {
                foreach ($this->sizes_abaya as $item => $v) {
                    // dd($v);
                    if($v == 'a_size1'){
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_abaya' => $v,
                        'img_abaya'=>'img/size/abaya-1.png',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                }
                else if($v == 'a_size2'){
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_abaya' => $v,
                        'img_abaya'=>'img/size/abaya-2.png',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                }
                else if($v == 'a_size3'){
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_abaya' => $v,
                        'img_abaya'=>'img/size/abaya-3.png',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                }
                else if($v == 'a_size4'){
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_abaya' => $v,
                        'img_abaya'=>'img/size/abaya-4.png',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                }
                else if($v == 'a_size5'){
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_abaya' => $v,
                        'img_abaya'=>'img/size/abaya-5.png',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                }
                else if($v == 'a_size6'){
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_abaya' => $v,
                        'img_abaya'=>'img/size/abaya-6.png',
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                }

                    SizeAbaya::insert($data2);
                }
            }
        }




        $produt_mail = Product::find($product->id);

        Mail::queue(new ProductToAdmin($produt_mail));

        session()->flash('success_message', trans('shop.save'));


    }
    public function render()
    {
        return view('livewire.store.add-product');
    }








}
