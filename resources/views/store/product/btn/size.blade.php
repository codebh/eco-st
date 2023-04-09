@push('js')
    <script>

// $('.select2').select2({
//         theme:'bootstrap4'
//     });
    $('.select2').select2({
        dropdownParent: $('#del_admin')
    });
    </script>


@endpush

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-warning " data-toggle="modal" data-target="#del_admin{{$id}}"><i class="fas fa-ruler"></i></button>

<!-- Modal -->
<div id="del_admin{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('shop.req_mag')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {!! Form::open(['route'=>['product.abayaSize',$id],'method'=>'post']) !!}
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">{{ trans('shop.req_mag1') }}</label>
                            <div class="form-check checkbox-xl">
                                <input type="checkbox"  id="checkboxPrimary1" value="a_size1" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$id)->where('size_abaya','a_size1')->exists() ? 'checked' : '' }} >
                                <label for="checkboxPrimary1">
                                    {{ trans('shop.size1') }}
                                </label>
                              </div>

                              <div class="form-check checkbox-lg">
                                <input type="checkbox" id="checkboxPrimary2 " value="a_size2" name='my_name[]'  {{ \App\Models\SizeAbaya::where('product_id',$id)->where('size_abaya','a_size2')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary2">
                                    {{ trans('shop.size2') }}
                                </label>
                              </div>
                            <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary3" value="a_size3" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$id)->where('size_abaya','a_size3')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary3">
                                    {{ trans('shop.size3') }}
                                </label>
                              </div>

                              <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary4" value="a_size4" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$id)->where('size_abaya','a_size4')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary4">
                                    {{ trans('shop.size4') }}
                                </label>
                              </div>
                            <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary5" value="a_size5" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$id)->where('size_abaya','a_size5')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary5">
                                    {{ trans('shop.size5') }}
                                </label>
                              </div>

                              <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary6" value="a_size6" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$id)->where('size_abaya','a_size6')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary6">
                                    {{ trans('shop.size6') }}
                                </label>
                              </div>

<br>

                    <br>










                    <script type="text/javascript">​
                        // Event handler activates when value of input with specified name is changed
                        $("input[name=my_name]").on("change", function(event) {
                            // checks if checkbox was checked, if so - deletes it
                            if (true === $(this).prop('checked')) $(this).remove();
                        });​
                    </script>

                        </div>
                        <button type="submit" style="background-color: #726189;color: white"  class="btn btn-lg btn-block">{{ trans('shop.update') }}</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.no')}}</button>
                {{-- {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger ']) !!} --}}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>

