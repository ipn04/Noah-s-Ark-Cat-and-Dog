<x-guest-layout>

<section class="text-gray-600 body-font mt-10 p-10 lg:px-20 lg:py-10" style="background-image: url('{{ asset('images/whitebg.png') }}');">
    <div>
    <h1 class = "text-center lg:text-5xl text-4xl font-bold text-red-600">Pets Available for Adoption</h1>
    <div
    class=" flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 items-center justify-center p-4 lg:px-4 lg:py-6">
    <div class="w-full md:w-1/2">
        <form role="search" class="flex items-center">
            <label for="user-pet-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                    </svg>
                </div>
                <input type="text" id="user-pet-search" placeholder="Search pet" name="search"
                    required=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
        </form>
    </div>

    <div
        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-1.5 -ml-1 "
                viewbox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                    clip-rule="evenodd" />
            </svg>
            Filter options
            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
            </svg>
        </button>
    </div>
    </div>
</div>
{{-- tama --}}
<div class = "flex justify-center items-center">
    <div class="lg:px-10 lg:py-5 grid lg:grid-cols-4 grid-cols-1 gap-8 px-5 py-2 lg:gap-6 ">
        @if ($pets->isNotEmpty())
            @foreach ($pets as $pet)
                <a href="{{ route('user.pet', $pet->id) }}"
                    class="h-fit w-full group shadow-xl rounded-lg user-pet-lists"
                    data-name="{{ $pet->pet_name }}">
                    <div class="relative overflow-hidden hover:cursor-pointer">
                        <img class="h-72 w-full rounded-xl object-cover"
                            src="{{ asset('storage/images/' . $pet->dropzone_file) }}" alt="Pet Image">
                        <div
                            class="absolute rounded-xl bottom-0 h-full w-full bg-black/30 items-center group-hover:opacity-100 opacity-0 transition-opacity duration-300">
                            <div class="absolute bottom-8 pl-3">
                                <h2 class=" font-bold text-xl text-white">{{ $pet->pet_name }}</h2>
                                <p class="text-base font-normal inline-block text-white">{{ $pet->pet_type }} •
                                    {{ $pet->gender }}</p>
                            </div>
                        </div>
                    </div>
                </a>
               
            @endforeach
        @else
        @endif

    </div>
</div>
</section>
</x-guest-layout>
{{-- dito pet page. Ako na bahala dito --}}