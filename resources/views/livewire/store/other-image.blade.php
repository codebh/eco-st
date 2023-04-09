<div>


    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">{{trans('shop.other_image')}}</h3>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">{{ trans('shop.other_image') }}</label>
                        <input type="file" id="images" class="form-control" wire:model="images" multiple >
                        {{-- <input type="file" id="miofile" wire:model="miofile" multiple> --}}

                        <div wire:loading wire:target="images">Uploading...</div>
                        @error('images.*') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>

           <div class="row">
            <table class="table  table-bordered text-center">

                <tbody>
                    @foreach ($other_images as $image)
                    @if ($loop->first)
                    <tr>
                        <th> ({{count($other_images)}}) {{ trans('shop.uploaded_images') }}</th>

                        <th>{{ trans('shop.delete') }}</th>
                    </tr>
                    {{-- foreach --}}
                    <tr>
                        <td scope="row">
                            <img src="{{imageDo($image->image_key)}}" style="width: 120px;" alt="..." class="img-thumbnail">
                        </td>
                        <td>
                               <button wire:click="delete_image({{ $image->id }}) type="button" name="" id="" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>

                        </td>
                    </tr>

                    @else
                    <tr>
                        <td scope="row">
                            <img src="{{imageDo($image->image_key)}}" style="width: 120px;" alt="..." class="img-thumbnail">
                        </td>
                        <td>
                                    <button wire:click.prevent="delete_image({{ $image->id }}) type="button" name="" id="" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                        </td>
                    </tr>

                    @endif


                    @endforeach

                </tbody>
            </table>
           </div>
         </div>
        <!-- /.card-body -->
    </div>
</div>
