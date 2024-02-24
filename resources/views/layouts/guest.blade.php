<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <title>Noah's Ark Dog and Cat Shelter</title>

    <!-- Logo -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="/css/main.css">

    <!--sweet alert-->
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFjsYumj3DdiY6pQpp_dggIHH6ZB7s09Q&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha384-w4u1eJHUVShdxxD6m1PCjsjAq9XOy3Wh62Ie8J0xfoFZ5bRykplfEcf5orZmRfoA" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'public/js/ph-address-selector.js'])
    @livewireStyles
</head>

<body class="font-sans text-gray-900  antialiased">
    @if (Route::is('login'))
        @include('navbar.main_navbar')
        <div class="min-h-screen flex flex-col justify-center items-center p-8 lg:pt-20  dark:bg-gray-900"
            style="background-image: url('{{ asset('images/yellowbg.png') }}')">
            <div class="w-full sm:max-w-md px-8 py-8 bg-white  dark:bg-gray-800 shadow-lg overflow-hidden rounded-2xl">
                {{ $slot }}
            </div>
        </div>
        @include('navbar.main_footer')
    @elseif(Route::is('register'))
        @include('navbar.main_navbar')
        <div class="flex items-center justify-center pt-20 lg:pt-32 pb-10 px-5 "
            style="background-image: url('{{ asset('images/redbackground.png') }}')">
            <div class=" max-w-md lg:max-w-screen-lg px-4 py-8 bg-white dark:bg-gray-800 shadow-md rounded-2xl">
                {{ $slot }}
            </div>
        </div>
        @include('navbar.main_footer')
    @elseif(Route::is('pets'))
        @include('navbar.main_navbar')
        <div class="mt-20">
            {{ $slot }}
        </div>
        @include('navbar.main_footer')
    @elseif(Route::is('home'))
        @include('navbar.main_navbar')
        <div class="mt-20">
            {{ $slot }}
        </div>
        @include('navbar.main_footer')
    @elseif(Route::is('about'))
        @include('navbar.main_navbar')
        <div class="mt-20">
            {{ $slot }}
        </div>
        @include('navbar.main_footer')
    @elseif(Route::is('contact'))
        @include('navbar.main_navbar')
        <div class="mt-5">
            {{ $slot }}
        </div>
        @include('navbar.main_footer')
    @elseif(Route::is('how'))
        @include('navbar.main_navbar')
        <div class="mt-20">
            {{ $slot }}
        </div>
        @include('navbar.main_footer')
    @elseif(Route::is('pet.desc'))
        @include('navbar.main_navbar')
        <div class="mt-20">
            {{ $slot }}
        </div>
        @include('navbar.main_footer')
    @else
        @include('navbar.main_navbar')
        <div class="mt-20 flex justfify-center align-center w-full">
            <div class="w-full sm:max-w-md px-6 py-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        @include('navbar.main_footer')
    @endif


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="/js/crud.js">
        deletepet
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="/js/crud.js">
        deletepet
    </script>
    <script src=""></script>
    @livewireScripts
</body>

</html>
