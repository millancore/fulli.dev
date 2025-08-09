@extends('layout.admin')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4" style="color: #6f42c1;">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required autofocus>
                        @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn w-100" style="background-color: #6f42c1; color: #fff;">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
