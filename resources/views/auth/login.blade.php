<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arsip Kota Magelang | Login</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="icon" type="image/x-icon" href="dist/img/maponomy_logo_2.png">
    <style>
        a:hover {
            color: #495057;
        }

        #toast-container {
            margin-top: 8px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="row w-100 justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center bg-white border-bottom-0">
                        <h2 class="text-center mb-4">GoArca</h2>
                        <img src="{{ asset('img/kotamagelang.png') }}" alt="Logo"
                            style="width: 125px; height: 125px; object-fit: contain;">
                    </div>
                    <div class="card-body">
                        <p class="text-center mb-4">Sign in to start your session</p>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" id="username" name="username" class="form-control"
                                        placeholder="Username" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="showHidePassword">
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text toggle-password" style="cursor: pointer;">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" id="btnLogin" class="btn btn-primary btn-block">
                                <span class="spinner-border spinner-border-sm mr-2 d-none" id="btnLoginSpinner"
                                    role="status" aria-hidden="true"></span>
                                <span id="btnLoginText">Sign In</span>
                            </button>

                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Dinas Arsip Kota Magelang
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Toggle Password -->
    <script>
        $(document).on('click', '.toggle-password', function() {
            const passwordInput = $('#password');
            const icon = $(this).find('i');

            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                passwordInput.attr('type', 'password');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });

        @if (session('success'))
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
</body>

</html>
