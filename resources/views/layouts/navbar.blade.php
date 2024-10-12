<nav class="navbar navbar-expand-lg navbar-white bg-dark mb-5">
                <div class="container-fluid">
                <a class="navbar-brand me-5 text-" href="#">
                    <img src="{{ asset('dist/img/logo.png') }}" alt="" width="30" height="30"
                        class="d-inline-block align-text-top me-2 ms-5">
                    <strong>GoArca</strong>
                </a>
                  <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/"
                        {{ Request::is('/') ? 'active-custom' : '' }}>Beranda</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="javascript:void(0)"
                          id="navbarDropdown"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{{route('kategory')}}}">Kategori</a></li>
                          <li><a class="dropdown-item" href="{{route('jra')}}">Jra</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Daftar</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/"
                        {{ Request::is('/') ? 'active-custom' : '' }}>Daftar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="javascript:void(0)" tabindex="-1">Disabled</a>
                      </li>
                    </ul>
                  </div>
                  <div class="d-flex flex-wrap">    
                    <a href="#" type="button" class="btn btn-outline-secondary ms-2">Login</a>
                </div>
                </div>
              </nav>
