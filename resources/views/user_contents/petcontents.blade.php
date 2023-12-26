<x-app-layout>
    <x-slot name="title">Pets content Page</x-slot>
    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        @if($pets && is_object($pets))
        <div class = "flex justify-between items-center py-4 px-10">
        <div class = "flex gap-2">
            <a href = "{{ route('user.dashboard') }}" class = "text-lg hover:font-bold hover:cursor-pointer hover:text-red-700">Home</a>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg text-red-500">{{ $pets->pet_name }}</h2>
        </div>
        <div>
            <a href = "{{ route('user.adoption', $pets->id) }}"class = "hover:bg-white p-3 hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md">Adopt {{ $pets->pet_name }} </a>
        </div>
        </div>

        <div class = "grid grid-cols-1 lg:grid-cols-2 lg:gap-10 container lg:py-5 lg:px-14">
            <div class = "bg-white shadow-md rounded-lg">
                aA
            </div>
            
            <div class = "bg-white shadow-md rounded-lg">
            </div>

        </div>
        @else
            <p>No pet found</p>
        @endif
    </section>
</x-app-layout>
