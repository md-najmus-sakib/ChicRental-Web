@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5 pt-5" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <h2 class="mb-4 text-center fw-bold">
                    <i class="fa-solid fa-user-plus text-danger"></i> Sign Up
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

                <form method="POST" action="{{ route('register') }}" id="signupForm" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control" placeholder="Your Name">
                        </div>
                    </div>
                    
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

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control" placeholder="Confirm Password">
                        </div>
                        <div id="password-error" class="text-danger small mt-1" style="display:none;"></div>
                    </div>

                    <div class="d-grid mb-2 mt-4t ">
                        <button type="submit" class="btn btn-danger fw-bold" id="signupBtn">
                            <i class="fa-solid fa-user-plus"></i> Create Account
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="fw-bold text-danger text-decoration-none">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('assets/js/register.js') }}"></script>