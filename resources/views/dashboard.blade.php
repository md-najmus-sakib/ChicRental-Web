@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow p-5">
        <h2>Welcome, {{ Auth::user()->name ?? 'User' }}!</h2>
        <p class="lead">You have successfully logged in. This is your dashboard.</p>
    </div>
</div>
@endsection
