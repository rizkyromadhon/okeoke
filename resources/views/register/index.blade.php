@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4 mt-3">
            <main class="form-registration bg-dark mb-5">
                <p class="title">Form Registrasi</p>
                <form action="/register" method="post">
                    @csrf
                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" name="name"
                            class="rounded bg-light text-dark @error('name') is-invalid @enderror" id="name"
                            placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" name="username"
                            class="rounded bg-light text-dark @error('username') is-invalid @enderror" id="username"
                            placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" name="email"
                            class="rounded bg-light text-dark @error('email') is-invalid @enderror" id="email"
                            placeholder="name@gmail.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                            class="rounded bg-light text-dark text-dark @error('password') is-invalid @enderror"
                            id="password" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 mt-1 form-check">
                        <input type="checkbox" class="form-check-input" onclick="togglePasswordVisibility()"
                            id="exampleCheck1" style="width:15px;">
                        <label class="form-check-label" for="exampleCheck1">Show Password</label>
                    </div>

                    <button class="sign mt-4 bg-primary text-light" type="submit">Daftar</button>
                </form>
                <p class="signup mt-2">Sudah terdaftar?
                    <a rel="noopener noreferrer" href="/login" class="">Login</a>
                </p>
            </main>
        </div>
    </div>
@endsection
