
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{trans('shop.add_product')}} {{direction()=='ltr' ?$category_master->name_en: $category_master->name_ar }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <style>
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
            color: #ffffff;
            background-color: #5A6670;
        }
    </style>

    <div class="card card-info card-outline">
        <div class="card-header">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 1 ? ' active' : '' }}" {{ 'active' ? 'style="background-color:#5A6670;"' : '' }} wire:click.prevent="changeStep(1)">
                        {{ trans('shop.photos') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 2 ? ' active' : '' }}{{ $maxStep < 2 ? ' disabled' : '' }}" wire:click.prevent="changeStep(2)">
                        {{ trans('shop.details') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 3 ? ' active' : '' }}{{ $maxStep < 3 ? ' disabled' : '' }}" wire:click.prevent="changeStep(3)">
                        @if ($category_id == 1 or $category_id == 2)
                        {{ trans('shop.qty_header') }}
                        @else
                        {{ trans('shop.sizes') }}
                        @endif

                    </a>
                </li>
            </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form class="mt-2" wire:submit.prevent="nextStep">
            @if($currentStep == 1)
                <!-- Button trigger modal -->

                    <div class="row">
                        <div class="col-sm-10">
                            <label for="">{{trans('shop.main_image')}}</label><br>
                            <input type="file" class="form-control @error('main_image')is-invalid @enderror" wire:model="main_image"  >
                            <div wire:loading wire:target="main_image">Uploading...</div>
                            @error('main_image') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        @if ($main_image)
                        <div class="col-sm-2">
                            @php
                                    try {
                                        $url = $main_image->temporaryUrl();
                                        $photoStatus = true;
                                    }catch (RuntimeException $exception){
                                        $this->photoStatus =  false;
                                    }
                                    @endphp
                                @if($photoStatus)
                                <div class="text-center">
                                    <img src="{{ $url }}"  class="img-fluid mb-2 img-thumbnail" style="height: 200px" alt="white sample"/>
                                </div>
                                @else
                                Something went wrong while uploading the file.
                                @endif
                            </div>
                            @endif
                        </div>
                        <small for="" class="text-danger"> حجم الصورة  يجب ان يكون  العرض 600 الطول 800</small>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ trans('shop.other_image') }}</label>
                                <input type="file" class="form-control" wire:model="input_image" multiple >
                                <div wire:loading wire:target="input_image">Uploading...</div>
                                @error('input_image.*') <span class="error text-danger">{{ $message }}</span> @enderror
                                <small>{{ session('lang')== 'ar'?'يمكنك تحميل أكثر من صورة واحد':'You can select multiple images  ' }} </small>
                            </div>
                        </div>
                        @if ($input_image)
                            <div class="col-md-12">
                                Photo Preview:
                                @foreach ($input_image as $item)
                                    @php
                                        try {
                                            $url = $item->temporaryUrl();
                                            $photoStatusImages = true;
                                        }catch (RuntimeException $exception){
                                            $this->photoStatusImages =  false;
                                        }
                                    @endphp
                                    @if($photoStatusImages)
                                        <img src="{{$url}}" class="img-fluid mb-2" style="height:200px" alt="white sample"/>
                                    @else
                                        Something went wrong while uploading the file.
                                    @endif
                                @endforeach
                            </div>
                        @endif



                        @elseif($currentStep == 2)

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('price',trans('shop.price')) !!}
                                        <input type="text" class="form-control  @error('price')is-invalid @enderror" name="price" wire:model="price"  placeholder="{{trans('shop.price')}}">
                                        @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('price_offer',trans('shop.price_offer')) !!}
                                        <input type="text" class="form-control  @error('price_offer')is-invalid @enderror" name="price_offer" wire:model="price_offer"  placeholder="{{trans('shop.price_offer')}}">
                                        @error('price_offer') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('status',trans('shop.status')) !!}
                                        <select class="form-control  @error('status')is-invalid @enderror" name="status"   wire:model="status" >
                                            <option value="">--</option>
                                            <option value="not active">{{trans('shop.not active')}}</option>
                                            <option value="active">{{trans('shop.active')}}</option>
                                        </select>
                                        @error('status')
                                            <span class="error text-danger">{{ $message }}</p>
                                            @enderror
                                    </div>

                                </div>
                            </div>
<hr>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('content',trans('shop.product_content')) !!}
                                        <textarea class="form-control @error('content')is-invalid @enderror" wire:model="content" name="content" id="summernote" ></textarea>
                                        @error('content') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{trans('shop.color')}}</label>
                                        <select id="color" class="form-control @error('color')is-invalid @enderror" wire:model="color">
                                            <option value="">--</option>
                                            @foreach($colors as $item)
                                                <option value="{{$item->id}}">{{session('lang') == 'ar' ?$item->name_ar:$item->name_en}}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                        <p class="error text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">{{trans('shop.shop_name')}}</label>
                                        <select id="color" class="form-control @error('store_id')is-invalid @enderror" wire:model="store_id">
                                            <option value="">--</option>
                                            @foreach($stores as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('store_id')
                                        <p class="error text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @else
                            @if ($category_id == 1)

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">{{trans('shop.include_sh_info')}}</label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input @error('include_shailah')is-invalid @enderror" value="1" type="radio" id="customRadio1" wire:model="include_shailah" name="include_shailah" >
                                                <label for="customRadio1" class="custom-control-label"> <h4> {{trans('shop.include_sh')}}</h4> </label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input @error('include_shailah')is-invalid @enderror" value="0" type="radio" id="customRadio2" wire:model="include_shailah" name="include_shailah"  >
                                                <label for="customRadio2" class="custom-control-label">  <h4>{{trans('shop.not_include_sh')}}</h4> </label>
                                            </div>
                                            @error('include_shailah')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for=""> {{trans('shop.qty')}}</label>
                                            <div>
                                                <select wire:model="qty" id="color" class="form-control @error('qty')is-invalid @enderror" >
                                                    <option value="">--</option>
                                                    @for ($i = 1; $i < 21; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('qty')
                                                <p class="error text-danger">{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($category_id == 2)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> {{trans('shop.qty')}}</label>
                                            <div>
                                                <select wire:model="qty" id="color" class="form-control @error('qty')is-invalid @enderror" >
                                                    <option value="">--</option>
                                                    @for ($i = 1; $i < 21; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('qty')
                                                <p class="error text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else

                                <div class="row">
                                    <div class="col-sm-10">
                                        <label for="">{{trans('shop.size_guide')}}</label>
                                        <input type="file" class="form-control @error('size_chart')is-invalid @enderror" wire:model="size_chart"  >
                                        <div wire:loading wire:target="size_chart">Uploading...</div>
                                        @error('size_chart') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    @if ($size_chart)
                                        <div class="col-sm-2">
                                            @php
                                                try {
                                                $url = $size_chart->temporaryUrl();
                                                $photoStatus2 = true;
                                                }catch (RuntimeException $exception){
                                                    $this->photoStatus2 =  false;
                                                }
                                            @endphp
                                            @if($photoStatus2)
                                                <div class="text-center">
                                                    <img src="{{ $url }}"  class="img-fluid mb-2 img-thumbnail" style="height: 200px" alt="white sample"/>
                                                </div>
                                            @else
                                                Something went wrong while uploading the file.
                                            @endif
                                        </div>
                                    @endif

                                </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="">{{ trans('shop.size') }}</label>
                                </div>
                                <div class="col">
                                    <label for="">{{ trans('shop.qty') }}</label>
                                </div>
                            </div>

                                @foreach ($questions as $index => $question)
                                    <div class="row">
                                        <div class="col-5">
                                            <select wire:model="size.{{$index}}" class="form-control" required>
                                                <option value="">-- choose from template --</option>
                                                @foreach ($all_templates as $template)
                                                    <option value="{{ $template->name }}">
                                                        {{ $template->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select wire:model="size_qty.{{$index}}" id="color" class="form-control @error('questions')is-invalid @enderror" required>
                                                <option value="">--</option>
                                                @for ($i = 1; $i < 21; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <button wire:click.prevent="removeQuestion({{$index}})" class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="mt-3">
                                    <button wire:click.prevent="addQuestion" style="background-color:#FFCE53;" class="btn btn-sm ">+ {{ trans('') }}</button>
                                </div>

                                @error('size') <span class="error text-danger">{{ $message }}</span> @enderror


                                <br/>


                            @endif



                        @endif
                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn" style="background-color:#726189; color:white">
                                    @if ($currentStep < 3)
                                    {{trans('shop.next')}}
                                    @else
                                    {{trans('shop.submit')}}
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>

        <!-- /.card-body -->
    </div>




</div>







    {{-- <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#" class="nav-link{{ $currentStep == 1 ? ' active' : '' }}" wire:click.prevent="changeStep(1)">
                From
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link{{ $currentStep == 2 ? ' active' : '' }}{{ $maxStep < 2 ? ' disabled' : '' }}" wire:click.prevent="changeStep(2)">
                To
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link{{ $currentStep == 3 ? ' active' : '' }}{{ $maxStep < 3 ? ' disabled' : '' }}" wire:click.prevent="changeStep(3)">
                Passengers
            </a>
        </li>

    </ul> --}}




@push('js')


        <script>
               $(document).ready(function() {

                $('#select2').select2();

                $('#select2').on('change', function (e) {

                    var data = $('#select2').select2("val");

                    @this.set('color', data);

                });


                $('#select3').select2();

                $('#select3').on('change', function (e) {

                var data = $('#select3').select2("val");

                    @this.set('qty', data);

                });


                // $('#select4').select2();

                // $('#select4').on('change', function (e) {

                // var data = $('#select4').select2("val");

                //     @this.set('size', data);

                // });
                $('#select5').select2();

                $('#select5').on('change', function (e) {

                var data = $('#select5').select2("val");

                    @this.set('size_qty', data);

                });

            });
            document.addEventListener("livewire:load", () => {
                let el = $('#categories')
                initSelect()

                Livewire.hook('message.processed', (message, component) => {
                    initSelect()
                })

                Livewire.on('setCategoriesSelect', values => {
                    el.val(values).trigger('change.select2')
                })

                el.on('change', function (e) {
                    @this.set('tag', el.select2("val"))
                })

                function initSelect () {
                    el.select2({
                        placeholder: '{{__('Select your option')}}',
                        allowClear: !el.attr('required'),
                    })
                }
            })
            document.addEventListener("livewire:load", () => {
                let el = $('#select4')
                initSelect()

                Livewire.hook('message.processed', (message, component) => {
                    initSelect()
                })

                Livewire.on('setSizeSelect', values => {
                    el.val(values).trigger('change.select2')
                })

                el.on('change', function (e) {
                    @this.set('size', el.select2("val"))
                })

                function initSelect () {
                    el.select2({
                        placeholder: '{{__('Select your option')}}',
                        allowClear: !el.attr('required'),
                    })
                }
            })
        </script>

@endpush








