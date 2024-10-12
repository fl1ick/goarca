<!-- Navbar -->
<header>
    <header class="bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center me-5 mb-2 mb-lg-0 text-white text-decoration-none">
                    <img class="me-2" width="72" height="72" role="img" src="dist/img/UmpakSumbing.png" />
                    <b>yoh</b>
                </a>
    
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="nav-item d-none d-sm-inline-block me-3">
                        <a href="/"
                            class="nav-link  text-white {{ Request::is('/') ? 'active-custom' : '' }}">Beranda</a>
                    </li>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown me-3">
                            <a href="/profil" class="nav-link dropdown-toggle text-white" id="navbarDarkDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil BKAD
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Sejarah</a></li>
                                <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="#">Struktur</a></li>
                            </ul>
                        </li>
                    </ul>
                    <li class="nav-item d-none d-sm-inline-block me-3">
                        <a href="/peta-wisata"
                            class="nav-link  text-white {{ Request::is('peta-wisata') ? 'active-custom' : '' }}">
                            Peta Wisata</a>
                    </li>
                </ul>
    
                <div class="text-end">
                    <a href="/login" type="button" class="btn btn-outline-light me-2">Login</a>
                </div>
            </div>
        </div>
    </header>
<!-- Navbar End -->
