@php
    $categories = App\Models\Category::latest()->get();
@endphp

@extends('layouts.main')

@section('content')
    <div class="container" id="section-content">
        @if (session()->has('message'))
            <div class="container alert alert-danger alert-dismissible fade show" role="alert" style="width:400px;">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container">
        <div id="carouselExample" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="/banner/4.png" class="img-fluid" style="width:1400px; height:350px; border-radius:10px;">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="/banner/5.png" class="img-fluid" style="width:1400px; height:350px; border-radius:10px;">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="/banner/6.png" class="img-fluid" style="width:1400px; height:350px; border-radius:10px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container box">
        <h3 class="fw-bold ">Kategori Pilihan</h3>
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-2 col-sm-2">
                        <div class="box d-flex justify-content-center">
                            <a href="{{ route('category', [$category->id, $category->slug]) }}"
                                class="fw-medium">{{ $category->category_name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="product mt-2">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="title_product">Semua Produk</h1>
                        <div class="product_2">
                            <div class="row">
                                @foreach ($allproducts as $product)
                                    @if ($product->quantity == 0)
                                        <div class="col-lg-4 col-sm-2">
                                            <div class="box">
                                                <h4 class="product_name">{{ $product->product_name }}</h4>
                                                <p class="price_text"><span style="color: #262626;">
                                                        @currency($product->price)</span></p>
                                                <div class="product_img_2"><img src="{{ asset($product->product_img) }}">
                                                </div>
                                                @if ($product->quantity == 0)
                                                    <div class="alert alert-danger">
                                                        Barang ini sudah habis.
                                                    </div>
                                                @endif
                                                <div class="btn_main">
                                                    <div class="buy_bt">
                                                        @if ($product->quantity > 0)
                                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                                @csrf
                                                                <input class="btn btn-primary" type="submit"
                                                                    value="Beli Langsung" name="" id="">
                                                                <input type="hidden" value="{{ $product->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $product->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <br>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                                @csrf
                                                                <input class="btn btn-primary" type="submit"
                                                                    value="Beli Langsung" name="" id=""
                                                                    disabled>
                                                                <input type="hidden" value="{{ $product->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $product->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <br>
                                                            </form>
                                                        @endif
                                                    </div>
                                                    <div class="seemore_bt">
                                                        <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}"
                                                            class="btn btn-primary" class="">Lihat Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box">
                                                <h4 class="product_name">{{ $product->product_name }}</h4>
                                                <p class="price_text"><span style="color: #262626;">
                                                        @currency($product->price)</span></p>
                                                <div class="product_img_2"><img src="{{ asset($product->product_img) }}">
                                                </div>
                                                <div class="alert alert-success">
                                                    Stok barang sisa {{ $product->quantity }}.
                                                </div>
                                                <div class="btn_main">
                                                    <div class="buy_bt">
                                                        @if ($product->quantity > 0)
                                                            <form action="{{ route('addproducttocart') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input class="btn btn-primary" type="submit"
                                                                    value="Beli Langsung" name="" id="">
                                                                <input type="hidden" value="{{ $product->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $product->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <br>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('addproducttocart') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input class="btn btn-primary" type="submit"
                                                                    value="Beli Langsung" name="" id=""
                                                                    disabled>
                                                                <input type="hidden" value="{{ $product->id }}"
                                                                    name="product_id">
                                                                <input type="hidden" value="{{ $product->price }}"
                                                                    name="price">
                                                                <input type="hidden" value="1" name="quantity">
                                                                <br>
                                                            </form>
                                                        @endif
                                                    </div>
                                                    <div class="seemore_bt">
                                                        <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}"
                                                            class="btn btn-primary" class="">Lihat Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
