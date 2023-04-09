<?php

namespace App\Http\Livewire\Store;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditProductFull extends Component
{

    use LivewireAlert;
    public $post;
    public $colors;
    public $product;
    public $category_id;
    public $category_name_ar;
    public $category_name_en;
    public $content,$title,$price,$price_offer,$status,$show ,$color_id,$qty;


    protected $rules = [
        'content'     => 'required',
        'price'       => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'price_offer' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'status'      => 'required',
        'show'        => 'required',
        'color_id'    => 'required',
    ];





    public function mount($post){

        $this->title = $this->post->title;
        $this->product = $this->post;
        $this->product_id = $this->post->id;
        $this->category_id = $this->post->category_id;
        $this->category_name_ar = $this->post->category->name_ar;
        $this->category_name_en = $this->post->category->name_en;
        if ($this->category_id == 1 or $this->category_id == 2) {
            $this->qty =$this->post->qty;
        }

        $this->content = $this->post->content;
        $this->price = $this->post->price;
        $this->price_offer = $this->post->price_offer;
        $this->status = $this->post->status;
        $this->show = $this->post->show;
        $this->colors = Color::all();
        $this->color_id =$this->post->color_id;


    }
     public function submit(){

        //  dd(request()->all());

         $this->validate();

            $product = Product::find($this->product_id);
            $product->content = $this->content;
            $product->price = $this->price;
            $product->price_offer = $this->price_offer;
            $product->status = $this->status;
            $product->show = $this->show;
            $product->color_id = $this->color_id;


        if ($this->category_id == 1 or $this->category_id == 2) {

            $product->qty =$this->qty;
        }
            $product->save();

            $this->alert('success', trans('shop.uploaded_successfully'), [
                'position' => session('lang')=='ar'? 'top-start':'top-end',
                'timer' => 4000,
                'toast' => true,
                'text' => '',
                'confirmButtonText' => 'Ok',
                'cancelButtonText' => 'Cancel',
                'showCancelButton' => false,
                'showConfirmButton' => false,
            ]);
            // $this->mount($this->post);
            // $this->render();

     }

    public function render()
    {
        return view('livewire.store.edit-product-full');
    }
}
