<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trummohinh.com | @yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/front_end/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/front_end/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/front_end/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/front_end/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/front_end/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/front_end/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/front_end/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/front_end/css/style.css" type="text/css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> -->




</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    @include('users.layout.header')

    @include('users.layout.slide2')

    @yield('content')

    @include('users.layout.footer')

    <!-- Js Plugins -->
    <script src="/front_end/js/jquery-3.3.1.min.js"></script>
    <script src="/front_end/js/bootstrap.min.js"></script>
    <script src="/front_end/js/jquery.nice-select.min.js"></script>
    <script src="/front_end/js/jquery-ui.min.js"></script>
    <script src="/front_end/js/jquery.slicknav.js"></script>
    <script src="/front_end/js/mixitup.min.js"></script>
    <script src="/front_end/js/owl.carousel.min.js"></script>
    <script src="/front_end/js/main.js"></script>

<!-- alert ---- -------------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- ---------------------------------->
@if(Session::has('alert'))
    <script>
        swal("Chúc Mừng!", "{!!  Session::get('alert') !!}", "success", {
            button:'ok',
        })
    </script>
@endif
@if(Session::has('error'))
    <script>
        swal("Lỗi!", "{!!  Session::get('error') !!}", "error", {
            button:'ok',
        })
    </script>
@endif

</body>

</html>
