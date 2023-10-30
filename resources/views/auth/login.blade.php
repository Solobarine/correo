@extends('layouts.app')

@section('content')
    <div>
        {{-- @if (session->has('status'))
            <p>{{ session('status') }}</p>
        @endif --}}
        <form action="{{ route('login')}}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" />
            <input type="password" name="password" id="password" placeholder="Enter your password" />
            <div>
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit">Login</button>

            <p>Not yet a User, <a href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
@endsection