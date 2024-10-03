<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoArca | Arsip Kota Magelang</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/Bootstrap5/bootstrap.min.css') }}" />

    <!-- Custom Active Page Navbar CSS -->
    <link rel="stylesheet" href="{{ asset('customs/main.css') }}" />
    @yield('custom-head')
</head>

<body>
    <div class="wrapper">
        <!-- Preloader -->

        @include('layouts.navbar')

        @yield('content')

        @include('layouts.footer')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('dist/js/Bootstrap5/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
