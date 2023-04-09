<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" >
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.show') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            {!! Form::open(['url'=>aurl('products/state/'.$id)]) !!}
            <div class="col">
                <div class="form-group">
                    {!! Form::label('status',trans('admin.status')) !!}
                    {!! Form::select('status',
                    [
                        'not active'=>trans('admin.not active_sale'),
                        'active'=>trans('admin.active_sale'),
                        'pending'=>trans('admin.pending'),
                        ]
                    ,$show,
                    ['class'=>'form-control status','placeholder'=>trans('admin.status')]) !!}
                </div>
            </div>


            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}


        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      {{-- </div>
    </div>
  </div>  --}}
  {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg{{$id}}">
    <i class="fa fa-truck-loading"></i>
</button> --}}

<div class="modal fade" id="modal-lg{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('admin.show') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{aurl('products_change/state/'.$id)}}" method='post'>
                {{ csrf_field() }}
                <button type="submit">click</button>
                </form> --}}

                {!! Form::open(['url'=>aurl('products_change/state/'.$id),'method'=>'post']) !!}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('show',trans('admin.show')) !!}
                            {!! Form::select('show',
                            [
                                'approved'=>trans('admin.approved'),
                                'pending'=>trans('admin.pending'),
                                'delete'=>trans('admin.delete'),
                                'active'=>trans('admin.active'),
                                'not active'=>trans('admin.not active'),
                            ]
                            ,$show,['class'=>'form-control status']) !!}
                        </div>
                    </div>



                </div>


                {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            {{-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@if ($show == 'pending')

    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg{{$id}}">
        <i class="fa fa-info"></i>
    </button>


@elseif($show =='not active')


    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-lg{{$id}}">
        <i class="fas fa-ban"></i>
    </button>
@elseif($show =='active')



<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg{{$id}}">
    <i class="fas fa-tshirt"></i>
</button>


@elseif($show =='delete')



<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg{{$id}}">
    <i class="fas fa-trash-alt"></i>
</button>


@elseif($show =='approved')



<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg{{$id}}">
    <i class="fas fa-check"></i>
</button>





@else
@endif
