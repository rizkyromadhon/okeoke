@extends('layouts.main')

@section('content')
    <div class="container mb-5" id="section-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="box">
                    <div class="product_img"><img src="{{ asset($product->product_img) }}" alt=""></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box">
                    <div class="product-info">
                        <h4 class="product_name text-left">{{ $product->product_name }}</h4>
                        <p class="price_text text-left"><span style="color: #262626;">@currency($product->price)</span></p>
                    </div>
                    <div class="my-3 product-details">
                        <p class="lead">{!! nl2br(e($product->product_long_des)) !!}</p>
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
                                @if ($product->quantity == 0)
                                    <div class="alert alert-danger">
                                        Barang ini sudah habis.
                                    </div>
                                @elseif ($product->quantity < 10)
                                    <div class="alert alert-warning">
                                        Stok barang sisa {{ $product->quantity }}.
                                    </div>
                                @else
                                    <div class="alert alert-success">
                                        Stok barang tersedia.
                                    </div>
                                @endif
                                @if (session()->has('stock'))
                                    <div class="alert alert-danger">
                                        <p>Stok produk {{ $product->product_name }} hanya tersisa {{ $product->quantity }}.
                                        </p>
                                    </div>
                                @endif
                                <input class="form-control" type="number" min="1" name="quantity" required>
                            </div>
                            <br>
                            @if ($product->quantity > 0)
                                <input class="btn btn-primary" type="submit" value="Masukkan ke Keranjang">
                            @else
                                <input class="btn btn-primary" type="submit" value="Masukkan ke Keranjang" disabled>
                            @endif
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
                                                <h4 class="product_name">{{ $product->product_name }}</h4>
                                                <p class="price_text"><span style="color: #262626;">
                                                        @currency($product->price)</span></p>
                                                <div class="product_img"><img src="{{ asset($product->product_img) }}">
                                                </div>
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
            </div>
        </div>
    </div>
@endsection
