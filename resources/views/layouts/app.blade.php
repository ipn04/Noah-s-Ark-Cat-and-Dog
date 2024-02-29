<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <title>Noah's Ark Dog and Cat Shelter</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
        
        <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

        <link rel="stylesheet" href="/css/main.css">
      

        <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFjsYumj3DdiY6pQpp_dggIHH6ZB7s09Q&callback=console.debug&libraries=maps,marker&v=beta">
        </script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src='https://meet.jit.si/external_api.js'></script>
        <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.3.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'public/js/ph-address-selector.js'])
        @livewireStyles
        
    </head>
    <body class="font-sans bg-gray-100 antialiased
    @if(Route::is('chat'))
    bg-white
    @else
    @endif">
        <div class=" 
        @if(Route::is('admin.adoptionprogress') || Route::is('view.users') || Route::is('user.adoption') || Route::is('user.pet') || Route::is('admin.adoptions') || Route::is('admin.volunteers') || Route::is('admin.schedule') || Route::is('profile.edit') || Route::is('user.dashboard') ||  Route::is('user.applications'))
        bg-transparent
        @else
        bg-red-800
        @endif 
        dark:bg-gray-900">

           
        </div>
        <main>
            {{ $slot }}
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
        {{-- <script src="/js/chart.js"></script> --}}
        <script src="/js/crud.js">deletepet</script>       
        <script src="/js/jitsi.js"></script>
        <script src="https://kit.fontawesome.com/729fd96d7a.js" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        @livewireScripts
    </body>
</html>
