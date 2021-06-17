<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <!--
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/styleadminmenu.css')}}">
        <link rel="stylesheet" href="{{asset('css/styleadmin.css')}}">
        <link rel="stylesheet" href="{{asset('css/aos.css')}}">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <style>

        </style>     

    </head>
    <body>
        @section('header')
        @include('layout.sidemenu_admin')
        @show

        <div id="content-wrapper">
            @yield('content')
            @section('footer')
            @include('layout.footer_admin')
            @show
        </div>
        <!--
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        -->


        <script src="{{asset('js/indexmenu.js')}}"></script>
        <script src="{{asset('js/aos.js')}}"></script>

        <script>
AOS.init({
    duration: 1200,
});
        </script>

    </body>