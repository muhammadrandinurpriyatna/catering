@extends('layouts.auth')

@section('content')
    @include('components.message')
    <form action="{{ route('sign-in') }}" method="post" class="row">
        @csrf
        <div class="col-md-12 mb-3">
            <h2>Sign In</h2>
            <p>Enter your email and password to login</p>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-secondary w-100">SIGN IN</button>
            </div>
        </div>
        <div class="col-12">
            <div class="text-center">
                <p class="mb-0">Don't have an account? <a href="{{ route('sign-up') }}" class="text-warning">Sign Up</a></p>
            </div>
        </div>
    </form>
@endsection
