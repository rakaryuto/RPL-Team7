@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Register Page</h1>

        @if ( session()->has('fail') )
            <div class="alert alert-danger">{{ session()->get('fail') }}</div>
        @endif

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div>
                <div>
                    <label for="name">Username</label>
                    <input type="name" name="name">
                    <span>@error('name'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="email">Email address</label>
                    <input type="email" name="email">
                    <span>@error('email'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password">
                    <span>@error('password'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation">
                    <span>@error('password_confirmation'){{ $message }}@enderror</span>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
        Already have an account? <a href={{ route('login') }}>Login here!</a>
    </div>
@endsection