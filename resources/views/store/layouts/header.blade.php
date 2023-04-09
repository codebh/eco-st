<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon">

    <title>{{ !empty($title)?$title:trans('admin.adminpanel') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <link rel="stylesheet" href="{{url('/design/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('/')}}/design/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('design/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('design/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('design/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('design/admin/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('design/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">



    @livewireStyles

    @if(direction()=='ltr')
        <link rel="stylesheet" href="{{asset('design/admin/dist/css/adminlte.css')}}">
{{--        <link rel="stylesheet" href="{{asset('design/admin/dist/css/AdminLTE.css')}}">--}}


    @else
        <style>
            /*product-image{max-width:100%;height:auto;width:100%}*/
            .product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}
            .product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}
            .product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}
            .product-image-thumb:hover{opacity:.5}
        </style>
        <link rel="stylesheet" href="{{url('/')}}/design/admin/rtl/adminlte.css">
        <link rel="stylesheet" href="{{url('/')}}/design/admin/rtl/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="{{url('/')}}/design/admin/rtl/custom-style.css">
        {{--            <link rel="stylesheet" href="{{url('/')}}/design/admin/rtl/persian-datepicker.min.css">--}}
        {{--    font--}}
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,600&display=swap&subset=arabic,latin-ext" rel="stylesheet">
        <style type="text/css">
            html,body,h1,h2,h3,h4,h5,h6,label,input,textarea,select,option,table{
                font-family: 'Cairo', sans-serif;
            }
        </style>


    @endif


<!-- Google Font: Source Sans Pro -->
    {{--        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
