@extends('layouts.app')

@section('content')
    <div class="flex flex-col align-center justify-center min-h-screen place-content-center gap-2 p-4">
        <a href="{{ route('home') }}" class="absolute top-0 p-6 right-1 5 font-semibold text-text hover:text-primary">Home</a>
        <div class="sm:w-full md:w-xl bg-neutral border border-green-400 rounded-lg m-auto p-3">
            <h2 class="font-bold mb-3 text-text text-2xl">Log In</h2>
            <div>
                @if (session()->has('status'))
                <p class="font-semibold text-danger p-2">{{ session('status') }}</p>
                @endif
                <form action="{{ route('login')}}" method="post" class="flex flex-col gap-3">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" class="p-2 rounded-md"/>
                    <input type="password" name="password" id="password" placeholder="Enter your password" class="p-2 rounded-md"/>
                    <div>
                        <input type="checkbox" name="remember" id="remember" />
                        <label for="remember">Remember Me</label>
                    </div>
                    <button class="text-white font-xl bg-primary p-2 rounded-md" type="submit">Login</button>
        
                    <p class="text-text">Not yet a User, <a class="hover:text-primary" href="{{ route('register') }}">Register</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection