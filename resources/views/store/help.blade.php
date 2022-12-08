@extends('store.index')
@section('content')
    {{--    <!-- Content Header (Page header) -->--}}
    {{--    <section class="content-header">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row mb-2">--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <h1>Profile</h1>--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <ol class="breadcrumb float-sm-right">--}}
    {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
    {{--                        <li class="breadcrumb-item active">User Profile</li>--}}
    {{--                    </ol>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div><!-- /.container-fluid -->--}}
    {{--    </section>--}}

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>{{ trans('shop.help') }}</h1>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>

          <!-- Main content -->
          <section class="content">
              <div class="row">
                  <div class="col-12" id="accordion">


                            @forelse (\App\Models\Guide::where('lang',session('lang') =='ar'?'ar':'en')->orderBy('serial', 'asc')->get() as $item )


                            {{-- @if ($loop->first)
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne{{$item->id}}">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            {{$item->question}}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseOne{{$item->id}}" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <iframe class="embed-responsive-item" src="{{$item->answer}}" allowfullscreen></iframe>

                                    </div>
                                </div>
                            </div>

                            @endif --}}

                            <div class="card  card-outline" >
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne{{$item->id}}">
                                    <div class="card-header" style="background-color: #726189 ;">
                                        <h4 class="card-title w-100" style="color: white">
                                            {{$item->question}}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseOne{{$item->id}}" class="collapse {{$loop->first ? 'show':''}}" data-parent="#accordion">
                                    <div class="card-body">
                                        <iframe class="embed-responsive-item" src="{{$item->answer}}" allowfullscreen></iframe>

                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            1. Lorem ipsum dolor sit amet
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    </div>
                                </div>
                            </div>
                            @endforelse



                  </div>
              </div>

          </section>
          <!-- /.content -->
@endsection
