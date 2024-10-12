<!DOCTYPE html>
<html lang="en"
    lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('templates/assets/')}}"
  data-template="vertical-menu-template-free">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoArca | Arsip Kota Magelang</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('templates/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{ asset('dist/css/Bootstrap5/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('templates/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    
    <!-- Helpers -->
    <script src="{{ asset('templates/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('templates/assets/js/config.js')}}"></script>

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
    <script src="{{ asset('templates/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('templates/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('templates/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('templates/assets/js/main.js')}}"></script>
    <script src="{{ asset('templates/assets/vendor/js/menu.js')}}"></script>
    <script src="{{ asset('templates/assets/vendor/libs/masonry/masonry.js')}}"></script>
</body>

</html>
