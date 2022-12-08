<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditMainImageProduct extends Component
{
    use WithFileUploads;
    use LivewireAlert;


    public $post;
    public $main_image;
    public $image ;


    protected $rules = [
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',

    ];
    public function mount($post){
        $this->product_id = $this->post->id;
        $this->main_image = $this->post->main_image;


    }
    private function resetInput()
        {
            $this->image = null;
        }

        public function update()
        {

            $this->validate();

            if ($this->product_id) {

                             $record = Product::find($this->product_id);

                             if ($image_path = Storage::disk('do_spaces')->exists($this->main_image)) {
                                    Storage::disk('do_spaces')->delete($this->main_image);
                                    $path = $this->image->storePublicly('products/mainImage', 'do_spaces');
                                    Product::where('id', $this->product_id)->update(
                                        ['main_image' =>$path]
                                    );
                            }else{
                              $dataImage =$this->image->storePublicly('products/mainImage', 'do_spaces');


                              Product::where('id', $this->product_id)->update(
                                  ['main_image' =>$dataImage]
                              );


                            }

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
                $this->resetInput();

            }

            return redirect()->to('/admin/products');

        }

    public function render()
    {
        return view('livewire.admin.edit-main-image-product');
    }
}
