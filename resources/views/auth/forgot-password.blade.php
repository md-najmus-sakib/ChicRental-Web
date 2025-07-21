@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <h2 class="mb-4 text-center fw-bold">
                    <i class="fa-solid fa-key text-danger"></i> Forgot Password
                </h2>
                <p class="text-center mb-4">Enter your email and we'll send you a password reset link.</p>
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required class="form-control" placeholder="Your Email">
                        </div>
                    </div>
                    <div class="d-grid mb-2">
                        <button type="submit" class="btn btn-danger fw-bold">
                            <i class="fa-solid fa-paper-plane"></i> Send Reset Link
                        </button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="fw-bold text-danger text-decoration-none">
                        <i class="fa-solid fa-arrow-left"></i> Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection