@extends('layouts.main')
@section('content')
    <div class="container mb-5" id="section-content">
        <h2>Hasil Pencarian untuk "{{ $keyword }}"</h2>

        @if ($products->count() > 0)
            <div class="row">
                @foreach ($products as $product)
                    @if ($product->quantity == 0)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box">
                                <h4 class="product_name">{{ $product->product_name }}</h4>
                                <p class="price_text"><span style="color: #262626;">
                                        @currency($product->price)</span></p>
                                <div class="product_img_2"><img src="{{ asset($product->product_img) }}">
                                </div>
                                <div class="alert alert-danger">
                                    Barang ini sudah habis.
                                </div>
                                <div class="btn_main">
                                    <div class="buy_bt">
                                        @if ($product->quantity > 0)
                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                @csrf
                                                <input class="btn btn-primary" type="submit" value="Beli Langsung"
                                                    name="" id="">
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <input type="hidden" value="{{ $product->price }}" name="price">
                                                <input type="hidden" value="1" name="quantity">
                                                <br>
                                            </form>
                                        @else
                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                @csrf
                                                <input class="btn btn-primary" type="submit" value="Beli Langsung"
                                                    name="" id="" disabled>
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <input type="hidden" value="{{ $product->price }}" name="price">
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
                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                @csrf
                                                <input class="btn btn-primary" type="submit" value="Beli Langsung"
                                                    name="" id="">
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <input type="hidden" value="{{ $product->price }}" name="price">
                                                <input type="hidden" value="1" name="quantity">
                                                <br>
                                            </form>
                                        @else
                                            <form action="{{ route('addproducttocart') }}" method="POST">
                                                @csrf
                                                <input class="btn btn-primary" type="submit" value="Beli Langsung"
                                                    name="" id="" disabled>
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <input type="hidden" value="{{ $product->price }}" name="price">
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
        @else
            <p style="margin-bottom: 330px;">Tidak ada hasil yang ditemukan.</p>
        @endif
    </div>
@endsection
