@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center" id="section-content">
        <div class="col-lg-4 mt-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-login mb-5">
                <p class="title">Login</p>
                <form action="/login" method="post">
                    @csrf
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="rounded text-dark @error('email') is-invalid @enderror"
                            id="email" placeholder="name@gmail.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="rounded text-dark @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="form-checks mt-1">
                            <input type="checkbox" class="form-check-inputs" onclick="togglePasswordVisibility()"
                                id="exampleCheck1" style="width:15px; height:15px;">
                            <label class="form-check-labels" for="exampleCheck1">Show Password</label>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="sign bg-primary text-light" type="submit">Login</button>
                </form>
                <p class="signup mt-2">Belum terdaftar?
                    <a rel="noopener noreferrer" href="/register" class="">Daftar Sekarang!</a>
                </p>
            </main>
        </div>
    </div>
@endsection
