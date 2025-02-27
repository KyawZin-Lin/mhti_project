<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('photos/icons/logo.png') }}">

    <link href="{{ asset('admins/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('users/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('users/css/blog-home.css') }}" rel="stylesheet">

    <link href="{{ asset('admins/css/custom.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    @include('users.nav')

    @include('admins.message')

    <!-- Page Content -->
    @yield('content')
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-color mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; 2023</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('users/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('users/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
