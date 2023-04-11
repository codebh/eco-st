{{-- @push('js')
    <script>

// $('.select2').select2({
//         theme:'bootstrap4'
//     });
    $('.select2').select2({
        dropdownParent: $('#del_admin')
    });
    </script>


@endpush --}}
@if ($category_id == 1)

<a  href="{{surl('showShop/abayaSize/'.$title)}}" class="btn btn-warning mb-1" ><i class="fas fa-ruler"></i></a>

@forelse (\App\Models\SizeAbaya::where('product_id',$id)->get() as $item )
{{-- <ul style="margin-bottom: 0px;' font-size: 10px"> --}}
    @if ($item->size_abaya =='a_size1')

    <p style="margin-bottom: 0px; font-size: 11px">{{ trans('shop.size1') }}</p>
    @elseif($item->size_abaya =='a_size2')
    <p style=" margin-bottom: 0px; font-size: 11px">{{ trans('shop.size2') }}</p>
    @elseif($item->size_abaya =='a_size3')
    <p style="margin-bottom: 0px; font-size: 11px">{{ trans('shop.size3') }}</p>
    @elseif($item->size_abaya =='a_size4')
    <p style="margin-bottom: 0px; font-size: 11px">{{ trans('shop.size4') }}</p>
    @elseif($item->size_abaya =='a_size5')
    <p style="margin-bottom: 0px; font-size: 11px">{{ trans('shop.size5') }}</p>
    @elseif($item->size_abaya =='a_size6')
    <p style="margin-bottom: 0px; font-size: 11px">{{ trans('shop.size6') }}</p>


    @endif
</ul>


@empty


@endforelse



@endif

