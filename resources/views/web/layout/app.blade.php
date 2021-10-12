<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce - Home</title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="{{asset('web/vendors/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('web/vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('web/vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/vendors/owl-carousel/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
</head>
<body>
<!--================ Start Header Menu Area =================-->
@include('web.layout.topbar')
<!--================ End Header Menu Area =================-->

@yield('content')

<!--================ Start footer Area  =================-->
@include('web.layout.footer')
<!--================ End footer Area  =================-->


<script src="{{asset('web/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('web/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('web/vendors/skrollr.min.js')}}"></script>
<script src="{{asset('web/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('web/vendors/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('web/vendors/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset(('web/vendors/mail-script.js'))}}"></script>
<script src="{{asset('web/js/main.js')}}"></script>

@stack('js')

</body>
</html>
