<div>
    <!-- /.row -->
    <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">{{ trans('admin.faqs') }}</h3>

             <div class="card-tools">
               <div class="input-group input-group-sm" style="width: 150px;">
                 {{-- {{ $products->links('vendor.livewire.bootstrap') }} --}}
                 <div class="input-group-append">
                 </div>
               </div>
             </div>
           </div>
           <!-- /.card-header -->
           <div class="card-body table-responsive p-0">
             <table class="table table-hover text-nowrap">
               <thead>
                 <tr>
                   <th>#</th>
                   <th>{{ trans('admin.question') }} </th>
                   <th>{{ trans('admin.answer') }} </th>
                   <th>{{ trans('admin.lang') }} </th>
                   <th>{{ trans('admin.edit') }} </th>
                   <th>{{ trans('admin.delete') }} </th>

                 </tr>
               </thead>
               <tbody wire:sortable="updateOrder">
                   @forelse ($products as $product)
               <tr wire:sortable.item="{{ $product->id }}" wire:key="product-{{ $product->id }}">
                   <td>{{ $product->serial }}</td>
                   <td>{{ $product->question }}</td>
                   <td>{{ $product->answer }}</td>
                   <td>{{ $product->lang }}</td>
                   <td><a class="btn btn-info" href="{{ route('guide.edit',$product->id) }}"><i class="fas fa-edit    "></i></a></td>

                   <td><a class="btn btn-danger" href="{{ '/admin/guide/'.$product->id }}"><i class="fas fa-trash    "></i></a></td>



                 </tr>
                 @empty
                 <tr>
                     <td colspan="3">No products found.</td>
                 </tr>
             @endforelse

               </tbody>
             </table>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
     </div>
     <!-- /.row -->



       {{-- <table class="table mt-4">
           <thead>
           <tr>
               <th>Name</th>
               <th></th>
           </tr>
           </thead>
           <tbody wire:sortable="updateOrder">
           @forelse ($products as $product)
               <tr wire:sortable.item="{{ $product->id }}" wire:key="product-{{ $product->id }}">
                   <td>{{ $product->question }}</td>
                   <td>
                       <a href="#" class="btn btn-sm btn-primary">Edit</a>
                       <button class="btn btn-sm btn-danger">Delete</button>
                   </td>
               </tr>
           @empty
               <tr>
                   <td colspan="3">No products found.</td>
               </tr>
           @endforelse
           </tbody>
       </table> --}}
   </div>
