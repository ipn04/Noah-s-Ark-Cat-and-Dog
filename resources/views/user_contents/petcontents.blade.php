<x-app-layout>
    <x-slot name="title">Pets content Page</x-slot>
    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        
        @if($pets && is_object($pets))
            <h2 class="font-bold text-xl">{{ $pets->pet_name }}</h2>
            <p class="text-base font-normal inline-block">{{ $pets->pet_type }} • {{ $pets->gender }}</p>
        @else
            <p>No pet found</p>
        @endif
    </section>
</x-app-layout>
