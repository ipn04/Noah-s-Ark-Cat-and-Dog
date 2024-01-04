<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Noah's Ark Dog and Cat Shelter</title>

    <!-- Logo -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!--sweet alert-->
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFjsYumj3DdiY6pQpp_dggIHH6ZB7s09Q&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha384-w4u1eJHUVShdxxD6m1PCjsjAq9XOy3Wh62Ie8J0xfoFZ5bRykplfEcf5orZmRfoA" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900  antialiased">
    @if (Route::is('login'))
        @include('navbar.main_navbar')
        <div class="min-h-screen flex flex-col justify-center items-center p-8 lg:pt-20 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-md px-8 py-8 bg-white  dark:bg-gray-800 shadow-lg overflow-hidden rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    @elseif(Route::is('register'))
        @include('navbar.main_navbar')
        <div class="flex items-center justify-center pt-20 lg:pt-32 pb-10 px-5 bg-gray-100">
            <div class=" max-w-md lg:max-w-screen-lg px-4 py-8 bg-white dark:bg-gray-800 shadow-md rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    @elseif(Route::is('pets'))
        @include('navbar.main_navbar')
        <div class="mt-20">
            {{ $slot }}
        </div>
    @elseif(Route::is('ivan'))
        @include('navbar.main_navbar')
        <div class="mt-20">
            {{ $slot }}
        </div>
    @else
        @include('navbar.main_navbar')
        <div class="mt-20 flex justfify-center align-center w-full">
            <div class="w-full sm:max-w-md px-6 py-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    @endif


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="/js/crud.js">
        deletepet
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>

    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>

    <script type="text/javascript">
    
        var my_handlers = {

            fill_provinces: function() {

                var region_code = $(this).val();
                $('#province').ph_locations('fetch_list', [{
                    "region_code": region_code
                }]);

            },

            fill_cities: function() {

                var province_code = $(this).val();
                $('#city').ph_locations('fetch_list', [{
                    "province_code": province_code
                }]);
            },


            fill_barangays: function() {

                var city_code = $(this).val();
                $('#barangay').ph_locations('fetch_list', [{
                    "city_code": city_code
                }]);
            }
        };

        $(function() {
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);

            $('#region').ph_locations({
                'location_type': 'regions'
            });
            $('#province').ph_locations({
                'location_type': 'provinces'
            });
            $('#city').ph_locations({
                'location_type': 'cities'
            });
            $('#barangay').ph_locations({
                'location_type': 'barangays'
            });

            $('#region').ph_locations('fetch_list');
        });
    </script>
</body>

</html>
