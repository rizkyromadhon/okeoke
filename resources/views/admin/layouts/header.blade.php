<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid w-80">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><span
                class="app-brand-text demo menu-text fw-bold ms-2">OkeekO
                Dashboard</span></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex" id="navbarNav">
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

            <div class="container d-flex justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bg-dark rounded" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/"><i class="bi bi-house-door"></i>
                                    Home</a></li>
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
                </ul>
            </div>
        </div>
    </div>
</nav>
