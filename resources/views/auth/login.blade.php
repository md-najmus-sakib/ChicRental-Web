@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <h2 class="mb-4 text-center fw-bold">
                    <i class="fa-solid fa-right-to-bracket text-danger"></i> Login
                </h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control" placeholder="Your Email">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" id="password" required class="form-control" placeholder="Password">
                        </div>
                    </div>
                    
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Remember Me</label>
                    </div>

                    <div id="login-error" class="text-danger small mb-2" style="display:none;"></div>

                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-danger fw-bold" id="loginBtn">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </button>
                    </div>

                    <div class="text-center mb-2">
                        <a href="{{ route('password.request') }}" class="text-danger text-decoration-none fw-bold">
                            <i class="fa-solid fa-key"></i> Forgot Password?
                        </a>
                    </div>
                </form>

                <div class="text-center mt-3">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="fw-bold text-danger text-decoration-none">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('assets/js/login.js') }}"></script>