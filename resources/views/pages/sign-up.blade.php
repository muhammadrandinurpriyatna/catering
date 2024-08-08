@extends('layouts.auth')

@section('content')
    @include('components.message')
    <form action="{{ route('sign-up') }}" method="post" class="row">
        @csrf
        <div class="col-md-12 mb-3">
            <h2>Sign Up</h2>
            <p>Enter your email and password to register</p>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control add-billing-address-input" name="name" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required> 
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select class="form-control" name="role" required>
                    <option value="merchant">Merchant</option>
                    <option value="customer">Customer</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-secondary w-100">SIGN UP</button>
            </div>
        </div>
        <div class="col-12">
            <div class="text-center">
                <p class="mb-0">Already have an account ? <a href="{{ route('sign-in') }}" class="text-warning">Sign in</a></p>
            </div>
        </div>
    </form>
@endsection