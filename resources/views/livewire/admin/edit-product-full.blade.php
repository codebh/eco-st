<div>
    <form wire:submit.prevent="submit">



          <!-- general form elements disabled -->
          <div class="card card-info card-outline">
               <div class="card-header">
                   <h3 class="card-title">{{trans('shop.product_content')}} -- {{session('lang') == 'ar'?$category_name_ar:$category_name_en}} </h3>
               </div>


               <div class="card-body">
                   <div class="row">
                       <div class="col-12">
                           <!-- text input -->
                           <div class="form-group">
                               {!! Form::label('title',trans('shop.title')) !!}
                               {{-- {!! Form::text('title',$product->title, array('disabled' => 'disabled','class'    =>'form-control')) !!} --}}
                               <input type="text" class="form-control" wire:model="title" disabled >
                           </div>
                       </div>

                   </div>

                   <div class="row">
                       <div class="col-sm-12">
                           <!-- text input -->
                           <div class="form-group">
                               {!! Form::label('content',trans('shop.product_content')) !!}
                               {{-- {!! Form::textarea('content',$product->content,['id'=>'summernote','class'=>'form-control','placeholder'=>trans('shop.content')]) !!} --}}
                               {{-- <input type="text" class="form-control" wire:model="content"> --}}
                               <textarea wire:model="content"  @error('content')is-invalid @enderror id=""class="form-control"></textarea>
                               @error('content') <span class="error text-danger">{{ $message }}</span> @enderror
                           </div>
                       </div>
                   </div>



                   <div class="row">

                   <div class="col-4">
                       <div class="form-group">
                           {!! Form::label('price',trans('shop.price')) !!}
                           {{-- {!! Form::text('price',$product->price,['class'=>'form-control','placeholder'=>trans('shop.price')]) !!} --}}
                           <input type="text" class="form-control @error('price')is-invalid @enderror" wire:model="price"  >
                           @error('price') <span class="error text-danger">{{ $message }}</span> @enderror

                       </div>
                   </div>
                   <div class="col-4">
                       <div class="form-group">
                           {!! Form::label('price_offer',trans('shop.price_offer')) !!}
                           {{-- {!! Form::text('price_offer',$product->price_offer,['class'=>'form-control','placeholder'=>trans('shop.price_offer')]) !!} --}}
                           <input type="text" class="form-control  @error('price_offer')is-invalid @enderror" wire:model="price_offer"  >

                           @error('price_offer') <span class="error text-danger">{{ $message }}</span> @enderror


                       </div>
                   </div>
                   <div class="col-4">
                       <div class="form-group">
                           {!! Form::label('status',trans('shop.status')) !!}
                           {{-- {!! Form::select('status',
                           ['not active'=>trans('shop.not active'),'active'=>trans('shop.active')]
                           ,$product->status,['class'=>'form-control status','placeholder'=>trans('shop.status')]) !!} --}}
                           <div class="form-group">

                             <select class="form-control  @error('status')is-invalid @enderror"  wire:model="status">
                               <option value="not active">{{trans('shop.not active')}}</option>
                               <option value="active">{{trans('shop.active')}}</option>
                             </select>
                             @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                           </div>
                       </div>
                   </div>
               </div>


               <div class="row">
                   <div class="col-3">
                       <div class="form-group">
                           {!! Form::label('color_id',  trans('shop.color')) !!}
                           {{-- {!! Form::select('color_id',App\Models\Color::pluck('name_ar','id')

                               ,$product->color_id,['class'=>'form-control select2',]) !!} --}}


                             <select class="form-control @error('color_id')is-invalid @enderror"  wire:model="color_id">
                                 @foreach ($colors as $item)

                                 <option value="{{$item->id}}">{{$item->name_ar }}</option>
                                 @endforeach



                             </select>
                             @error('color_id') <span class="error text-danger">{{ $message }}</span> @enderror

                       </div>
                   </div>
                   <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('store_name',trans('shop.shop_name')) !!}
                        {{-- {!! Form::text('price_offer',$product->price_offer,['class'=>'form-control','placeholder'=>trans('shop.price_offer')]) !!} --}}
                        {{-- <input type="text" readonly  class="form-control    @error('store_name')is-invalid @enderror" wire:model="store_name"  > --}}
                        <select class="form-control @error('store_id')is-invalid @enderror"  wire:model="store_id">
                            @foreach ($stores as $item)

                            <option value="{{$item->id}}">{{$item->name }}</option>
                            @endforeach



                        </select>
                        @error('store_id') <span class="error text-danger">{{ $message }}</span> @enderror


                    </div>

                   </div>
                   <div class="col-3">
                       <div class="form-group">
                           <label for="">{{trans('shop.active_show')}}</label>

                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger @error('show')is-invalid @enderror" value="active" type="radio" id="activeRadio1"  wire:model="show" {{$show =='active' ? 'checked': ''}}>
                               <label for="activeRadio1" class="custom-control-label">  <h4>{{trans('shop.yes')}}</h4> </label>
                           </div>


                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger @error('show')is-invalid @enderror" value="not active" type="radio" id="activeRadio2"  wire:model="show" {{$show =='not active' ? 'checked': ''}} >
                               <label for="activeRadio2" class="custom-control-label"><h4>{{trans('shop.no')}}</h4></label>
                           </div>
                           @error('show') <span class="error text-danger">{{ $message }}</span> @enderror


                       </div>

                   </div>
                   @if ($category_id ==1 or $category_id ==2)

                   <div class="col-3">



                       <div class="form-group">
                           {!! Form::label('price_offer',trans('shop.qty')) !!}
                           <select wire:model="qty"  class="form-control @error('qty')is-invalid @enderror" >
                               <option value="">--</option>
                               @for ($i = 1; $i < 21; $i++)
                                   <option value="{{ $i }}">{{ $i }}</option>
                               @endfor
                           </select>
                           @error('qty')
                           <p class="invalid-feedback">{{ $message }}</p>
                           @enderror

                           @error('qty') <span class="error text-danger">{{ $message }}</span> @enderror


                       </div>
                   </div>
                   @endif
               </div>
               <div class="row">
                   <button type="submit" class="btn btn-lg btn-block" style="background-color:#726189 ;color:white">
                  {{trans('shop.update')}}


               </button>
               </div>

               </div>
           </div>
   </form>
   </div>
