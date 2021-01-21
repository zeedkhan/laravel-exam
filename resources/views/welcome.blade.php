<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body class="bg-gray-100">
    <div>
        @if (Route::has('login'))
        <nav class="flex justify-end p-3 bg-white">
            @auth
            <a href="{{ url('/home')}}" class="mr-5">My Home</a>
            <a href="{{url('/todo')}}" class="mr-5">Your Todo</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <a href="{{ route('login') }}" class="">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 ">Register</a>
            @endif
            @endauth
        </nav>
        @endif
        <div class="flex justify-center">

            <div class="text-center h-full">
                <h1 class="md:pt-5 text-3xl">Welcom to Todo with laravel</h1>

                <figure class="h-full md:w-auto p-10 ml-5">
                    <img src="https://www.pikpng.com/pngl/b/59-596262_wolf-png-logo-for-free-download-on-wolf.png" class="max-h-80" alt="">
                </figure>


                @if (Route::has('login'))
                <div class="flex flex-col p-3">
                    @auth
                    {{null}}
                    @else
                    <div class="flex pt-5 justify-evenly text-sm w-80 ml-10">
                        <p class="p-1">Haven't an account, create one</p>
                        <a href="{{ route('register') }}" class="bg-white rounded p-1">Register</a>
                    </div>

                    @if (Route::has('register'))
                    <div class="flex pt-5 justify-evenly text-sm w-80 ml-10">
                        <p class="p-1">Already have an account, Login here </p>
                        <a href="{{ route('login') }}" class="ml-10 bg-white rounded p-1">Login</a>
                    </div> @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>