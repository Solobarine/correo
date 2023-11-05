<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <section class="grid items-center min-h-screen bg-light">
            <h1 class="text-secondary text-2xl fixed p-5 left-0 top-0">Correa</h1>
            <div class="sm:fixed sm:top-0 sm:right-0 flex gap-4 p-6 text-right z-10">
                @auth
                    <a href="{{ route('posts') }}" class="font-semibold text-gray-600 hover:text-gray-900">Posts</a>
                    <a href="{{ route('logout') }}" class="font-semibold text-danger hover:text-action-bad">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-text hover:text-primary focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-text hover:text-secondary">Register</a>
                    @endif
                @endauth
            </div>
            <div >
                <h1 class="text-center text-secondary text-4xl font-semibold">Welcome to Correa</h1>
            </div>
        </section>
    </body>
</html>
