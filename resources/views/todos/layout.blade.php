<!-- Create a form to summit data -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    @livewireStyles
    <title>Todos</title>
</head>

<body class="bg-gray-100">
    <div class="text-center pt-20 flex justify-center">
        <div class="w-7/12  rounded py-4">
            @if (Route::has('login'))
            <div class="fixed top-0 right-0 px-6 py-4 sm:block bg-white w-full text-right">
                <div class="flex justify-between">
                    <img src="https://www.pikpng.com/pngl/b/59-596262_wolf-png-logo-for-free-download-on-wolf.png" alt="icon" class="h-10">
                    @auth
                    <div class="py-2">
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">My Home</a>
                        <a href="{{route('todo.index')}}" class="text-sm text-gray-700 underline">Todo</a>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                    @endauth
                </div>
            </div>
            @endif

            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>

</html>