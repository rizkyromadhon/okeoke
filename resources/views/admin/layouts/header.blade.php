<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: black">
    <div class="container-fluid w-80" style="height:50px;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 fs-6 ms-5 " href="#">
            <p class="fw-bolder" style="font-size:30px;"><span style="color:#d2c2b0;">oke</span>oke.</p>
        </a>
        <div class="collapse navbar-collapse d-lg-flex" id="navbarNav">
            <div class="container d-flex justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle rounded" href="#" role="button"
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
