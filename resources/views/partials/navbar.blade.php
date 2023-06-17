<nav class="navbar navbar-expand-lg navbar-dark p-0">
    <div class="container-fluid" style="width:100%;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 fs-6 ms-5 " href="#">
            <p class="fw-bolder" style="font-size:30px;"><span style="color:#d2c2b0;">oke</span>oke.</p>
        </a>
        <div class="collapse navbar-collapse d-lg-flex me-5" id="navbarNav">
            @auth
                <form class="d-flex col-lg-6" role="search" action="{{ route('productSearch') }}" method="GET">
                    @csrf
                    <input class="form-control me-2" style="width:120%; height:45px;" type="text" name="keyword"
                        placeholder="Hi, {{ auth()->user()->name }} lagi cari apa?">
                    <button class="btn" type="submit"><i class="bi bi-search"></i></button>
                </form>
            @else
                <form class="d-flex col-lg-6" role="search">
                    @csrf
                    <input class="form-control me-2" style="width:100%; height:45px;" type="search"
                        placeholder="Hi lagi cari apa?" aria-label="Search">
                    <button class="btn" type="submit"><i class="bi bi-search"></i></button>
                </form>

            @endauth
            <ul class="navbar-nav col-lg-6 justify-content-lg-end">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/cart') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('addtocart') }}"><i class="bi bi-cart2"></i> Keranjang</a>
                </li>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown-center">
                            <a class="nav-link dropdown-toggle rounded" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, {{ auth()->user()->username }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('userprofile') }}"><i
                                            class="bi bi-person-circle"></i>
                                        Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login" class="nav-link"><i class="bi bi-person-fill"></i> Login</button></a>
                        </li>
                    @endauth
                </ul>
            </ul>
        </div>
    </div>
</nav>
