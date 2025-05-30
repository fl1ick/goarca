<nav class="navbar bg-light">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Kiri: Toggle -->
        <div class="d-flex align-items-center">
            <i class="bx bx-menu px-2" id="menu-toggle" style="font-size: 1.5rem; cursor: pointer;"></i>
        </div>

        <!-- Tengah: Judul -->
        <div class="text-center flex-grow-1">
            <h4 class="m-0">TERTIB ARSIP BEBAS KONFLIK</h4>
        </div>

        <!-- Kanan: Dropdown -->
        <div>
            <li class="nav-item dropdown list-unstyled">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ session('name') }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </div>
    </div>
</nav>
