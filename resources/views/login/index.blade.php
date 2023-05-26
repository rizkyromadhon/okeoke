@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
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
            <main class="form-login bg-dark mb-5">
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
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="rounded text-dark @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="form-check mt-1">
                            <input type="checkbox" class="form-check-input" onclick="togglePasswordVisibility()"
                                id="exampleCheck1" style="width:15px;">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="forgot" style="float:left;">
                        <a rel="noopener noreferrer" href="/forgot">Forgot Password ?</a>
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
