@extends('main_user')
@section('profile-content')
    <div class="container">
        <h3 class="fw-bold">Pending Orders</h3>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th>Product ID</th>
                <th>Price</th>
            </tr>
            @foreach ($pending_orders as $order)
                <tr>
                    <td>{{ $order->product_id }}</td>
                    <td>@currency($order->total_price)</td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
