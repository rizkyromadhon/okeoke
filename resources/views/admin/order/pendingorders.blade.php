@extends('admin.layouts.main')

@section('container')
    <div class="container my-5">
        <div class="card p-4">
            <div class="card-title">
                <h2 class="text-center fw-semibold">Orderan Ditunda</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>User ID</th>
                        <th>Informasi Pengiriman</th>
                        <th>Produk ID</th>
                        <th>Jumlah</th>
                        <th>Jumlah yang akan dibayarkan</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{ $order->userid }}</td>
                            <td>
                                <ul>
                                    <li>No. Telepon : {{ $order->shipping_phoneNumber }}</li>
                                    <li>Kota : {{ $order->shipping_city }}</li>
                                    <li>Kode Pos : {{ $order->shipping_postalcode }}</li>
                                </ul>
                            </td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>@currency($order->total_price)</td>
                            <td><a href="" class="btn btn-success">Confirm Order</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
