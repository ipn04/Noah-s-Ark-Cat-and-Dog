<x-app-layout>
    <x-slot name="title">Adoption Form Page</x-slot>
    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class = "flex gap-2  py-4 px-10">
            @if($pets && is_object($pets))

            <a href = "{{ route('user.dashboard') }}" class = "text-lg hover:font-bold hover:cursor-pointer hover:text-red-500">Home</a>
            <p class = "text-lg">>></p>
            <a href = "{{ route('user.pet', $pets->id) }}"class="font-bold text-lg hover:text-red-500 ">Czarina</a>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg text-red-500">Adoption Form</h2>
        </div>


            @else
            @endif
    </section>
</x-app-layout>
