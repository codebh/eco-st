<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[

            'item_id' =>$this->id,
            'item_order_id'=>$this->order_id,
            'item_store_id'=>$this->store_id,
            'item_store_id'=>$this->store_id,
            'item_store_name'=>$this->store->name,
            'item_store_phone'=>$this->store->mobile,
            'product_title'=>$this->product->title,
            'order_status'=>$this->shipped,

        ];
    }
}
