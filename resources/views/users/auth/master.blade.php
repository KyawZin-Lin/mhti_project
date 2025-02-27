<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admins/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('admins/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admins/css/custom.css') }}" rel="stylesheet">

    {!! htmlScriptTagJsApi() !!}

</head>

<body class="bg-gradient-primary">

    @include('admins.auth.message')

    @yield('content')

    <!-- Bootstrap core JavaScript-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>


    {{-- <script src="{{ asset('admins/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admins/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admins/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admins/js/sb-admin-2.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (token) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF_TOKEN': token.content
                    }
                });
            }

            $('.myselect').select2({
                placeholder: "Select an Option...",
                allowClear: true
            });
        });
    </script>

    @yield('script')

</body>

</html>
