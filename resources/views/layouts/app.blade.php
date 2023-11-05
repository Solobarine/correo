<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @vite('resources/css/app.css')
    <title>Correo</title>
</head>
<body class="bg-background1 min-h-screen">
    <section>

        @yield('content')
    </section>
    <footer class="bg-secondary p-3 grid place-items-center">
        <p class="text-center text-neutral text-md">Copyright &copy;. All Rights Reserved.</p>
        <p class="text-center text-neutral text-2xl font-semibold">Akpuru Solomon Barine</p>
    </footer>
</body>
</html>