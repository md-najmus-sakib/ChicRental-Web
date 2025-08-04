@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h3 class="mb-4 text-center fw-bold">
                        <i class="fa-solid fa-user-gear text-danger"></i> Edit Profile
                    </h3>

                    @if(session('success'))
                        <div class="alert alert-success text-center">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3 text-center">
                            @if($user->profile_pic)
                                <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile" width="80" class="rounded-circle shadow mb-2">
                            @else
                                <img src="{{ asset('assets/image/default-user.png') }}" alt="Profile" width="80" class="rounded-circle shadow mb-2">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="profile_pic" class="form-label fw-semibold">Profile Picture</label>
                            <input type="file" name="profile_pic" id="profile_pic" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                                   class="form-control" placeholder="+8801XXXXXXXXX">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label fw-semibold">Address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                                   class="form-control" placeholder="Enter your address">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">New Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Leave blank to keep current">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control" placeholder="Retype new password">
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-danger fw-bold">
                                <i class="fa-solid fa-floppy-disk"></i> Save Changes
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('home') }}" class="text-decoration-none fw-semibold text-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection