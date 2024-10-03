<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid mt-2 mb-2">
        <a class="navbar-brand me-5 text-" href="#">
            <img src="{{ asset('dist/img/logo.png') }}" alt="" width="30" height="30"
                class="d-inline-block align-text-top me-2 ms-5">
            <strong>GoArca</strong>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"
                        {{ Request::is('/') ? 'active-custom' : '' }}>Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Input Arsip</a>
                </li>
            </ul>
        </div>

        <div class="d-flex flex-wrap">
            <a href="#" type="button" class="btn btn-outline-light me-5">Login</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
