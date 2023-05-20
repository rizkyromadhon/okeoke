@extends('layouts.main')

@section('container')
    <section class="section-content padding-y-sm">
        <div class="container">
            @if (session()->has('message'))
                <div class="container alert alert-danger alert-dismissible fade show" role="alert" style="width:400px;">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <article class="container">
                <div class="row">
                    <div class="col-lg-5 card card-body me-1">
                        <h3 class="fw-bold ">Kategori Pilihan</h3>
                    </div>
                    <div id="carousel" class="carousel carousel-dark slide card-body col-lg-5 ms-1"
                        data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <img src="/img/carousel/1.jpg" class="img-fluid d-block w-200 rounded">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="/img/carousel/2.jpg" class="img-fluid d-block w-100 rounded">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="/img/carousel/4.jpg" class="img-fluid d-block w-100 rounded">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </article>

            <article class="card card-body mt-2 height: 20px;">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                        <a href="/product" class="text-decoration-none"><img src="/img/legion-5pro/4.jpg"
                                style="width: 200px;" class="mt-2 rounded mx-auto">
                            <h5 class="d-flex justify-content-center mt-3 text-dark">Legion 5 Pro</h5>
                        </a>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <a href="/product" class="text-decoration-none"><img src="/img/lv-yoga7i/1.jpg"
                                style="width: 320px;" class="rounded mx-auto">
                            <h5 class="d-flex justify-content-center mt-3 text-dark">Lenovo Yoga 7i</h5>
                        </a>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <a href="/product" class="text-decoration-none"><img src="/img/x1-carbong8/1.jpg"
                                style="width: 260px;" class="rounded mx-auto">
                            <h5 class="d-flex justify-content-center mt-2 text-dark">Lenovo X1 Carbon Gen 8</h5>
                        </a>
                    </div>
                </div>
            </article>

            <article class="card card-body mt-2 mb-5">
                <div class="row">
                    <div class="col-md-4">
                        <figure class="item-feature">
                            <span class="text-primary d-flex justify-content-center"><i class="bi bi-truck"
                                    style="font-size:2rem;"></i></span>
                            <figcaption class="pt-3">
                                <h5 class="title">Pengiriman cepat</h5>
                                <p> Untuk layanan pengiriman standar, tersedia Pengiriman Cepat hingga 1-3 hari. </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <figure class="item-feature">
                            <span class="text-primary d-flex justify-content-center"><i class="bi bi-wallet2"
                                    style="font-size:2rem;"></i></span>
                            <figcaption class="pt-3">
                                <h5 class="title">Murah</h5>
                                <p>Kami menyediakan barang-barang premium dengan harga yang murah, dibandingkan dengan
                                    toko-toko lain.</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <figure class="item-feature">
                            <span class="text-primary d-flex justify-content-center"><i class="bi bi-patch-check-fill"
                                    style="font-size:2rem;"></i></span>
                            <figcaption class="pt-3">
                                <h5 class="title">Terverifikasi</h5>
                                <p>Toko kami telah diverifikasi dan telah terdaftar sebagai toko resmi di Indonesia.</p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
