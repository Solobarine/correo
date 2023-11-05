@extends('layouts.app')


@section('content')
    <div class="flex flex-col align-center justify-center min-h-screen place-content-center gap-2 p-4">
        <a href="{{ route('home') }}" class="absolute top-0 p-6 right-1 5 font-semibold text-text hover:text-primary">Home</a>
        <div class="sm:w-full md:w-xl bg-neutral border border-green-400 rounded-lg m-auto p-3">
            <h1 class="font-bold text-2xl mb-6 text-text">Register</h1>
            @if (session()->has('status'))
                <p class="font-semibold text-danger p-2">{{session('status')}}</p>
            @endif
            <form action="{{ route('register')}}" method="post" id="registerForm" class="flex flex-col gap-5">
                @csrf
                <div class="grid gap-2">
                    <input class="p-2 rounded-md" type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" />
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid gap-2">
                    <input class="p-2 rounded-md" type="text" name="username" placeholder="Enter your username" value="{{ old('username') }}" />
                    @error('username')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid gap-2">
                    <input class="p-2 rounded-md" type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email')}}"/>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid gap-2">
                    <input class="p-2 rounded-md" type="password" name="password" id="password" placeholder="Enter your password"/>
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <input class="p-2 rounded-md" type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-Type Your Password">
                <button type="submit" class="text-white font-xl bg-primary p-2 rounded-md">Register</button>
                <p class="text-text">Already a User, <a class="hover:text-primary" href="{{ route('login') }}">Login</a></p>
            </form>
        </div>
    </div>
@endsection