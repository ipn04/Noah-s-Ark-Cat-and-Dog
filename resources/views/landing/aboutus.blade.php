<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Noah's Ark Dog and Cat Shelter</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>


        <style>
            .smooth-transition {
                transition: all 0.3s ease-in-out;
            }
            </style>
       
    </head>

    <body class="antialiased bg-slate-50">
      
        @include('layouts.landingpage')
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>


            <script>
                document.getElementById('toggleButton').addEventListener('click', function() {
                    this.classList.toggle('smooth-transition'); 
                });
            </script>
    </body>
</html>
