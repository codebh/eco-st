<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    {{-- <h2>check:{{$check_product}}</h2>
    <h2>product:{{$product_id}}</h2>
    <h2>user:{{$user_id}}</h2> --}}
    {{-- <h2>user:{{$fav_item['product_id']}}</h2>
    <h2>user:{{$fav_id}}</h2> --}}



    @if ($check_product == 1)
    <div class="product-buttons">
        <button wire:click.prevent="removeFav({{ $user_id}}, '{{ $product_id }}')"  type="submit" id="cartEffect" class="btn  hover-solid btn-animation"><i class="fa fa-heart me-1" style="color: #726189" aria-hidden="true"></i></button>
        {{-- <a href="#" class="btn btn-solid"><i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>wishlist</a> --}}
        <div wire:loading.delay.long>
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
    </div>

    @else
    <div class="product-buttons">
        <button wire:click.prevent="addFav({{ $user_id}}, '{{ $product_id }}')"  wire:loading.class="bg-gray" type="submit" id="cartEffect" class="btn  hover-solid btn-animation"><i class="fa fa-heart me-1" aria-hidden="true"></i></button>
        {{-- <a href="#" class="btn btn-solid"><i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>wishlist</a> --}}
        <div wire:loading.delay.long>
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>
    </div>

    @endif








</div>
