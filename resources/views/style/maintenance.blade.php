{{--@extends('style.index')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="alert alert-danger">--}}
{{--              <h1 class="text-center">{!! setting()->message_maintenance !!}</h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tafseel </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('img/Logo T1.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('coming')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('coming')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('coming')}}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('coming')}}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('coming')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{url('coming')}}/css/main.css">
    <!--===============================================================================================-->
</head>
<body>


<div class="size1 bg0 where1-parent">
    <!-- Coutdown -->
    <div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('img/about13.jpg');">
        <!--			<div class="wsize2 flex-w flex-c-m cd100 js-tilt">--><!---->
        <!--				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">-->
        <!--					<span class="l2-txt1 p-b-9 days">35</span>-->
        <!--					<span class="s2-txt4">Days</span>-->
        <!--				</div>-->

        <!--				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">-->
        <!--					<span class="l2-txt1 p-b-9 hours">17</span>-->
        <!--					<span class="s2-txt4">Hours</span>-->
        <!--				</div>-->

        <!--				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">-->
        <!--					<span class="l2-txt1 p-b-9 minutes">50</span>-->
        <!--					<span class="s2-txt4">Minutes</span>-->
        <!--				</div>-->

        <!--				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">-->
        <!--					<span class="l2-txt1 p-b-9 seconds">39</span>-->
        <!--					<span class="s2-txt4">Seconds</span>-->
        <!--				</div>-->
        <!--			</div>-->
    </div>

    <!-- Form -->
    <div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
        <div class="wrap-pic1">
            <img src="{{asset('design/theme/assets/images/Logo-01.png')}}" alt="LOGO">
        </div>

        <div class="p-t-50 p-b-60">
            <p class="m1-txt1 p-b-36">
                 <span class="m1-txt2">{{ setting()->message_maintenance }}</span>
            </p>
            <p class="m1-txt1 p-b-36">
                Our website is <span class="m1-txt2">Coming Soon</span>, You can join as a seller Now!
            </p>

            <form class="contact100-form validate-form">

                <div class="w-full">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSd6Kogr67hirpJtVj70JPEJJxJpoANXB6HpqJw9xhPz14vRcg/viewform?usp=sf_link" style="background-color: #726189" class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04">
                        Register
                    </a>
                </div>
            </form>


        </div>

        <div class="flex-w">
            <a href="https://wa.link/wv1lby" class="flex-c-m size5 bg3 how1 trans-04 m-r-5">
                <i class="fa fa-whatsapp"></i>
            </a>

            <a href="https://instagram.com/tafseelplatform?igshid=1vwf8ln0z561i" class="flex-c-m size5 bg4 how1 trans-04 m-r-5">
                <i class="fa fa-instagram"></i>
            </a>


        </div>

    </div>
</div>





<!--===============================================================================================-->
<script src="{{url('coming')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('coming')}}/vendor/bootstrap/js/popper.js"></script>
<script src="{{url('coming')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('coming')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('coming')}}/vendor/countdowntime/moment.min.js"></script>
<script src="{{url('coming')}}/vendor/countdowntime/moment-timezone.min.js"></script>
<script src="{{url('coming')}}/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="{{url('coming')}}/vendor/countdowntime/countdowntime.js"></script>
<script>
    $('.cd100').countdown100({
        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: 0,
        endtimeMonth: 0,
        endtimeDate: 35,
        endtimeHours: 18,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: ""
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });
</script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{url('coming')}}/js/main.js"></script>

</body>
</html>
