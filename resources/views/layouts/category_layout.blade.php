<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/assets/front/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/assets/front/images/apple-touch-icon.png">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/assets/front/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="/assets/front/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/front/style.css" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="/assets/front/css/animate.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="/assets/front/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="/assets/front/css/colors.css" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="/assets/front/css/version/marketing.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">
    @include('layouts.header')

    @yield('category-header')

    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    @include('layouts.sidebar')
                </div><!-- end col -->

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                    @yield('content')

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@include('layouts.footer')
    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="/assets/front/js/jquery.min.js"></script>
<script src="/assets/front/js/tether.min.js"></script>
<script src="/assets/front/js/bootstrap.min.js"></script>
<script src="/assets/front/js/animate.js"></script>
<script src="/assets/front/js/custom.js"></script>

</body>
</html>
