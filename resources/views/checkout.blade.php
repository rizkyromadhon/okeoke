@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="fw-semibold">Ini halaman terakhir dari proses belanjamu. Pastikan semua sudah benar, ya. :)</h2>
        <div class="row">
            <div class="col-6">
                <div class="box">
                    <h3 class="fw-bold">Produk akan dikirim di : </h3>
                    <p>Kota/Desa : {{ $shipping_address->city_name }}</p>
                    <p>Kode Pos : {{ $shipping_address->postal_code }}</p>
                    <p>No. Telepon : {{ $shipping_address->phone_number }}</p>
                </div>
            </div>

            <div class="col-6">
                <div class="box">
                    <h3 class="fw-bold">Ringkasan Belanja : </h3>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart_items as $item)
                                <tr>
                                    @php
                                        $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    @endphp
                                    <td>{{ $product_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>@currency($item->price)</td>
                                    <td></td>
                                </tr>

                                @php
                                    $total = $total + $item->price;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td>Total Tagihan</td>
                                <td>@currency($total)</td>
                                <td></td>
                            </tr>
                        </table>
                        <div class="container p-2">
                            <center>
                                <form action="{{ route('placeorder') }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Order Sekarang" class="btn btn-primary col-lg-10">
                                </form>
                                <a href="{{ route('home') }}" class="btn btn-danger col-lg-10 mt-2">Batalkan</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
