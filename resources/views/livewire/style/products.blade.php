



    @if ($store_busy  == 'yes')

    <button type="button" name="" id="" class="btn  btn-lg btn-block" style="background-color: #5A6670;color: white" disabled>
        {{ trans('user.busy') }}
    </button>


                                 <!--modal popup start-->
                                 <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                     <div class="modal-content">
                                         <div class="modal-body modal1">
                                             <div class="container-fluid p-0">
                                                 <div class="row">
                                                     <div class="col-12">
                                                         <div class="modal-bg">
                                                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                 aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                             <div class="offer-content text-center">
                                                                 <h3 style="  line-height: normal; color: #5A6670;">{{ trans('user.busy_info') }}</h3>

                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         <!--modal popup end-->

    @else
    @if ($category_id == 1)
    @if ( $qty > 0 and  $show == 'active')

     <div>
        <div wire:loading.delay.longest>
                <div style="display: flex; justify-content: center; align-items: center; background-color:black;
                        position: fixed; top: 0px; left:0px; z-index: 9999; width: 100%; height:100%; opacity:.50; ">
                    <div class="la-ball-clip-rotate la-3x" >
                        <div></div>

                    </div>
                </div>
        </div>

            {{-- <button type="button" class="btn btn-solid hover-solid btn-animation mb- " data-toggle="modal" data-target="#exampleModal">
                {{ trans('user.sizing_mode') }}
            </button> --}}
            <div class="row">
                <div class="col-md-12">
                    <label for="">{{trans('user.notes')}}</label>
                    <textarea id="notes" class="form-control @error('notes')is-invalid @endif" wire:model="notes" ></textarea>
                    <br>
                    <button  class="btn   btn-rounded  btn-block "
                    style="border-radius: 50px;color:white; background-color: #726189 "
                    data-toggle="modal" data-target="#exampleModal1">

                    <i class="fas fa-frown mr-2" aria-hidden="true"></i>
                        {{ trans('user.sizing_mode') }}
                    </button>
                    {{-- <div class="title1 section-t-space text-center mb-3">
                        <button type="button" class="btn btn-solid hover-solid btn-animation  " data-toggle="modal" data-target="#exampleModal">
                            {{ trans('user.sizing_mode') }}
                        </button>
                    </div> --}}
                </div>


            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="text-center ">

                        @livewire('style.add-to-fav',['post' => $post,'user_id' =>auth()->user()->id])
                    </div>

                </div>
            </div>
            <div  wire:ignore.self class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('user.sizing_mode') }}</h5>
                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true close-btn">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
        @if ($size_abaya_count > 0)

                            <ul class="nav nav-tabs">

                                @foreach ($size_abaya as $item )
                                <li class="nav-item">
                                    <a href="#" class="@error($loop->iteration)is-invalid @endif nav-link{{ $currentStep == $loop->iteration ? ' active' : '' }}" style=" background-color:{{ $currentStep == $loop->iteration ?  '#726189' : '' }}; color:{{ $currentStep == $loop->iteration ?  '#fefefe' : '' }};" wire:click.prevent="changeStep({{$loop->iteration}})">
                                        {{-- {{ trans('user.a_size1') }} --}}
                                        {{-- {{$loop->iteration}} --}}


                                    @if($item->size_abaya == 'a_size1')
                                    {{ trans('user.a_size1') }}
                                       @elseif($item->size_abaya == 'a_size2')
                                       {{ trans('user.a_size2') }}
                                       @elseif($item->size_abaya == 'a_size3')
                                       {{ trans('user.a_size3') }}
                                       @elseif($item->size_abaya == 'a_size4')
                                       {{ trans('user.a_size4') }}
                                       @elseif($item->size_abaya == 'a_size5')
                                       {{ trans('user.a_size5') }}
                                       @elseif($item->size_abaya == 'a_size6')
                                       {{ trans('user.a_size6') }}
                                       @endif


                                    </a>
                                </li>
                                @endforeach



                            </ul>

                            <form  class="mt-2" wire:submit.prevent="nextStep">
                                <div>
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </div>


                                @foreach ($size_abaya as  $item)
                                 @if($currentStep == $loop->iteration)

                                 <div class="text-center">
                                    <img src="{{asset($item->img_abaya)}}" class="rounded" height="400" alt="...">
                                </div>
                                <div class="form-group">
                                    <label for="adults">{{ trans('user.'.$item->size_abaya.'') }}</label>
                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text">INCH</div>
                                          </div>
                                          <input type="text" id="{{$item->size_abaya}}" class="form-control @error($item->size_abaya)is-invalid @endif" wire:model="{{$item->size_abaya}}"/>
                                          @error($item->size_abaya)
                                          <p class="invalid-feedback">{{ $message }}</p>
                                          @enderror
                                        </div>
                                </div>
                                @endif
                                @endforeach



                                <div class="form-group">
                                    <button type="submit" class="btn btn-solid ">
                                        @if ($currentStep < $size_abaya_count)
                                            {{ trans('user.next') }}
                                        @else

                                            {{ trans('user.add_to_cart') }}
                                        @endif
                                    </button>


                                </div>
                            </form>



        @else
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 1 ? ' active' : '' }}" style=" background-color:{{ $currentStep == 1 ?  '#726189' : '' }}; color:{{ $currentStep == 1 ?  '#fefefe' : '' }};" wire:click.prevent="changeStep(1)">
                        {{-- {{ trans('user.a_size1') }} --}}
                        1
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 2 ? ' active' : '' }}{{ $maxStep < 2 ? ' disabled' : '' }}" wire:click.prevent="changeStep(2)" style=" background-color:{{ $currentStep == 2 ?  '#726189' : '' }}; color:{{ $currentStep == 2 ?  '#fefefe' : '' }};">
                        {{-- {{ trans('user.a_size2') }} --}}
                        2
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 3 ? ' active' : '' }}{{ $maxStep < 3 ? ' disabled' : '' }}" wire:click.prevent="changeStep(3)" style=" background-color:{{ $currentStep == 3 ?  '#726189' : '' }}; color:{{ $currentStep == 3 ?  '#fefefe' : '' }};">
                        {{-- {{ trans('user.a_size3') }} --}}
                        3
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 4 ? ' active' : '' }}{{ $maxStep < 4 ? ' disabled' : '' }}" wire:click.prevent="changeStep(4)" style=" background-color:{{ $currentStep == 4 ?  '#726189' : '' }}; color:{{ $currentStep == 4 ?  '#fefefe' : '' }};">
                        {{-- {{ trans('user.a_size4') }} --}}
                        4
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 5 ? ' active' : '' }}{{ $maxStep < 5 ? ' disabled' : '' }}" wire:click.prevent="changeStep(5)" style=" background-color:{{ $currentStep == 5 ?  '#726189' : '' }}; color:{{ $currentStep == 5 ?  '#fefefe' : '' }};">
                        {{-- {{ trans('user.a_size5') }} --}}
                        5
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link{{ $currentStep == 6 ? ' active' : '' }}{{ $maxStep < 6 ? ' disabled' : '' }}" wire:click.prevent="changeStep(6)" style=" background-color:{{ $currentStep == 6 ?  '#726189' : '' }}; color:{{ $currentStep == 6 ?  '#fefefe' : '' }};">
                        {{-- {{ trans('user.a_size6') }} --}}
                        6
                    </a>
                </li>

            </ul>

            <form  class="mt-2" wire:submit.prevent="nextStep">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>




                @if($currentStep == 1)

                    <div class="text-center">
                        <img src="{{asset('img/size/abaya-1.png')}}" class="rounded" height="400" alt="...">
                    </div>
                    <div class="form-group">


                        <label for="adults">{{ trans('user.a_size1') }}</label>
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">INCH</div>
                            </div>
                            {{-- <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username"> --}}
                            <input type="text" id="a_size1" class="form-control @error('a_size1')is-invalid @endif" wire:model="a_size1"/>
                            @error('a_size1')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                            </div>


                    </div>

                @elseif ($currentStep == 2)

                    <div class="text-center">
                        <img src="{{asset('img/size/abaya-2.png')}}" class="rounded" height="400" alt="...">
                    </div>
                    <div class="form-group">
                        <label for="adults">{{ trans('user.a_size2') }}</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">INCH</div>
                            </div>
                        <input type="text" id="a_size2" class="form-control @error('a_size2')is-invalid @endif" wire:model="a_size2"/>

                        @error('a_size2')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                @elseif ($currentStep == 3)
                    <div class="text-center">
                        <img src="{{asset('img/size/abaya-3.png')}}" class="rounded" height="400" alt="...">
                    </div>
                    <div class="form-group">
                        <label for="adults">{{ trans('user.a_size3') }}</label>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">INCH</div>
                            </div>
                        <input type="text" id="a_size3" class="form-control @error('a_size3')is-invalid @endif" wire:model="a_size3"/>

                        @error('a_size3')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                @elseif ($currentStep == 4)
                    <div class="text-center">
                        <img src="{{asset('img/size/abaya-4.png')}}" class="rounded" height="400" alt="...">
                    </div>
                    <div class="form-group">
                        <label for="adults">{{ trans('user.a_size4') }}</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">INCH</div>
                            </div>
                        <input type="text" id="a_size4" class="form-control @error('a_size4')is-invalid @endif" wire:model="a_size4"/>

                        @error('a_size4')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                @elseif ($currentStep == 5)
                    <div class="text-center">
                        <img src="{{asset('img/size/abaya-5.png')}}" class="rounded" height="400" alt="...">
                    </div>
                    <div class="form-group">
                        <label for="adults">{{ trans('user.a_size5') }}</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">INCH</div>
                            </div>
                        <input type="text" id="a_size5" class="form-control @error('a_size5')is-invalid @endif" wire:model="a_size5"/>

                        @error('a_size5')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <img src="{{asset('img/size/abaya-6.png')}}" class="rounded" height="400" alt="...">
                    </div>
                    <div class="form-group">
                        <label for="adults">{{ trans('user.a_size6') }}</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">INCH</div>
                            </div>
                        <input type="text" id="a_size6" class="form-control @error('a_size6')is-invalid @endif" wire:model="a_size6"/>

                        @error('a_size6')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        </div>

                    </div>

                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-solid ">
                        @if ($currentStep < 6)
                            {{ trans('user.next') }}
                        @else

                            {{ trans('user.add_to_cart') }}
                        @endif
                    </button>


                </div>
            </form>

        @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{ trans('user.close') }}</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @else

    <button  class="btn  btn-rounded disabled btn-block"
    style="border-radius: 50px;color:white; background-color: #5A6670 ">

    <i class="fas fa-frown mr-2" aria-hidden="true"></i>
             {{trans('user.sold_out1')}}
    </button>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="text-center ">

                @livewire('style.add-to-fav',['post' => $post,'user_id' =>auth()->user()->id])
            </div>

        </div>
    </div>
        @endif



    @elseif ($category_id == 2)
                @if ( $qty > 0 and  $show == 'active')
                    <form class="mt-2" wire:submit.prevent="store">



                        <label for="">{{trans('user.notes')}}</label>
                        <textarea id="notes" class="form-control @error('notes')is-invalid @endif" wire:model="notes" ></textarea>

                        <br>
                        {{-- <div class="product-buttons">
                            <button type="submit" id="cartEffect" class="btn btn-solid hover-solid btn-animation"><i class="fa fa-shopping-cart me-1" aria-hidden="true"></i>add to cart</button>
                        </div> --}}
                        <button type="submit"  class="btn   btn-rounded  btn-block "
                        style="border-radius: 50px;color:white; background-color: #726189 "
                        >

                        <i class="fas fa-frown mr-2" aria-hidden="true"></i>
                            {{ trans('user.add_to_cart') }}
                        </button>
                    </form>
                    <div class="row m-3">
                        <div class="col-md-12">
                            <div class="text-center ">

                                @livewire('style.add-to-fav',['post' => $post,'user_id' =>auth()->user()->id])
                            </div>

                        </div>
                    </div>
                @else
                <a href="#" class="btn  btn-rounded disabled btn-block"
                style="border-radius: 50px;color:white; background-color: #5A6670 ">

                <i class="fas fa-frown mr-2" aria-hidden="true"></i>
                        {{trans('user.sold_out1')}}
                </a>
                <div class="row m-3">
                    <div class="col-md-12">
                        <div class="text-center ">

                            @livewire('style.add-to-fav',['post' => $post,'user_id' =>auth()->user()->id])
                        </div>

                    </div>
                </div>
                @endif



    @else


    @if (count($stock) > 0 and  $show == 'active')


        <div id="selectSize" class="addeffect-section product-description border-product">
            <h6 class="product-title size-text"> {{trans('user.sizes')}} <span>
                <a href="" data-bs-toggle="modal" data-bs-target="#sizemodal" style="color: #726189">
                    {{trans('user.size_info')}}
                </a>
            </span>
            </h6>

            <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{trans('user.size_info')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body"><img src="{{imageDo($size_chart)}}" alt=""
                                                     class="img-fluid blur-up lazyload"></div>
                    </div>
                </div>
            </div>
            <div class="size-box">
                <ul>
                    @forelse ($sizes as $size)

                    <li class="li"><a>{{$size->size_data}}</a></li>
                    @empty

                    <li><a href="javascript:void(0)">m</a></li>
                    @endforelse

                </ul>
            </div>
                <form class="mt-2" wire:submit.prevent="store">
                {{-- <label for="">{{trans('user.sizes')}}</label> --}}
                <select id="de_size" class="form-control @error('de_size')is-invalid @endif" wire:model="de_size">
                    <option value="">{{ trans('user.choose_size') }}</option>
                    @foreach($sizes as $size))
                        <option value="{{$size->size_data}}">{{$size->size_data}}  </option>
                    @endforeach

                </select>
                <br>
                <label for="">{{trans('user.notes')}}</label>
                <textarea id="notes" class="form-control @error('notes')is-invalid @endif" wire:model="notes" ></textarea>


                    <br>

                    <button type="submit"  class="btn   btn-rounded  btn-block "
                    style="border-radius: 50px;color:white; background-color: #726189 "
                    >

                    <i class="fas fa-frown mr-2" aria-hidden="true"></i>
                        {{ trans('user.add_to_cart') }}
                    </button>

                    </form>
            </div>

                <div class="row m-2">
                    <div class="col-md-12">
                        <div class="text-center ">

                            @livewire('style.add-to-fav',['post' => $post,'user_id' =>auth()->user()->id])
                        </div>

                    </div>
                </div>







        @else
          <a href="#" class="btn  btn-rounded disabled btn-block"
            style="border-radius: 50px;color:white; background-color: #5A6670 ">
            <i class="fas fa-frown mr-2" aria-hidden="true"></i>
                     {{trans('user.sold_out1')}}
            </a>

            <div class="row m-3">
                <div class="col-md-12">
                    <div class="text-center ">

                        @livewire('style.add-to-fav',['post' => $post,'user_id' =>auth()->user()->id])
                    </div>

                </div>
            </div>
        @endif




    @endif
    @endif

<div>
{{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--        Open Form--}}
{{--    </button>--}}

{{--    <!-- Modal -->--}}
{{--    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true close-btn">×</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlInput1">Name</label>--}}
{{--                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">--}}
{{--                            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlInput2">Email address</label>--}}
{{--                            <input type="email" class="form-control" id="exampleFormControlInput2" wire:model="email" placeholder="Enter Email">--}}
{{--                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save changes</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



</div>






<!--Section ends-->

{{--<button wire:click="create()">click</button>--}}


{{--<h2>{{$title}}</h2>--}}
{{--    <h2>{{presentPrice($price)}}</h2>--}}
{{--    <h2>{{presentPrice($price_offer)}}</h2>--}}
{{--    <h2>{{$category_id}}</h2>--}}
{{--    <h2>{{$store_id}}</h2>--}}
{{--    @forelse($images as $item)--}}
{{--        <h2>{{$item->image_key}}</h2>--}}
{{--        @empty--}}

{{--    @endforelse--}}
{{--    <hr>--}}
{{--    @forelse($primary_colors as $item)--}}
{{--        <h2>{{$item->color->color}}</h2>--}}
{{--    @empty--}}

{{--    @endforelse--}}
{{--</div>--}}


{{--    @include('style.layouts.message')--}}
{{--<div class="breadcrumb-section">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-6">--}}
{{--                <div class="page-title">--}}
{{--                    <h2>collection</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6">--}}
{{--                <nav aria-label="breadcrumb" class="theme-breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="index.html">home</a></li>--}}
{{--                        <li class="breadcrumb-item " aria-current="page">--}}
{{--                            <a href="/vendors/{{$store_id}}">{{$store_name}}</a></li>--}}
{{--                        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<!-- section start -->--}}
{{--<section>--}}
{{--    <div class="collection-wrapper">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="product-slick">--}}
{{--                        <div><img src="{{asset('img/theme/product/'.$main_image)}}" alt=""--}}
{{--                                  class="img-fluid blur-up lazyload image_zoom_cls-0"></div>--}}
{{--                        @foreach($images as $image)--}}


{{--                            <div><img src="{{asset('img/theme/product/'.$image->image_key)}}" alt=""--}}
{{--                                      class="img-fluid blur-up lazyload image_zoom_cls-0"></div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12 p-0">--}}
{{--                            <div class="slider-nav">--}}
{{--                                <div><img src="{{asset('img/theme/product/'.$main_image)}}" alt=""--}}
{{--                                          class="img-fluid blur-up lazyload image_zoom_cls-0"></div>--}}

{{--                                @foreach($images as $image)--}}
{{--                                    <div><img src="{{asset('img/theme/product/'.$image->image_key)}}" alt=""--}}
{{--                                              class="img-fluid blur-up lazyload"></div>--}}

{{--                                @endforeach--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 rtl-text">--}}

{{--                    <div class="product-right">--}}
{{--                        <h2 class="mb-0">{{$title}}</h2>--}}
{{--                        <h5 class="mb-2">by <a href="#">{{$store_name}}</a></h5>--}}
{{--                        <h5 class="mb-2"><a href="#">{{$category_name}}</a></h5>--}}

{{--                        @if ( $price_offer > 0 and  $status =='active' )--}}

{{--                            <h4>--}}
{{--                                <del>{{presentPrice($price)}}</del>--}}
{{--                                --}}{{--                                    <span>{{persent($product->price_offer,$product->price)}}</span>--}}
{{--                            </h4>--}}
{{--                            <h3>{{presentPrice($price_offer)}}</h3>--}}
{{--                        @else--}}

{{--                            <h3>{{presentPrice($price)}}</h3>--}}
{{--                        @endif--}}
{{--                        <div class="product-description border-product">--}}
{{--                            <h6 class="product-title size-text">Abaya Colors</h6>--}}
{{--                            <ul class="color-variant">--}}
{{--                                @foreach($primary_colors as $color)--}}
{{--                                    <li class="" style="background-color:{{$color->color->color}} "></li>--}}

{{--                                @endforeach--}}

{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="product-description border-product">--}}

{{--                            <h6 class="product-title size-text">Shila Colors</h6>--}}
{{--                            <ul class="color-variant">--}}
{{--                                @foreach($secound_colors as $color)--}}
{{--                                    <li class="" style="background-color:{{$color->color->color}} "></li>--}}

{{--                                @endforeach--}}

{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <hr>--}}
{{--                        --}}{{--                                        <div class="product-description border-product"> </div>--}}
{{--                        <form method="post" action="{{route('ShoppingCart.store')}}">--}}
{{--                            @if ($category_id == 1)--}}
{{--                                @if (count($count_primary_colors)>0 and count($count_secound_colors)>0)--}}
{{--                                    {{csrf_field()}}--}}
{{--                                    <input type="hidden" name="id" id="id" value="{{$product_id}}">--}}
{{--                                    <input type="hidden" name="name" id="name" value="{{$title}}">--}}
{{--                                    <input type="hidden" name="category" id="name" value="{{$category_id}}">--}}

{{--                                    <h6 class="product-title size-text">--}}
{{--                                            <span>--}}
{{--                                                                <button  class="btn btn-solid "data-bs-toggle="modal" data-bs-target="#sizemodal" >size select</button>--}}
{{--                                                            </span>--}}
{{--                                    </h6>--}}


{{--                                    <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog modal-dialog-centered"--}}
{{--                                             role="document">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h5 class="modal-title" id="exampleModalLabel">--}}
{{--                                                        مقاسات العباية</h5>--}}
{{--                                                    <button type="button" class="btn-close"--}}
{{--                                                            data-bs-dismiss="modal"--}}
{{--                                                            aria-label="Close"><span--}}
{{--                                                            aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <img src="{{asset('img/size-abaya.png')}}"--}}
{{--                                                         alt=""--}}
{{--                                                         class="img-fluid blur-up lazyload">--}}
{{--                                                    <h3>المقاسات</h3>--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col">--}}
{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                                    <span class="input-group-text"--}}
{{--                                                                                          id="basic-addon1">1</span>--}}
{{--                                                                <input type="number" name="a_size1" wire:model="size1"--}}
{{--                                                                <input type="number"  wire:model="size1" class="form-control">--}}
{{--                                                                <span--}}
{{--                                                                    class="input-group-text bg-white"--}}
{{--                                                                    id="basic-addon1">In</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col">--}}
{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                                    <span class="input-group-text"--}}
{{--                                                                                          id="basic-addon1">2</span>--}}
{{--                                                                <input type="number" name="a_size2"--}}
{{--                                                                       class="form-control">--}}
{{--                                                                <span--}}
{{--                                                                    class="input-group-text bg-white"--}}
{{--                                                                    id="basic-addon1">In</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col">--}}
{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                                    <span class="input-group-text"--}}
{{--                                                                                          id="basic-addon1">3</span>--}}
{{--                                                                <input type="number" name="a_size3"--}}
{{--                                                                       class="form-control">--}}
{{--                                                                <span--}}
{{--                                                                    class="input-group-text bg-white"--}}
{{--                                                                    id="basic-addon1">In</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col">--}}
{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                                    <span class="input-group-text"--}}
{{--                                                                                          id="basic-addon1">4</span>--}}
{{--                                                                <input type="number" name="a_size4"--}}
{{--                                                                       class="form-control">--}}
{{--                                                                <span--}}
{{--                                                                    class="input-group-text bg-white"--}}
{{--                                                                    id="basic-addon1">In</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="row">--}}
{{--                                                        <div class="col">--}}
{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                                    <span class="input-group-text"--}}
{{--                                                                                          id="basic-addon1">5</span>--}}
{{--                                                                <input type="number" name="a_size5"--}}
{{--                                                                       class="form-control">--}}
{{--                                                                <span--}}
{{--                                                                    class="input-group-text bg-white"--}}
{{--                                                                    id="basic-addon1">In</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col">--}}
{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                                    <span class="input-group-text"--}}
{{--                                                                                          id="basic-addon1">6</span>--}}
{{--                                                                <input type="number" name="a_size6"--}}
{{--                                                                       class="form-control">--}}
{{--                                                                <span--}}
{{--                                                                    class="input-group-text bg-white"--}}
{{--                                                                    id="basic-addon1">In</span>--}}
{{--                                                            </div>--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class=" select-outline ">--}}
{{--                                                        <p class="grey-text">Choose your Abaya--}}
{{--                                                            Color</p>--}}
{{--                                                        <select name="color" id="color"--}}
{{--                                                                class="form-control">--}}
{{--                                                            <option value="" disabled selected>--}}
{{--                                                                Choose your color--}}
{{--                                                            </option>--}}
{{--                                                            @foreach($count_primary_colors as $other)--}}
{{--                                                                <option--}}
{{--                                                                    value="{{$other->color->name_ar}}">{{$other->color->name_ar}} </option>--}}
{{--                                                            @endforeach--}}
{{--                                                            @foreach($count_primary_colors_dis as $other)--}}
{{--                                                                <option disabled--}}
{{--                                                                        value="{{$other->color->name_ar}}">{{$other->color->name_ar}}</option>--}}
{{--                                                            @endforeach--}}


{{--                                                        </select>--}}

{{--                                                    </div>--}}
{{--                                                    <div class=" select-outline ">--}}
{{--                                                        <p class="grey-text">Choose your Shela--}}
{{--                                                            Color</p>--}}
{{--                                                        <select name="color1" id="color1"--}}
{{--                                                                class="form-control">--}}
{{--                                                            <option value="" disabled selected>--}}
{{--                                                                Choose your color--}}
{{--                                                            </option>--}}
{{--                                                            @foreach($count_secound_colors as $other)--}}
{{--                                                                <option--}}
{{--                                                                    value="{{$other->color->name_ar}}">{{$other->color->name_ar}} </option>--}}
{{--                                                            @endforeach--}}
{{--                                                            @foreach($count_secound_colors_dis as $other)--}}
{{--                                                                <option disabled--}}
{{--                                                                        value="{{$other->color->name_ar}}">{{$other->color->name_ar}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                    <label for="">notes</label>--}}
{{--                                                    <textarea name="notes" id="notes" cols="30"--}}
{{--                                                              rows="3"--}}
{{--                                                              class="form-control">Notes</textarea>--}}
{{--                                                    <br>--}}
{{--                                                    --}}{{--                                                        <div class="row">--}}

{{--                                                    --}}{{--                                                            <div class="col">--}}
{{--                                                    --}}{{--                                                                <button type="button" class="btn  btn-solid" data-bs-dismiss="modal"--}}
{{--                                                    --}}{{--                                                                        aria-label="Close">save</button>--}}

{{--                                                    --}}{{--                                                            </div>--}}
{{--                                                    --}}{{--                                                        </div>--}}
{{--                                                    <div class="model-footer">--}}

{{--                                                        <div class="product-buttons">--}}
{{--                                                            <button type="submit" class="btn btn-solid" wire:click="store" >add to cart--}}
{{--                                                            </button>--}}
{{--                                                            <a href="#" class="btn btn-solid">buy--}}
{{--                                                                now</a>--}}
{{--                                                        </div>--}}
{{--                                                        @else--}}
{{--                                                            <a href="#"--}}
{{--                                                               class="btn  btn-rounded disabled btn-block"--}}
{{--                                                               style="border-radius: 50px;color:white; background-color: #ff7675 ">--}}
{{--                                                                <i class="fas fa-frown mr-2"--}}
{{--                                                                   aria-hidden="true"></i> Sold Out--}}
{{--                                                            </a>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}


{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}


{{--                                    </div>--}}


{{--                                    @if ($price_offer > 0  and  $status == "active")--}}
{{--                                        <input type="hidden" name="price" id="price"--}}
{{--                                               value="{{$price_offer}}">--}}
{{--                                    @else--}}
{{--                                        <input type="hidden" name="price" id="price"--}}
{{--                                               value="{{$price}}">--}}
{{--                                    @endif--}}


{{--                                @elseif ($product->category_id == 2)--}}
{{--                                    {{csrf_field()}}--}}
{{--                                    @if ( count($product->other_data()->where('data_value',1)->get())>0 )--}}
{{--                                        <input type="hidden" name="id" id="id"--}}
{{--                                               value="{{$product->id}}">--}}
{{--                                        <input type="hidden" name="name" id="name"--}}
{{--                                               value="{{$product->title}}">--}}

{{--                                        <input type="hidden" name="category" id="name"--}}
{{--                                               value="{{$product->category_id}}">--}}


{{--                                        <div class=" select-outline ">--}}
{{--                                            <p class="grey-text">Choose your Primary Color</p>--}}
{{--                                            <select name="color" id="color"--}}
{{--                                                    class="mdb-select md-form md-outline colorful-select dropdown-dark">--}}
{{--                                                <option value="" disabled selected>Choose your--}}
{{--                                                    color--}}
{{--                                                </option>--}}
{{--                                                @foreach($product->other_data()->where('data_value',1)->get() as $other)--}}
{{--                                                    <option--}}
{{--                                                        value="{{$other->color->name_ar}}">{{$other->color->name_ar}} </option>--}}
{{--                                                @endforeach--}}
{{--                                                @foreach($product->other_data()->where('data_value',0)->get() as $other)--}}
{{--                                                    <option disabled--}}
{{--                                                            value="{{$other->color->name_ar}}">{{$other->color->name_ar}}</option>--}}
{{--                                                @endforeach--}}


{{--                                            </select>--}}

{{--                                        </div>--}}
{{--                                        <input name="sh_size" class="form-control"--}}
{{--                                               placeholder="enter size1">--}}


{{--                                        <textarea name="notes" id="notes" cols="30" rows="3"--}}
{{--                                                  class="form-control">Notes</textarea>--}}
{{--                                        @if ($product->price_offer>0  and  $product->status == "active")--}}
{{--                                            <input type="hidden" name="price" id="price"--}}
{{--                                                   value="{{$product->price_offer}}">--}}
{{--                                        @else--}}
{{--                                            <input type="hidden" name="price" id="price"--}}
{{--                                                   value="{{$product->price}}">--}}
{{--                                        @endif--}}

{{--                                        <div class="product-buttons">--}}
{{--                                            <button class="btn btn-solid" id="butsave">add to cart--}}
{{--                                            </button>--}}
{{--                                            <a href="#" class="btn btn-solid">buy now</a>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <a href="#" class="btn  btn-rounded disabled btn-block"--}}
{{--                                           style="border-radius: 50px;color:white; background-color: #ff7675 ">--}}
{{--                                            <i class="fas fa-frown mr-2" aria-hidden="true"></i>--}}
{{--                                            Sold Out--}}
{{--                                        </a>--}}
{{--                                    @endif--}}


{{--                                    --}}{{--for normal size--}}
{{--                                @else--}}

{{--                                    {{csrf_field()}}--}}
{{--                                    @if ( count($product->other_data()->where('data_value',1)->get())>0 and count($product->size_data()->where('size_show',1)->get())>0)--}}
{{--                                        <input type="hidden" name="id" id="id"--}}
{{--                                               value="{{$product->id}}">--}}
{{--                                        <input type="hidden" name="name" id="name"--}}
{{--                                               value="{{$product->title}}">--}}
{{--                                        <input type="hidden" name="category" id="name"--}}
{{--                                               value="{{$product->category_id}}">--}}


{{--                                        <div class="product-description border-product">--}}
{{--                                            <h6 class="product-title size-text">select size <span><a--}}
{{--                                                        href=""--}}
{{--                                                        data-toggle="modal"--}}
{{--                                                        data-target="#sizemodal">size chart</a></span>--}}
{{--                                            </h6>--}}
{{--                                            <div class="modal fade" id="sizemodal" tabindex="-1"--}}
{{--                                                 role="dialog"--}}
{{--                                                 aria-labelledby="exampleModalLabel"--}}
{{--                                                 aria-hidden="true">--}}
{{--                                                <div class="modal-dialog modal-dialog-centered"--}}
{{--                                                     role="document">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header">--}}
{{--                                                            <h5 class="modal-title"--}}
{{--                                                                id="exampleModalLabel">Sheer--}}
{{--                                                                Straight Kurta</h5>--}}
{{--                                                            <button type="button" class="close"--}}
{{--                                                                    data-dismiss="modal"--}}
{{--                                                                    aria-label="Close"><span--}}
{{--                                                                    aria-hidden="true">&times;</span>--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-body"><img--}}
{{--                                                                src="{{url('design')}}/theme/assets/images/size-chart.jpg"--}}
{{--                                                                alt=""--}}
{{--                                                                class="img-fluid blur-up lazyload">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}


{{--                                        <div class="size-box">--}}

{{--                                            @foreach($product->size_data()->where('size_show',1)->get() as $size)--}}

{{--                                                <input type="radio" class="" name="size_data"--}}
{{--                                                       value="{{$size->size_data}}"--}}
{{--                                                       checked>{{$size->size_data}}--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}


{{--                                        <div class=" select-outline ">--}}
{{--                                            <p class="grey-text">Choose your Primary Color</p>--}}
{{--                                            <select name="color" id="color"--}}
{{--                                                    class="mdb-select md-form md-outline colorful-select dropdown-dark">--}}
{{--                                                <option value="" disabled selected>Choose your--}}
{{--                                                    color--}}
{{--                                                </option>--}}
{{--                                                @foreach($product->other_data()->where('data_value',1)->get() as $other)--}}
{{--                                                    <option--}}
{{--                                                        value="{{$other->color->name_ar}}">{{$other->color->name_ar}} </option>--}}
{{--                                                @endforeach--}}
{{--                                                @foreach($product->other_data()->where('data_value',0)->get() as $other)--}}
{{--                                                    <option disabled--}}
{{--                                                            value="{{$other->color->name_ar}}">{{$other->color->name_ar}}</option>--}}
{{--                                                @endforeach--}}


{{--                                            </select>--}}

{{--                                        </div>--}}

{{--                                        <textarea name="notes" id="notes" cols="30" rows="3"--}}
{{--                                                  class="form-control">Notes</textarea>--}}

{{--                                        @if ($product->price_offer>0  and  $product->status == "active")--}}
{{--                                            <input type="hidden" name="price" id="price"--}}
{{--                                                   value="{{$product->price_offer}}">--}}
{{--                                        @else--}}
{{--                                            <input type="hidden" name="price" id="price"--}}
{{--                                                   value="{{$product->price}}">--}}
{{--                                        @endif--}}

{{--                                        <div class="product-buttons">--}}
{{--                                            <button class="btn btn-solid" id="butsave">add to cart--}}
{{--                                            </button>--}}
{{--                                            <a href="#" class="btn btn-solid">buy now</a>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <a href="#" class="btn  btn-rounded disabled btn-block"--}}
{{--                                           style="border-radius: 50px;color:white; background-color: #ff7675 ">--}}
{{--                                            <i class="fas fa-frown mr-2" aria-hidden="true"></i>--}}
{{--                                            Sold Out--}}
{{--                                        </a>--}}
{{--                                    @endif--}}


{{--                                @endif--}}


{{--                        </form>--}}


{{--                        <div class="border-product mt-6">--}}
{{--                            <h6 class="product-title">product details</h6>--}}
{{--                            <p>{{$content}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="border-product">--}}
{{--                            <h6 class="product-title">share it</h6>--}}
{{--                            <div class="product-icon">--}}
{{--                                <ul class="product-social">--}}
{{--                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>--}}
{{--                                </ul>--}}
{{--                                <form class="d-inline-block">--}}
{{--                                    <button class="wishlist-btn"><i class="fa fa-heart"></i><span--}}
{{--                                            class="title-font">Add To WishList</span></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <br>--}}

{{--


{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--</section>--}}


{{--@endsection--}}
