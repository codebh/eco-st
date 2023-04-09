@if(count($errors->all())>0)
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Required!</h5>
                @foreach($errors->all() as $error)
                    <p></p>
                    <p class="mb-0">{{$error}}</p>
                @endforeach
            </div>
        </div>
    </div>




@endif


{{--@if(session()->has('success_message'))--}}


{{--    <div class="row">--}}
{{--        <div class="col-md-6 offset-3">--}}
{{--            <div class="alert alert-success alert-dismissible">--}}
{{--                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
{{--                <h5><i class="icon fas fa-check"></i> Success!</h5>--}}
{{--                {{session('success_message')}}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




{{--@endif--}}


{{--@if(session()->has('error_message'))--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 offset-3">--}}
{{--            <div class="alert alert-danger alert-dismissible">--}}
{{--                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
{{--                <h5><i class="icon fas fa-ban"></i> UnSuccess!</h5>--}}

{{--                <p></p>--}}
{{--                <p class="mb-0">{{session('error_message')}}</p>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--@endif--}}
