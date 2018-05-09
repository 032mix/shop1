<!DOCTYPE html>
<html>
<head>
    <title>Best Store</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- //js -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- timer -->
    <link rel="stylesheet" href="{{ asset('css/jquery.countdown.css') }}"/>
    <!-- //timer -->
    <!-- animation-effect -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
    <!-- datatables -->
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- //datatables -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

@include ('layouts.header')

@yield ('content')

@include ('layouts.footer')

</body>
</html>