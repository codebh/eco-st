
<div >

    @if ($category_master == 1 or $category_master ==2)






    @else

    <div class="card card-danger">
        <div class="card-header" style="background-color:#5A6670">
            <h3 class="card-title">{{trans('shop.sizes')}}</h3>
        </div>
        <div class="card-body">


            <div class="row">
                <table class=" table table-bordered text-center">

                    <tbody>

                    <tr>

                        <td>
                            <label for="">{{trans('shop.size_guide')}}</label>
                            <input type="file"  class="form-control @error('image_size')is-invalid @enderror" wire:model="image_size"  >
                            <div wire:loading wire:target="image_size">Uploading...</div>
                            @error('image_size') <span class="error text-danger">{{ $message }}</span> @enderror

                                <p>{{session('lang')=='ar' ? 'تأكد من تحديث الصورة' : 'Make sure to updated the image '}}</p>
                        </td>

                        <td>
                            <img src=" {{ imageDo($size_chart) }}"  style="width: 120px;" alt="..." class="img-thumbnail">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" wire:model="product_id">
                            <button type="button" style="background-color:#726189;color:white" wire:click.prevent="update()" class="btn  btn-lg btn-block ">{{trans('shop.update')}}</button>
                        </td>
                    </tr>


                    </tbody>
                </table>
                {{-- <div class="col-6">
                    <div class="form-group">
                        <br>
                        <label>{{trans('shop.sizes')}}</label>

                        <input type="file" name="size_chart" class="form-control" value="{{old('size_chart')}}">
                    </div>
                </div>
                <div class="col">
                    <img src="{{imageDo($this->size_chart)}}" style="height: 200px;" alt="..." class="img-thumbnail">

                </div>
                <div class="col">
                    <img src="{{imageDo($this->size_chart)}}" style="height: 200px;" alt="..." class="img-thumbnail">

                </div> --}}


            </div>

            <div class="row">


                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ trans('shop.size') }}</th>
                            <th>{{ trans('shop.qty') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->size_data }}</td>
                            <td>{{ $product->size_qty }}</td>
                            <td>
                                <a wire:click.prevent="edit({{ $product->id }})"
                                href="#" class="btn btn-sm  text-white" style="background-color:#726189" >Edit</a>
                                <button wire:click.prevent="delete({{ $product->id }})"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No products found.</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>



                    <div class="row">

                        <a wire:click.prevent="create" href="#" class="btn "><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="row">

                        {{ $products->links() }}
                    </div>

                    <div class="modal" @if ($showModal) style="display:block" @endif>
                        <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form wire:submit.prevent="save_up">
                                                <div class="modal-header">
                                                    <!-- <h5 class="modal-title">{{ $productId ? 'Edit Product' :trans('') }}</h5> -->
                                                    <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  {{trans('shop.size')}}
                                                    <br/>
                                                    <input wire:model="product.id" hidden class="form-control"/>
                                                    <select wire:model="product.size_data" class="form-control" id="">
                                                        <option value="">--</option>
                                                        @foreach ($sizes as $item)
                                                        <option value="{{$item->name}}">{{$item->name}}</option>

                                                        @endforeach

                                                    </select>
                                                    @error('product.size_data')
                                                    <div style="font-size: 11px; color: red">{{ $message }}</div>
                                                    @enderror
                                                    <br/>
                                                    {{trans('shop.quantity')}}
                                                    <br/>

                                                    <select wire:model="product.size_qty" id="color" class="form-control @error('product.price')is-invalid @enderror" required>
                                                        <option value="">--</option>
                                                        @for ($i = 0; $i < 21; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    @error('product.price')
                                                    <div style="font-size: 11px; color: red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"class="btn" style="background-color:#726189;color:white">{{ $productId ?  trans('shop.save1') : trans('shop.save1') }}</button>
                                                    <button wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('shop.close') }}
                                                    </button>
                                                </div>
                                    </form>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    @endif






</div>
























{{-- مهىث  --}}

