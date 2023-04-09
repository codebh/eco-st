@extends('admin.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       <h3 class="card-title">{{$title}}</h3>
                       <h3 class="card-title">{{$now}}</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <form action="{{aurl('months')}}" method="post">
                            {{csrf_field()}}
                         <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{trans('admin.other_data')}}</label>
                                    <input class="form-control" type="month" name="date" value="{{old('date')}}"  >
                                </div>
                            </div>
{{--                            <div class="col-md-3">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">{{trans('admin.shop_id')}}</label>--}}
{{--                                    <select name="store_id" class="form-control" >--}}
{{--                                        @foreach(App\Models\Store::all() as $store)--}}
{{--                                        <option value="{{$store->id}}">{{$store->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                        <option value="2">2</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                             <div class="col-md-3">--}}
{{--                                 <div class="form-group">--}}
{{--                                     <label for="">{{trans('admin.other_data')}}</label>--}}
{{--                                     <input class="form-control" type="text" name="percentage" value="{{old('percentage')}}"  >--}}
{{--                                 </div>--}}
{{--                             </div>--}}
                             <div class="col-md-3">
                                 <label for="">create</label>
                                 <button class=" btn btn-primary btn-block"> add</button>
                             </div>
                         </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->



@endsection
{{--@push('js')--}}
{{--    <script type="text/javascript">--}}
{{--        $('#datetimepicker').datetimepicker({--}}
{{--            format: 'yyyy-mm-dd'--}}
{{--        });--}}
{{--    </script>--}}

{{--@endpush--}}
