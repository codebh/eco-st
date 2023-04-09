<div>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{trans('shop.main_image')}}</h3>
        </div>
        <div class="card-body">
            <table class=" table table-bordered text-center">
                <thead>

                </thead>
                <tbody>

                <tr>

                    <td>
                        <label for="">{{trans('shop.main_image')}}</label>
                        <input type="file"  class="form-control @error('image')is-invalid @enderror" wire:model="image"  >
                        <div wire:loading wire:target="image">Uploading...</div>
                        @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                        <p>{{session('lang')=='ar' ? 'تأكد من تحديث الصورة' : 'Make sure to updated the image '}}</p>
                    </td>

                    <td>
                        <img src=" {{ imageDo($main_image) }}" id="image" style="width: 120px;" alt="..." class="img-thumbnail">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" wire:model="product_id">
                        <button type="button"style="background-color:#726189;color:white" wire:click.prevent="update()" class="btn  btn-lg btn-block ">{{ trans('shop.update') }}</button>
                    </td>
                </tr>


                </tbody>
            </table>

         </div>
        <!-- /.card-body -->
    </div>




</div>
