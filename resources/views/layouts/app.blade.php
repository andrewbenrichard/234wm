<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
<title>  {{$title}} | 234 Waste Managers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="234 Waste Managers">
    <meta name="keywords" content="234 Waste Managers">
    <meta name="author" content="234 Waste Managers">
    

    <link rel="stylesheet" href="/public/front/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="/public/front/css/plugins/plugins.min.css">


    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/css/style.css">

<link rel="shortcut icon" href="images/234wm.png" type="image/x-icon">
<link rel="icon" href="images/234wm.png" type="image/x-icon">

</head>
<body>
  <div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    
 @include('layouts.front_header')	

        @yield('content')

            @include('layouts.front_extras')
  </div>
      <!-- JS
    ============================================ -->
        <!-- Modernizer JS -->
        <script src="/public/front/js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- jQuery JS -->
        <script src="/public/front/js/vendor/jquery-3.3.1.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="/public/front/js/vendor/bootstrap.min.js"></script>

        <!-- Swiper Slider JS -->
        <script src="/public/front/js/plugins/swiper.min.js"></script>

        <!-- Light gallery JS -->
        <script src="/public/front/js/plugins/lightgallery.min.js"></script>

        <!-- Waypoints JS -->
        <script src="/public/front/js/plugins/waypoints.min.js"></script>

        <!-- Counter down JS -->
        <script src="/public/front/js/plugins/countdown.min.js"></script>

        <!-- Isotope JS -->
        <script src="/public/front/js/plugins/isotope.min.js"></script>

        <!-- Masonry JS -->
        <script src="/public/front/js/plugins/masonry.min.js"></script>

        <!-- ImagesLoaded JS -->
        <script src="/public/front/js/plugins/images-loaded.min.js"></script>

        <!-- Wavify JS -->
        <script src="/public/front/js/plugins/wavify.js"></script>

        <!-- jQuery Wavify JS -->
        <script src="/public/front/js/plugins/jquery.wavify.js"></script>

        <!-- circle progress JS -->
        <script src="/public/front/js/plugins/circle-progress.min.js"></script>

        <!-- counterup JS -->
        <script src="/public/front/js/plugins/counterup.min.js"></script>

        <!-- wow JS -->
        <script src="/public/front/js/plugins/wow.min.js"></script>

        <!-- animation text JS -->
        <script src="/public/front/js/plugins/animation-text.min.js"></script>

        <!-- Vivus JS -->
        <script src="/public/front/js/plugins/vivus.min.js"></script>

        <!-- Some plugins JS -->
        <script src="/public/front/js/plugins/some-plugins.js"></script>


        <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->

        <!--
    <script src="/public/front/js/plugins/plugins.min.js"></script>
    -->

        <!-- Main JS -->
        <script src="/public/front/js/main.js"></script>
</body>
</html>
