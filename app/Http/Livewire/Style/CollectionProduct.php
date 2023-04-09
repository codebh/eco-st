<?php

namespace App\Http\Livewire\Style;

use App\Models\Product;
use App\Models\Tag;
use App\Models\TagData;
use Livewire\Component;
use Livewire\WithPagination;

class CollectionProduct extends Component
{
use WithPagination;
    public $collection_name;
    public $product;


    public function mount($collection_name)
    {
        // dd(collection_name);

        $this->collection_name = $collection_name;

        $tag = Tag::where('slug',$this->collection_name)->first();

        $products=TagData::where('tag_id',$tag->id);

        // $producOrder=Product::where('')




    }


    public $orderSelect;

    public $orderBy = [
        'key' => 'created_at',
        'direction' => 'desc'
    ];
    public function updatedOrderSelect($value){
        $this->orderBy = json_decode($this->orderSelect, true);
    }


    public function render()
    {
        // $collections = TagData::where('tag_id', $this->collection_id)->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
        $tag = Tag::where('slug',$this->collection_name)->first();
        $collections = TagData::where('tag_id', $tag->id)->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(8);
// dd($this->collections);
        //  $products = $this->collections;
        //  $products ->
// $collections=Product::orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(6);

// $collections =  $this->collections->where('product_id','1');
        return view('livewire.style.collection-product',[
        'collections'=>$collections,
        'tag'=>$tag
        ]);
    }

}
