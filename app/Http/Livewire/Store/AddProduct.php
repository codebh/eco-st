<?php

namespace App\Http\Livewire\Store;

use App\Mail\Store\ProductToAdmin;
use App\Models\Color;
use App\Models\ImageData;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeData;
use App\Models\Tag;
use App\Models\TagData;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

use Livewire\WithFileUploads;


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
        //  dd($this->category_id );
        // $this->emit('setCategoriesSelect', []);
        // $this->emit('setSizeSelect', []);

        // if ($this->category_id == 1) {
        //     $this->validate([
        //         'content' => 'required',
        //         'store_id' => 'required|numeric',
        //         'category_id' => 'required|numeric',
        //         'qty' => 'required|max:20|numeric',
        //         'include_shailah' => 'required',
        //         'price' => 'required|numeric',
        //         'price_offer' => 'sometimes|nullable|numeric',
        //         'status' => 'sometimes|nullable|in:not active,active',
        //         'color' => 'required',
        //         'main_image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
        //         'input_image.*' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
        //         ], [], [

        //         'content' => trans('shop.product_content'),
        //         'store_id' => trans('admin.shop_id'),
        //         'price' => trans('admin.price'),
        //         'price_offer' => trans('admin.price_offer'),
        //         'status' => trans('admin.status'),
        //         'main_image' => trans('shop.main_image'),
        //         'include_shailah' => trans('shop.with_shailah'),


        //     ]);
        // } elseif ($this->category_id == 2) {
        //     $this->validate([
        //         'content' => 'required',
        //         'store_id' => 'required|numeric',
        //         'category_id' => 'required',
        //         'price' => 'required|numeric',
        //         'price_offer' => 'sometimes|nullable|numeric',
        //         'status' => 'sometimes|nullable|in:not active,active',
        //         'qty' => 'required|max:20|numeric',
        //         'color' => 'required',
        //         'main_image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
        //         'input_image.*' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',

        //     ], [], [
        //         'content' => trans('shop.product_content'),
        //         'store_id' => trans('admin.shop_id'),
        //         'category_id' => trans('admin.category_id'),
        //         'price' => trans('admin.price'),
        //         'price_offer' => trans('admin.price_offer'),
        //         'status' => trans('admin.status'),
        //         'main_image' => trans('shop.main_image'),
        //     ]);
        // } else {
        //     $this->validate([
        //         'content' => 'required',
        //         'store_id' => 'required|numeric',
        //         'category_id' => 'required',
        //         'color' => 'required|numeric',
        //         'price' => 'required|numeric',
        //         'price_offer' => 'sometimes|nullable|numeric',
        //         'status' => 'required|in:not active,active',
        //         'size_chart' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        //         'main_image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
        //         'input_image.*' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',

        //     ], [], [
        //         'content' => trans('shop.product_content'),
        //         'store_id' => trans('admin.shop_id'),
        //         'category_id' => trans('admin.category_id'),
        //         'price' => trans('admin.price'),
        //         'price_offer' => trans('admin.price_offer'),
        //         'status' => trans('admin.status'),
        //         'show' => trans('shop.show'),
        //         'size_chart' => trans('shop.size_guide'),
        //         'main_image' => trans('shop.main_image'),
        //     ]);
        // }



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

            // $image_path_main = $request->file('main_image');
            // $extenstion = $request-> file('main_image')->extension();
            // $path = Storage::disk('do_spaces')->putFileAs('products/mainImage',$image_path_main,time().'.'.$extenstion,'public');
            $path = $this->main_image->storePublicly('products/mainImage', 'do_spaces');
            // dd($path);
            $product->main_image = $path;

        }

        $product->save();







        if ($this->input_image !== null) {
            foreach ($this->input_image as $photo) {
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

        $produt_mail = Product::find($product->id);

        Mail::queue(new ProductToAdmin($produt_mail));

        session()->flash('success_message', trans('shop.save'));


    }
    public function render()
    {
        return view('livewire.store.add-product');
    }








}
