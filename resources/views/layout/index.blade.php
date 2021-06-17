<!DOCTYPE html>
<html>
    <head>
        @yield('seo')
        <!--
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        -->
<!--        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">-->
        <link rel="stylesheet" href="{{asset('css/bootstrapmin.css')}}">
<!--        <link rel="stylesheet" href="{{asset('css/stylemenu.css')}}">-->
         <link rel="stylesheet" href="{{asset('css/stylemenumin.css')}}">
<!--        <link rel="stylesheet" href="{{asset('css/style.css')}}">-->
        <link rel="stylesheet" href="{{asset('css/stylemin.css')}}">
        <link rel="stylesheet" href="{{asset('css/aos.css')}}">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet"> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src='https://www.google.com/recaptcha/api.js'></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->                  <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127863575-1"></script>
        <!--         corousel galery-->
<!--   automatic move <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>-->
<!--        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>-->
        <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <style>
            body {
                overflow-x: hidden;
            }
            .row {
                padding-right: 0px!important;
                margin-right: 0px!important;
            }
        </style>
    </head>
    <body data-aos="fade-in" style="min-height:100%" class="bodyprimary">
        <div class="row">
            <div class="contheader">
                @section('header')
                @include('layout.header')
                @show
            </div>
            @yield('content')
            @show
            @section('footer')
            @include('layout.footer')
            @show
        </div>
        <script>
$(document).ready(function () {
    $(".preloader").fadeOut(4000);
    $('.navbar-fostrap').click(function () {
        $('.nav-fostrap').toggleClass('visible');
        $('body').toggleClass('cover-bg');
    });
});
        </script>
        <script src="{{asset('js/aos.js')}}"></script>

        <script>
AOS.init({
    duration: 1200,
});
        </script>
    </body>
</html>