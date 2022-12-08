<?php

namespace App\Http\Resources;

use App\Models\OrderProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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

            'order_id' =>$this->id,
            'customer_name'=>$this->billing_name,
            'customer_country'=>$this->billing_country,
            'customer_city'=>$this->billing_city,

            'customer_buliding'=>$this->billing_buliding,
            'customer_road'=>$this->billing_road,
            'customer_block'=>$this->billing_block,
            'customer_speical_direcstions'=>$this->billing_speical_direcstions,


            'customer_address2'=>$this->billing_address2,
            'customer_address'=>$this->billing_address,
            'customer_province'=>$this->billing_province,
            'customer_postalcode'=>$this->billing_postalcode,


            'customer_phone'=>$this->billing_phone,
            'customer_total'=>$this->billing_total,
            'billing_delivery'=>$this->billing_delivery,
            // 'store_name'=>$this->store->name,
            'delivery_type'=>$this->delivery_type,
            'order_date'=>$this->created_at->format('d/M/Y'),

//            'items_products'=>   OrderProduct::all()->where('order_id',$this->id)->collect(),
            'items_products'=>   OrderProductResource::collection( OrderProduct::all()->where('order_id',$this->id)),
            'items_count'=>   OrderProductResource::collection( OrderProduct::all()->where('order_id',$this->id))->count(),
//            'items_products'=>    OrderProductResource(OrderProduct::where('order_id',$this->id)->toArray()),
//            'items_products'=>   OrderProductResource::collection($this->items)
//            'product_category'=> new CategoryResource($this->category),
//            'product_tags'=>TagResource::collection($this->tags),
//            'store_id'=>$this->store->id,
//            'store_name'=>$this->store->name,
//            'order_status'=>$this->shipped,

        ];
    }
}
