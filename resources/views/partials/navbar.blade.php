<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-3">
    <div class="container-fluid w-80">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 ms-5 fw-semibold" href="#">
            <h4>OkeekO</h4>
        </a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex me-5" id="navbarNav">
            @auth
                <form class="d-flex col-lg-6" role="search">
                    @csrf
                    <input class="form-control me-2 w-200" type="search"
                        placeholder="Hi, {{ auth()->user()->name }} lagi cari apa?" aria-label="Search">
                    <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                </form>
            @else
                <form class="d-flex col-lg-6" role="search">
                    @csrf
                    <input class="form-control me-2 w-200" type="search" placeholder="Hi lagi cari apa?"
                        aria-label="Search">
                    <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                </form>

            @endauth
            <ul class="navbar-nav col-lg-5 justify-content-lg-end me-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/"><i
                            class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/cart') ? 'active' : '' }}" aria-current="page" href="/cart"><i
                            class="bi bi-cart2"></i> Carts</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown-center">
                        <a class="nav-link dropdown-toggle bg-dark rounded" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-circle"></i>
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
                    <form action="/login">
                        @csrf
                        <button class="btn btn-dark {{ Request::is('login') ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i> Login</button>
                    </form>
            </div>
        @endauth
        </ul>
    </div>
    </div>
</nav>
