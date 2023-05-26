@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="box">
                    <div class="tshirt_img"><img src="{{ asset($product->product_img) }}" alt=""></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box">
                    <div class="product-info">
                        <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                        <p class="price_text text-left"><span style="color: #262626;">@currency($product->price)</span></p>
                    </div>
                    <div class="my-3 product-details">
                        <p class="lead">{{ $product->product_long_des }}</p>
                        <ul class="p-2 bg-light my-2">
                            <li>Kategori - {{ $product->product_category_name }}</li>
                            <li>Merk - {{ $product->product_subcategory_name }}</li>
                            <li>Stok Tersedia - {{ $product->quantity }}</li>
                        </ul>
                    </div>

                    <div class="btn_main">
                        <form action="{{ route('addproducttocart') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <div class="form-group">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <label for="quantity">Beli berapa?</label>
                                <input class="form-control" type="number" min="1" placeholder="1" name="quantity">
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Masukkan ke Keranjang">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="product mt-2">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="title_product">Produk Terkait</h1>
                            <div class="product_2">
                                <div class="row">
                                    @foreach ($related_products as $product)
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box">
                                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                                <p class="price_text"><span style="color: #262626;">
                                                        @currency($product->price)</span></p>
                                                <div class="tshirt_img"><img src="{{ asset($product->product_img) }}">
                                                </div>
                                                <div class="btn_main">
                                                    <div class="buy_bt">
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
                                                    </div>
                                                    <div class="seemore_bt"><a
                                                            href="{{ route('singleproduct', [$product->id, $product->slug]) }}"
                                                            class="btn btn-primary">Lihat
                                                            Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div </div>
        @endsection
