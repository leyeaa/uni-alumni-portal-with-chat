<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>{{!empty($page) ? $page=$page:$page="Details"}} :: Alumni Portal - University of Medical Sciences, Ondo</title>
    @if ($page!="Alumni Details")
        <script src="//unpkg.com/alpinejs" defer></script>
    @endif

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/png">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  
</head>

<body>
   
   <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
   
    @include('partials._header')
    @if ($page!="Home")
        @include('partials._pages-header')
    @endif
   
    {{$slot}}
   
    @include('partials._footer')
    
    <x-flash-message />
    
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="{{asset('js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{asset('js/slick.min.js')}}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    
    <!--====== Nice Select js ======-->
    {{-- <script src="{{asset('js/jquery.nice-select.min.js')}}"></script> --}}
    
    <!--====== Nice Number js ======-->
    <script src="{{asset('js/jquery.nice-number.min.js')}}"></script>
    
    <!--====== Count Down js ======-->
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    
    <!--====== Validator js ======-->
    <script src="{{asset('js/validator.min.js')}}"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{asset('js/ajax-contact.js')}}"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('js/main.js')}}"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{asset('js/map-script.js')}}"></script>

</body>

</html>