@extends('layouts.main')

@section('content')
    <div class="container mt-5" style="margin-bottom: 150px;" id="section-content">
        <h1 class="fw-bold" id="section-content">Keranjang</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="box mt-2">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Foto Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart_items as $item)
                                <tr>
                                    @php
                                        $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                        $img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                                    @endphp
                                    <td><img src="{{ asset($img) }}" style="height:100px;" alt=""></td>
                                    <td>{{ $product_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>@currency($item->price)</td>
                                    <td><a href="{{ route('removeitem', $item->id) }}" class="btn btn-danger">Hapus dari
                                            Keranjang</a>
                                    </td>
                                </tr>

                                @php
                                    $total = $total + $item->price;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total seluruhnya :</td>
                                <td>@currency($total)</td>
                                @if ($total <= 0)
                                    <td><a href="" class="btn btn-primary disabled">Beli Sekarang</a></td>
                                @else
                                    <td><a href="{{ route('shippingaddress') }}" class="btn btn-primary">Beli Sekarang</a>
                                    </td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
