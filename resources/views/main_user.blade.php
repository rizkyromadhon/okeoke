@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="box">
                    <ul>
                        <li class="mt-1"><a href="{{ route('userprofile') }}">Dashboard</a></li>
                        <li class="mt-1"><a href="{{ route('pendingorders') }}">Pending Orders</a></li>
                        <li class="mt-1"><a href="{{ route('history') }}">History</a></li>
                        <li class="mt-1">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" style="background-color: transparent;">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box">
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
@endsection
