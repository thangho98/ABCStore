<!doctype html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - ABC Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('public/abcstore')}}/img/favicon.ico">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('public/abcstore')}}/css/responsive.css">

    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">

    <!-- Modernizer js -->
    <script src="{{asset('public/abcstore')}}/js/vendor/modernizr-3.5.0.min.js"></script>

    <link rel="stylesheet" href="{{asset('public/abcstore')}}/mystyle.css">
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper">

        @include('abcstore.layout.header')

        @yield('main')

        @include('abcstore.layout.footer')
    </div>
    <!-- Main Wrapper End Here -->
    <!-- jquery 3.2.1 -->
    <script src="{{asset('public/abcstore')}}/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Countdown js -->
    <script src="{{asset('public/abcstore')}}/js/jquery.countdown.min.js"></script>
    <!-- Mobile menu js -->
    <script src="{{asset('public/abcstore')}}/js/jquery.meanmenu.min.js"></script>
    <!-- ScrollUp js -->
    <script src="{{asset('public/abcstore')}}/js/jquery.scrollUp.js"></script>
    <!-- Nivo slider js -->
    <script src="{{asset('public/abcstore')}}/js/jquery.nivo.slider.js"></script>
    <!-- Fancybox js -->
    <script src="{{asset('public/abcstore')}}/js/jquery.fancybox.min.js"></script>
    <!-- Jquery nice select js -->
    <script src="{{asset('public/abcstore')}}/js/jquery.nice-select.min.js"></script>
    <!-- Jquery ui price slider js -->
    <script src="{{asset('public/abcstore')}}/js/jquery-ui.min.js"></script>
    <!-- Owl carousel -->
    <script src="{{asset('public/abcstore')}}/js/owl.carousel.min.js"></script>
    <!-- Bootstrap popper js -->
    <script src="{{asset('public/abcstore')}}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('public/abcstore')}}/js/bootstrap.min.js"></script>
    <!-- Plugin js -->
    <script src="{{asset('public/abcstore')}}/js/plugins.js"></script>
    <!-- Main activaion js -->
    <script src="{{asset('public/abcstore')}}/js/main.js"></script>
    @yield('scriptjs')
</body>

</html>