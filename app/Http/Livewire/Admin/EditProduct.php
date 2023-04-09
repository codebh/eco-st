<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeData;
use FontLib\Table\Type\post;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EditProduct extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    public $showModal = false;
    public $productId;
    public  $product;

    protected $rules = [
        'product.size_data' => 'required',
        'product.size_qty' => 'required|numeric',
    ];

    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product = SizeData::find($productId);
    }
    public function create()
    {
        $this->showModal = true;
        $this->product = null;
        $this->productId = null;
    }
    public function save_up()
    {


        if (!is_null($this->productId)) {
            $this->validate();
            // $this->product->save();

            if (SizeData::where('product_id',$this->product_id)->where('size_data',$this->product['size_data'])->where('size_qty',$this->product['size_qty'])->exists()) {

                $this->alert('error', trans('shop.size_availabe'), [
                    'position' => session('lang')=='ar'? 'top-start':'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'confirmButtonText' => 'Ok',
                    'cancelButtonText' => 'Cancel',
                    'showCancelButton' => false,
                    'showConfirmButton' => false,
                ]);



                }else{
                    // dd(request()->all());

                // $new_size = SizeData::find($this->product_id);
                // // dd( $this->product['size_qty']);
                // // $new_size->product_id = $this->product_id;
                // $new_size->size_data = $this->product['size_data'];
                // $new_size->size_qty = $this->product['size_qty'];
                // $new_size->save();
                SizeData::where('id', $this->productId)->update([
                    'size_data'=>$this->product['size_data'],
                    'size_qty'=>$this->product['size_qty'],
                ]);

                $this->alert('success', trans('shop.uploaded_successfully'), [
                    'position' => session('lang')=='ar'? 'top-start':'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'confirmButtonText' => 'Ok',
                    'cancelButtonText' => 'Cancel',
                    'showCancelButton' => false,
                    'showConfirmButton' => false,
                ]);



                }
        } else {

            $this->validate();

            // $user = SizeData::where('product_id',$this->product_id)->where('size_data',$this->product['size_data'])->exists();


               if (SizeData::where('product_id',$this->product_id)->where('size_data',$this->product['size_data'])->exists()) {
                $this->alert('error', trans('shop.size_availabe'), [
                    'position' => session('lang')=='ar'? 'top-start':'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'confirmButtonText' => 'Ok',
                    'cancelButtonText' => 'Cancel',
                    'showCancelButton' => false,
                    'showConfirmButton' => false,
                ]);



                }else{

                $new_size = new SizeData();
                // dd( $this->product['size_qty']);
                $new_size->product_id = $this->product_id;
                $new_size->size_data = $this->product['size_data'];
                $new_size->size_qty = $this->product['size_qty'];
                $new_size->save();
                $this->alert('success', trans('shop.uploaded_successfully'), [
                    'position' => session('lang')=='ar'? 'top-start':'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'text' => '',
                    'confirmButtonText' => 'Ok',
                    'cancelButtonText' => 'Cancel',
                    'showCancelButton' => false,
                    'showConfirmButton' => false,
                ]);



                }

        }
        $this->showModal = false;
    }
    public function close()
    {
        $this->showModal = false;
    }
    public function delete($productId)
    {
        $product = SizeData::find($productId);
        if ($product) {

                $sizes_products = SizeData::where('product_id',$this->product_id)->get();
                // dd($sizes_products);

                if (count($sizes_products) > 1) {

                    $product->delete();

                    $this->alert('success', trans('shop.uploaded_successfully'), [
                        'position' => session('lang')=='ar'? 'top-start':'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'text' => '',
                        'confirmButtonText' => 'Ok',
                        'cancelButtonText' => 'Cancel',
                        'showCancelButton' => false,
                        'showConfirmButton' => false,
                    ]);
                }else{
                    $this->alert('error', trans('shop.size_delete'), [
                        'position' => session('lang')=='ar'? 'top-start':'top-end',
                        'timer' => 3000,
                        'toast' => true,
                        'text' => '',
                        'confirmButtonText' => 'Ok',
                        'cancelButtonText' => 'Cancel',
                        'showCancelButton' => false,
                        'showConfirmButton' => false,
                    ]);

                }


        }
    }

    public $post;
    public $product_id;
    public $size_chart;
    public $image_size;



    public $size_id;


    public $sizes;
    public $size =[];
    public $size_qty =[];


    public $category_master;

    public $size_data ;

    public function update(){



        Validator::make(
            ['image_size' => $this->image_size],
            ['image_size' => 'required'],
            ['image_size.required' => trans('shop.required')],
            )->validate();

            // dd(request()->all());

        $dataImage =$this->image_size->storePublicly('products/SizeChart', 'do_spaces');
        //   dd($dataImage);

          Product::where('id', $this->product_id)->update(
              ['size_chart' =>$dataImage]
          );
          $this->alert('success', trans('shop.uploaded_successfully'), [
            'position' => session('lang')=='ar'? 'top-start':'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => false,
            'showConfirmButton' => false,
        ]);

            $this->mount($this->post);
            $this->render();


            return redirect()->to('admin/products');




    }
    public function mount($post){





        $this->product_id = $post->id;

        $this->size_data = SizeData::where('product_id',$post->id)->get();
        $this->sizes = Size::all();
        $this->category_master =$this->post->category_id;
        $this->size_chart =$this->post->size_chart;



    }



    public function render()
    {
        // return view('livewire.admin.edit-product');

        return view('livewire.admin.edit-product', [
            'products' => SizeData::where('product_id',$this->post->id)->paginate(5)
        ]);
    }
}
