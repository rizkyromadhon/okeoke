@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="fw-bold">Barangnya mau dikirim dimana nih? :)</h2>
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <form action="{{ route('addshippingaddress') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="phone_number">No. Telepon</label>
                            <input type="text" class="form-control" name="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="city_name">Nama Kota/Provinsi</label>
                            <input type="text" class="form-control" name="city_name">
                        </div>

                        <div class="form-group">
                            <label for="postal_code">Kode Pos</label>
                            <input type="text" class="form-control" name="postal_code">
                        </div>

                        <input type="submit" value="Lanjut" name="" class="btn btn-primary">
                        <a href="{{ route('home') }}" class="btn btn-danger">Gak jadi</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
