<nav class="navbar navbar-expand-lg navbar-light bg-light py-4 px-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">MiniPos <i class="ms-2 pb-1" data-feather="shopping-bag" width="19" height="19"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('nav-dashboard')" aria-current="page" href="{{ route('home') }}">Kasir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('nav-user')" href="{{ route('list_users') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('nav-produk')" href="{{ route('list_product') }}">Produk</a>
                </li>
                <li class="nav-item dropdown @yield('nav-master')">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item @yield('nav-kategori')" href="{{ route('list_kategori') }}">Kategori</a></li>
                        <li><a class="dropdown-item @yield('nav-pelanggan')" href="{{ route('list_pelanggan') }}">Pelanggan</a></li>
                        <li><a class="dropdown-item @yield('nav-supplier')" href="{{ route('list_supplier') }}">Supplier</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                @guest
                    <a class="btn btn-primary" href="{{ route('logout_user') }}">
                        Login Admin
                        <i class="ms-2" data-feather="log-in" width="13" height="13"></i>
                    </a>
                @else
                    <a class="btn btn-danger btn-sm" href="{{ route('logout_user') }}">
                        Logout
                        <i class="ms-2" data-feather="log-out" width="13" height="13"></i>
                    </a>
                @endguest
            </form>
        </div>
    </div>
</nav>
