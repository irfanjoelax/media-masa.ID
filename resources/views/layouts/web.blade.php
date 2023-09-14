<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="media-masa.id" name="keywords">
    <meta content="media-masa.id" name="description">

    <title>@yield('title') | {{ env('APP_NAME') }}</title>

    @yield('meta-tag')

    <!-- Favicon -->
    <link href="{{ asset('img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('magazine') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('magazine') }}/css/style.css" rel="stylesheet">

    @yield('extra-style')
</head>

<body>
    <!-- Topbar Start -->
    <x-topbar/>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <x-navbar/>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <x-footer/>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            {{ date('Y') }} &copy; <a class="font-weight-bold" href="{{ url('/') }}">{{ env('APP_NAME') }}</a>. All Rights Reserved.
			Developed by <a class="font-weight-bold" href="https://wa.me/+6283140617623" target="_blank">PT. Master Digital Solutions</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('magazine') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('magazine') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('magazine') }}/js/main.js"></script>
    <script src="{{ asset('magazine') }}/js/date.js"></script>
    @yield('extra-script')
</body>

</html>
