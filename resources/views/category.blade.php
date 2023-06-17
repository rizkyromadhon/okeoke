@extends('layouts.main')

@section('content')
    <div class="product mt-2 mb-5">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container" style="margin-top:100px;">
                        <h1 class="title_product">{{ $category->category_name }} - ({{ $category->product_count }})</h1>
                        <div class="product_2">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box">
                                            <h4 class="product_name">{{ $product->product_name }}</h4>
                                            <p class="price_text"><span style="color: #262626;">
                                                    @currency($product->price)</span></p>
                                            <div class="product_img"><img src="{{ asset($product->product_img) }}"></div>
                                            <div class="btn_main">
                                                <div class="buy_bt">
                                                    <form action="{{ route('addproducttocart') }}" method="POST">
                                                        @csrf
                                                        <input class="btn btn-primary" type="submit" value="Beli Langsung">
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <br>
                                                    </form>
                                                </div>
                                                <div class="seemore_bt">
                                                    <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}"
                                                        class="btn btn-primary" class="">Lihat Detail</a>
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
@endsection
