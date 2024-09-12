@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Input Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Input Password -->
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-group mt-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>

                            <!-- Button Login -->
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                            <!-- Forgot Password Link -->
                            @if (Route::has('password.request'))
                                <div class="form-group mt-3">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Lupa password?
                                    </a>
                                </div>
                            @endif

                            <!-- Link to Register -->
                            <div class="form-group mt-3">
                                <p>Belum punya akun? <a href="{{ route('register') }}">Daftar disini</a>.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
