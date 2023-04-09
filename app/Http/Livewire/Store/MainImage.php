<?php

namespace App\Http\Livewire\Store;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class MainImage extends Component
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
        // public function updatedImage(){

        //     $this->main_image = $this->post->main_image;
        //     $this->mount($this->post);
        //     $this->render();

        // }
        private function resetInput()
        {
            $this->image = null;
            // $this->email = null;
        }

        public function update()
        {

            // dd(request()->all());
            $this->validate();
            // $this->validate([
            //     'product_id' => 'required|numeric',
            //     'image' => 'required|min:5',

            // ]);
            if ($this->product_id) {
                // dd($this->product_id);

                             $record = Product::find($this->product_id);

                             if ($image_path = Storage::disk('do_spaces')->exists($this->main_image)) {
                                    Storage::disk('do_spaces')->delete($this->main_image);
                                    $path = $this->image->storePublicly('products/mainImage', 'do_spaces');
                                    Product::where('id', $this->product_id)->update(
                                        ['main_image' =>$path]
                                    );
                            }else{
                              $dataImage =$this->image->storePublicly('products/mainImage', 'do_spaces');
                            //   dd($dataImage);

                              Product::where('id', $this->product_id)->update(
                                  ['main_image' =>$dataImage]
                              );

                            //   $record->update([
                            //     'main_image' =>$dataImage
                            //     ]);
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
        // $this->mount($this->post);
        // $this->render();

                $this->resetInput();

                // $this->updateMode = false;
            }

            return redirect()->to('/store/showShop');

        }
        // public function updatedImages()
        // {
        //     // $this->validate();

        //     // if ($this->main_image !== null) {

        //     //     // $image_path_main = $request->file('main_image');
        //     //     // $extenstion = $request-> file('main_image')->extension();
        //     //     // $path = Storage::disk('do_spaces')->putFileAs('products/mainImage',$image_path_main,time().'.'.$extenstion,'public');

        //     //     // dd($path);
        //     //     $product->main_image = $path;

        //     // }


        //     dd(request()->all());

        //     if ($this->image !== null) {
        //         // dd($this->image);

        //         $product = Product::where('id', $this->product_id)->first();
        //         // dd($product->main_image);

        //
        //         // dd($image_path);





        // }else{
        //     dd('empty image');
        // }






        //     // foreach ($this->images as $photo) {
        //     //     $path = $photo->storePublicly('products/'.$this->product_id, 'do_spaces');
        //     //     $image_path = new ImageData();
        //     //     $image_path->product_id = $this->product_id;
        //     //     $image_path->image_key = $path;
        //     //     $image_path->save();
        //     //      }




        // $this->alert('success', trans('user.cart_add_product'), [
        //     'position' => session('lang')=='ar'? 'top-start':'top-end',
        //     'timer' => 3000,
        //     'toast' => true,
        //     'text' => '',
        //     'confirmButtonText' => 'Ok',
        //     'cancelButtonText' => 'Cancel',
        //     'showCancelButton' => false,
        //     'showConfirmButton' => false,
        // ]);
        // $this->mount($this->post);
        // $this->render();
        //     // here you can store immediately on any change of the property
        // }


    public function render()
    {
        return view('livewire.store.main-image');
    }
}
