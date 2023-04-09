<?php

namespace App\Http\Livewire\Admin;

use App\Models\ImageData;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditOtherImageProduct extends Component
{

    use WithFileUploads;
    use LivewireAlert;

    public $post;
    public $image;
    public $product_id;
    public $other_images;
    public $photoStatusImages;
    public $miofile=[];

    public $images=[];

    protected $rules = [
        'images.*' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',

    ];

    public function mount($post){
        $this->product_id = $this->post->id;
        $this->other_images = $this->post->image_data()->get();

    }
    public function updatedImages()
    {
        $this->validate();

        foreach ($this->images as $photo) {
            $path = $photo->storePublicly('products/'.$this->product_id, 'do_spaces');
            $image_path = new ImageData();
            $image_path->product_id = $this->product_id;
            $image_path->image_key = $path;
            $image_path->save();
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
    $this->mount($this->post);
    $this->render();
    }
    public function delete_image($id){



        $data = ImageData::where('id', $id)->firstOrFail();


        if ($image_path = Storage::disk('do_spaces')->exists($data->image_key)) {

            Storage::disk('do_spaces')->delete($data->image_key);

        }
        $data->delete($id);

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

    }
    public function render()
    {
        return view('livewire.admin.edit-other-image-product');
    }
}
