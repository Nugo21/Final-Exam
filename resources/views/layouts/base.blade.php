<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">

    <meta name="language" content="{{app()->getLocale()}}">

    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="author" content="insite.international">
    <link href="/favicon.ico" rel="shortcut icon">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/auth/css/style.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="/assets/css/owl.css">

    @yield('head')

    {{--    <title> volta - Home </title>--}}
</head>

<body>


@include('components.header')
@yield('content')
@include('components.footer')

<!-- regular js-->


    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- Additional Scripts -->
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/owl.js"></script>
    <script src="/assets/js/slick.js"></script>
    <script src="/assets/js/isotope.js"></script>
    <script src="/assets/js/accordions.js"></script>
    

</body>

</html>
