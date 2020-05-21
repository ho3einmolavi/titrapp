<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.crumina.net/html-olympus/06-ProfilePage.html by HTTrack Website Copier/3.x [XR&CO'1395], Wed, 02 Jan 2019 07:22:47 GMT -->

<head>

    <title> @yield('title') - تیتر اَپ</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" sizes="512x512" href="/theme/img/titrapp.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/theme/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/theme/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/theme/Bootstrap/dist/css/bootstrap-grid.css">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="/theme/css/main.min.css">
@yield('style')


    <!-- Main Font -->
    <script src="/theme/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>


</head>

<body>




@include('front.sections.sidebar')




@include('front.sections.header')






@yield('content')


@include('front.sections.footer')

</div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->

<a class="back-to-top" href="#">
    <img src="/theme/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>
<!-- JS Scripts -->
<script src="/theme/js/jquery-3.2.1.js"></script>
<script src="/theme/js/jquery.appear.js"></script>
<script src="/theme/js/jquery.mousewheel.js"></script>
<script src="/theme/js/perfect-scrollbar.js"></script>
<script src="/theme/js/jquery.matchHeight.js"></script>
<script src="/theme/js/svgxuse.js"></script>
<script src="/theme/js/imagesloaded.pkgd.js"></script>
<script src="/theme/js/Headroom.js"></script>
<script src="/theme/js/velocity.js"></script>
<script src="/theme/js/ScrollMagic.js"></script>
<script src="/theme/js/jquery.waypoints.js"></script>
<script src="/theme/js/jquery.countTo.js"></script>
<script src="/theme/js/popper.min.js"></script>
<script src="/theme/js/material.min.js"></script>
<script src="/theme/js/bootstrap-select.js"></script>
<script src="/theme/js/smooth-scroll.js"></script>
<script src="/theme/js/selectize.js"></script>
<script src="/theme/js/swiper.jquery.js"></script>
<script src="/theme/js/moment.js"></script>
<script src="/theme/js/daterangepicker.js"></script>
<script src="/theme/js/simplecalendar.js"></script>
<script src="/theme/js/fullcalendar.js"></script>
<script src="/theme/js/isotope.pkgd.js"></script>
<script src="/theme/js/ajax-pagination.js"></script>
<script src="/theme/js/Chart.js"></script>
<script src="/theme/js/chartjs-plugin-deferred.js"></script>
<script src="/theme/js/circle-progress.js"></script>
<script src="/theme/js/loader.js"></script>
<script src="/theme/js/run-chart.js"></script>
<script src="/theme/js/jquery.magnific-popup.js"></script>
<script src="/theme/js/jquery.gifplayer.js"></script>
<script src="/theme/js/mediaelement-and-player.js"></script>
<script src="/theme/js/mediaelement-playlist-plugin.min.js"></script>
<script src="/theme/js/ha-solardate.min.js"></script>
<script src="/theme/js/ha-datetimepicker.min.js"></script>

<script src="/theme/js/base-init.js"></script>

<script src="/theme/Bootstrap/dist/js/bootstrap.bundle.js"></script>

@yield('script')

@include('sweetalert::alert')

</body>

<!-- Mirrored from html.crumina.net/html-olympus/06-ProfilePage.html by HTTrack Website Copier/3.x [XR&CO'1395], Wed, 02 Jan 2019 07:23:03 GMT -->

</html>
