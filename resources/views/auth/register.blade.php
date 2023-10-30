@extends('layouts.app')


@section('content')
    <div id="register">
        <form action="{{ route('register')}}" method="post" id="registerForm">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="text" name="username" placeholder="Enter your username" value="{{ old('username') }}" />
                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email')}}"/>
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Enter your password"/>
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="password" name="password_confirmation" id="password_confirmation">
            <button type="submit">Register</button>

            <p>Already a User, <a href="{{ route('login') }}">Login</a></p>
        </form>
    </div>
@endsection