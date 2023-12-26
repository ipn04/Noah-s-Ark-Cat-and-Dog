<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Noah's Ark Dog and Cat Shelter</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
        
        <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

        <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFjsYumj3DdiY6pQpp_dggIHH6ZB7s09Q&callback=console.debug&libraries=maps,marker&v=beta">
        </script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans bg-gray-100 antialiased	">
        <div class=" 
        @if( Route::is('user.adoption') || Route::is('user.pet') || Route::is('admin.adoptions') || Route::is('admin.volunteers') || Route::is('admin.schedule') || Route::is('profile.edit') || Route::is('user.dashboard') ||  Route::is('user.applications'))
        bg-transparent
        @else
        bg-red-800
        @endif dark:bg-gray-900">
            
            @include('layouts.navigation')
            
            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
           
        </div>
        <main>
            {{ $slot }}
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
        <script src="/js/chart.js"></script>
        <script src="/js/crud.js">deletepet</script>       
    </body>
</html>
