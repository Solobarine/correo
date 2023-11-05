<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="/parrot.avif" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite('resources/css/app.css')
    <title>Correo</title>
</head>
<body>
    <div class="relative items-start bg-background1 min-h-screen md:flex sm:grid grid-cols-1 z-20">
        <div class="relative sm:fixed sm:left-[-250px] sm:w-[250px] md:sticky top-0 basis-menu h-screen bg-neutral flex flex-col justify-between px-2 py-6 z-10" id="menu">
            <i class="fa-solid fa-chevron-left md:hidden absolute top-[70px] right-[-20px] font-bold text-4xl text-primary sm:rotate-180 z-20" id="toggle"></i>
            <div class="flex flex-col gap-5 pt-[60px]">
                <a href="{{ route('posts')}}" class="flex items-center p-2 gap-2 text-text font-semibold hover:bg-primary hover:text-white">
                    <i class="fa-solid fa-message"></i>
                    <span>Posts</span>
                </a>
                <a href="{{ route('posts.new')}}" class="flex items-center p-2 gap-2 text-text font-semibold  hover:bg-primary hover:text-white"">
                    <i class="fa-solid fa-file-pen"></i>
                    <span>New Post</span>
                </a>
                <a href="{{ route('user.show', auth()->user())}}" class="flex items-center text-text p-2 gap-2 font-semibold  hover:bg-primary hover:text-white">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
                <a href="{{ route('user.edit')}}" class="flex items-center p-2 gap-2 text-text font-semibold  hover:bg-primary hover:text-white">
                    <i class="fa-solid fa-sliders"></i>
                    <span>Settings</span>
                </a>
            </div>
            <a href="{{ route('logout') }}" class="text-text font-semibold hover:bg-danger hover:text-white p-2">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Logout</span>
            </a>
        </div>
        <div class="grow grid grid-cols-1 sm:gap-[50px] md:gap-3">
            <nav class="sticky top-0 flex items-center grow bg-neutral z-10 p-4 md:mb-4">
                <h1 class="grow font-bold text-text text-xl">Correo</h1>
                <div class="flex gap-4 items-center">
                    <a href="{{ route('user.show', auth()->user())}}" class="text-primary">
                        @if (auth()->user()->avatar)
                            <img src="#" alt="User Avatar" class="self-start"/>
                        @else
                            <div class="w-[30px] h-[30px] flex rounded-full grid place-items-center bg-primary self-start">
                                <p class=" font-bold text-x text-text">{{ Str::upper(auth()->user()->username[0])}}</p>
                            </div>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="get">
                        @csrf
                        <button class="font-bold text-action-bad" type="submit">Logout</button>
                    </form>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
    <footer class="bg-secondary p-3 grid place-items-center">
        <p class="text-center text-neutral text-md">Copyright &copy;. All Rights Reserved.</p>
        <p class="text-center text-neutral text-2xl font-semibold">Akpuru Solomon Barine</p>
    </footer>
    <script>
        // Select Button and Menu Components
        const menuToggle = document.querySelector('#toggle')
        const menu = document.querySelector('#menu')

        // Create Toggle Function
        const toggleMenu = (e, menu) => {
            e.preventDefault()
            
            e.target.classList.toggle('sm:rotate-0')
            e.target.classList.toggle('sm:rotate-180')
            menu.classList.toggle('sm:left-[-250px]')
            menu.classList.toggle('sm:left-[0]')
        }

        // Add Event Listeners to Button
        menuToggle.addEventListener('click', (e) => toggleMenu(e, menu))
    </script>
</body>
</html>