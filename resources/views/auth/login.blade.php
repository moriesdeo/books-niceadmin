@php use App\Constants\RouteName; @endphp
@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('/login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ route(RouteName::REGISTER_VIEW_SHOW) }}">Belum punya akun? Daftar di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
