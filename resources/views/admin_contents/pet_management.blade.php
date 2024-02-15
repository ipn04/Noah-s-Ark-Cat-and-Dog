<x-app-layout>
    <x-slot name="title">Pet Page</x-slot>
    @include('admin_top_navbar.admin_top_navbar')
    @include('sidebars.admin_sidebar')
    <div class="sm:ml-64">
        <div class="py-4 bg-red-800">
            <div class="container mx-auto">
                <!-- 2 columns on small screens, 3 columns on medium screens, 4 columns on large screens -->
                <div class="grid grid-cols-1  p-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 px-8">
                    <!-- Column 1 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">All Pets</p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $petCount }}</p>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z" />
                                <path fill-rule="evenodd"
                                    d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">Available Dogs</p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $dogCount }}</p>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M11.25 5.337c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.036 1.007-1.875 2.25-1.875S15 2.34 15 3.375c0 .369-.128.713-.349 1.003-.215.283-.401.604-.401.959 0 .332.278.598.61.578 1.91-.114 3.79-.342 5.632-.676a.75.75 0 01.878.645 49.17 49.17 0 01.376 5.452.657.657 0 01-.66.664c-.354 0-.675-.186-.958-.401a1.647 1.647 0 00-1.003-.349c-1.035 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401.31 0 .557.262.534.571a48.774 48.774 0 01-.595 4.845.75.75 0 01-.61.61c-1.82.317-3.673.533-5.555.642a.58.58 0 01-.611-.581c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.035-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959a.641.641 0 01-.658.643 49.118 49.118 0 01-4.708-.36.75.75 0 01-.645-.878c.293-1.614.504-3.257.629-4.924A.53.53 0 005.337 15c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.036 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.369 0 .713.128 1.003.349.283.215.604.401.959.401a.656.656 0 00.659-.663 47.703 47.703 0 00-.31-4.82.75.75 0 01.83-.832c1.343.155 2.703.254 4.077.294a.64.64 0 00.657-.642z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">Available Cats</p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $catCount }}</p>
                        </div>
                    </div>


                    <!-- Add more columns as needed -->

                </div>
            </div>
        </div>
    </div>



    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            @if ($errors->any())
                <script>
                    var errorMessages = [];
                    @foreach ($errors->all() as $error)
                        errorMessages.push("{{ $error }}");
                    @endforeach

                    // Check if there are error messages before showing the alert
                    if (errorMessages.length > 0) {
                        swal({
                            title: "Error!",
                            text: errorMessages.join('\n'), // Join error messages with line breaks
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }
                </script>
            @endif

            @if (session('pet_added'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        swal(
                            "You successfully added a pet!",
                            "Press 'OK' to exit!",
                            "success"
                        )
                    });
                </script>
            @endif
            @if (session('pet_updated'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        swal(
                            "You successfully updated a pet!",
                            "Press 'OK' to exit!",
                            "success"
                        )
                    });
                </script>
            @endif
            @if (session('pet_deleted'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        swal(
                            "You successfully deleted a pet!",
                            "Press 'OK' to exit!",
                            "success"
                        )
                    });
                </script>
            @endif
        </div>

        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">List of Pets</h1>
                    <button type="button" id="createProductButton" data-modal-target="createProductModal"
                        data-modal-toggle="createProductModal"
                        class="flex lg:hidden items-center justify-center text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Pet
                    </button>
                </div>
            </div>



            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden overflow-x-hidden  bg-white overflow-x-auto flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between">
                <div
                    class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between p-4 lg:px-4 lg:py-6">
                    <div class="w-full md:w-1/2">
                        <form role="search" class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" placeholder="Search pet" name="search"
                                    required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
                    </div>

                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" id="createProductButton" data-modal-target="createProductModal"
                            data-modal-toggle="createProductModal"
                            class=" hidden lg:flex items-center justify-center text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Pet
                        </button>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-500 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
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

                <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Pets name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gender
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Vaccination Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Adoption Status
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pets->isNotEmpty())
                            @foreach ($pets as $pet)
                                @if ($pet->adoption_status != "deleted")
                                    <tr data-name="{{ $pet->pet_name }}" data-type="{{ $pet->pet_type }}"
                                        data-adoption="{{ $pet->adoption_status }}" data-gender="{{ $pet->gender }}"
                                        data-vaccination="{{ $pet->vaccination_status }}" data-size="{{ $pet->size }}"
                                        class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row"
                                            class="flex items-center px-5 py-4 font-medium text-slate-600 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10  object-cover rounded-full"
                                                src="{{ asset('storage/images/' . $pet->dropzone_file) }}"
                                                alt="Pet Image">
                                            <div class="ps-2 flex flex-col">
                                                <div class="text-lg lg:text-base">{{ $pet->pet_name }}</div>
                                                <div class="text-sm  lg:hidden">
                                                    @if ($pet->adoption_status === 'Available')
                                                        <div
                                                            class="text-green-600 w-20 rounded-lg py-1 font-semibold bg-green-200">
                                                            <p class="text-center">{{ $pet->adoption_status }}</p>
                                                        </div>
                                                    @elseif ($pet->adoption_status === 'Adopted')
                                                    
                                                        <div
                                                            class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                            <p class="text-center">Not Available</p>
                                                        </div>
                                                    @else
                                                        <div
                                                        class="text-blue-600 w-24 rounded-lg py-1 font-semibold bg-blue-200">
                                                        <p class="text-center">{{ $pet->adoption_status }}</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4  hidden lg:table-cell">
                                            <div class="text-base text-gray-500 ">{{ $pet->pet_type }}</div>
                                        </td>
                                        <td class="px-6 py-4  hidden lg:table-cell">
                                            <div class="text-base text-gray-500  ">{{ $pet->gender }}</div>
                                        </td>
                                        <td class="px-6 py-4  hidden lg:table-cell ">
                                            <div class="text-base text-gray-500 ">{{ $pet->vaccination_status }}</div>
                                        </td>
                                        <td class="px-6 py-4  hidden lg:table-cell">
                                            @if ($pet->adoption_status === 'Available')
                                            
                                                <div
                                                    class="text-base text-green-600 w-28 rounded-lg py-1 font-semibold bg-green-200">
                                                    <p class = "text-center"> Available
                                                    </p>
                                                </div>
                                            @elseif($pet->adoption_status === 'Adopted')
                                                <div
                                                    class="text-base text-cyan-600 w-28 rounded-lg py-1 font-semibold bg-cyan-200">
                                                    <p class = "text-center">Adopted
                                                    </p>
                                                </div>
                                            @elseif($pet->adoption_status === 'deleted')
                                                <div
                                                    class="text-base text-white-200 w-28 rounded-lg py-1 font-semibold bg-red-400">
                                                    <p class = "text-center">Deleted
                                                    </p>
                                                </div>
                                            @else
                                                <div
                                                    class="text-base text-red-600 w-20 rounded-lg py-1 font-semibold bg-red-200">
                                                    <p class = "text-center">Not Available
                                                    </p>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="items-center gap-1  hidden lg:table-cell">
                                            @if ($pets->isNotEmpty())
                                                <button type="button" data-drawer-target="drawer-read-product-advanced"
                                                    onclick="previewPetDetails('{{ $pet->id }}')"
                                                    data-drawer-show="drawer-read-product-advanced"
                                                    aria-controls="drawer-read-product-advanced"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4 ">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                </button>
                                                {{-- update --}}
                                                <button type="button"
                                                    data-drawer-target="drawer-update-product-{{ $pet->id }}"
                                                    data-drawer-show="drawer-update-product-{{ $pet->id }}"
                                                    aria-controls="drawer-update-product-{{ $pet->id }}"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-yellow-400 hover:bg-yellow-600 rounded-lg shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 "
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    data-modal-target="delete-modal-{{ $pet->id }}"
                                                    data-modal-toggle="delete-modal-{{ $pet->id }}"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 "
                                                        viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            <div x-data="{ dropdownOpen: false }">
                                                <button @click="dropdownOpen = !dropdownOpen"
                                                    class="flex lg:hidden items-center gap-1 focus:outline-none">
                                                    Actions
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd"
                                                            d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown content -->
                                                <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                                                    class="absolute bg-white border rounded shadow-md mt-2 max-w-24"
                                                    x-cloak>
                                                    <a href="#"
                                                        class="flex items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-100">
                                                        <div class="flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-4 h-4">
                                                                <path
                                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                                <path
                                                                    d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                            </svg>
                                                            <span class="ml-1">Edit</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="flex items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-100">
                                                        <div class="flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-4 h-4">
                                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="ml-1">Show</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="flex items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-100">
                                                        <div class="flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-4 h-4">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="ml-1">Delete</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <div id="delete-modal-{{ $pet->id }}" tabindex="-1"
                                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full h-auto max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                        data-modal-toggle="delete-modal-{{ $pet->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <svg aria-hidden="true"
                                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                            fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <h3
                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Are you sure you want to delete this?</h3>
                                                        <form method="POST" action="{{ route('pets.delete', ['id' => $pet->id]) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <button
                                                                type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Yes,
                                                                I'm sure
                                                            </button>
                                                            <button data-modal-toggle="delete-modal-{{ $pet->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                cancel
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td colspan="5" class="px-6 py-4 text-center">
                                    No data found.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div
                    class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-20 md:space-y-0 justify-between p-4 lg:px-4 lg:py-6">
                    <div class="w-full md:w-1/2">
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </div>
                </div>

            </div>
        </div>

    </section>

    <div id="filterDropdown" class="z-50 hidden py-1 px-3 bg-white rounded-lg shadow w-60 dark:bg-gray-700 right-0">
        <div class="flex items-center justify-between pt-2">
            <h6 class="text-sm font-medium text-black dark:text-white">Filters</h6>
        </div>
        <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-black dark:text-white"
            data-inactive-classes="text-gray-500 dark:text-gray-400">
            <h2 id="category-heading">
                <button type="button"
                    class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-accordion-target="#category-body" aria-expanded="true" aria-controls="category-body">
                    <span>Pet Type</span>
                    <svg aria-hidden="true" data-accordion-icon="" class="w-5 h-5 rotate-180 shrink-0"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
            </h2>

            <div id="category-body" class="hidden" aria-labelledby="category-heading">
                <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <input id="filter_dog" type="checkbox" value="Dog"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_dog"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Dog</label>
                        </li>
                        <li class="flex items-center">
                            <input id="filter_cat" type="checkbox" value="Cat"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_cat"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Cat</label>
                        </li>
                    </ul>
                </div>
            </div>

            <h2 id="adoption-heading">
                <button type="button"
                    class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-accordion-target="#adoption-body" aria-expanded="true" aria-controls="adoption-body">
                    <span>Adoption Status</span>
                    <svg aria-hidden="true" data-accordion-icon="" class="w-5 h-5 rotate-180 shrink-0"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
            </h2>

            <div id="adoption-body" class="hidden" aria-labelledby="adoption-heading">
                <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <input id="filter_available" type="checkbox" value="Available"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_available"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Available</label>
                        </li>
                        <li class="flex items-center">
                            <input id="filter_unavailable" type="checkbox" value="Unavailable"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_unavailable"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Unavailable</label>
                        </li>
                    </ul>
                </div>
            </div>

            <h2 id="gender-heading">
                <button type="button"
                    class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-accordion-target="#gender-body" aria-expanded="true" aria-controls="gender-body">
                    <span>Pet Gender</span>
                    <svg aria-hidden="true" data-accordion-icon="" class="w-5 h-5 rotate-180 shrink-0"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
            </h2>

            <div id="gender-body" class="hidden" aria-labelledby="gender-heading">
                <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <input id="filter_male" type="checkbox" value="Male"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_male"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Male</label>
                        </li>
                        <li class="flex items-center">
                            <input id="filter_female" type="checkbox" value="Female"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_female"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Female</label>
                        </li>
                    </ul>
                </div>
            </div>

            <h2 id="vacStatus-heading">
                <button type="button"
                    class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-accordion-target="#vacStatus-body" aria-expanded="true" aria-controls="vacStatus-body">
                    <span>Vaccination Status</span>
                    <svg aria-hidden="true" data-accordion-icon="" class="w-5 h-5 rotate-180 shrink-0"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
            </h2>

            <div id="vacStatus-body" class="hidden" aria-labelledby="vacStatus-heading">
                <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <input id="filter_Fully_Vaccinated" type="checkbox" value="Fully Vaccinated"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_Fully_Vaccinated"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Fully
                                Vaccinated</label>
                        </li>
                        <li class="flex items-center">
                            <input id="filter_Not_Vaccinated" type="checkbox" value="Not Vaccinated"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_Not_Vaccinated"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Not
                                Vaccinated</label>
                        </li>
                    </ul>
                </div>
            </div>

            <h2 id="size-heading">
                <button type="button"
                    class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-accordion-target="#size-body" aria-expanded="true" aria-controls="size-body">
                    <span>Pet Size</span>
                    <svg aria-hidden="true" data-accordion-icon="" class="w-5 h-5 rotate-180 shrink-0"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
            </h2>

            <div id="size-body" class="hidden" aria-labelledby="size-heading">
                <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <input id="filter_small" type="checkbox" value="Small"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_small"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Small</label>
                        </li>
                        <li class="flex items-center">
                            <input id="filter_medium" type="checkbox" value="Medium"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_medium"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Medium</label>
                        </li>
                        <li class="flex items-center">
                            <input id="filter_large" type="checkbox" value="Large"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="filter_large"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Large</label>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End block -->
    <div id="createProductModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0.5rem)] max-h-full">
        <div class="relative p-4  w-full max-w-3xl h-screen">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow  dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-2 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-bold text-red-500 dark:text-white">Add Pet</h3>
                    <button type="button" id="addclose"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="createProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="{{ route('addPet') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="pet_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pet Name</label>
                            <input type="text" name="pet_name" id="pet_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Pet Name" required="">
                        </div>
                        <div>
                            <label for="breed"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Breed</label>
                            <input type="text" name="breed" id="breed"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Breed" required="">
                        </div>
                        <div>
                            <label for="age"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                            <input type="number" name="age" id="age"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Age" required="">
                        </div>
                        <div>
                            <label for="color"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                            <input type="text" name="color" id="color"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Color" required="">
                        </div>
                        <div><label for="pet_type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label><select
                                name="pet_type" id="pet_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                            </select></div>
                        <div><label for="adoption_status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adoption
                                Status</label><select name="adoption_status" id="adoption_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                                <option value="Adopted">Adopted</option>

                            </select></div>
                        <div><label for="gender"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label><select
                                name="gender" id="gender"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="Male">Male</option>
                                <option value="Female">Female</option>
                            </select></div>
                        <div><label for="vaccination_status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vaccination
                                Status</label><select name="vaccination_status" id="vaccination_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="Vaccinated">Not Vaccinated</option>
                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                            </select></div>
                        <div class="grid gap-4 sm:col-span-2 md:gap-6 sm:grid-cols-3">
                            <div>
                                <label for="weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight
                                    (kg)</label>
                                <input type="number" name="weight" id="weight"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="5" required="" step="any">
                            </div>
                            <div>
                                <div><label for="size"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label><select
                                        name="size" id="size"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="Small">Small</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Large">Large</option>
                                    </select></div>
                            </div>
                            <div>
                                <div><label for="behaviour"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Behaviour</label><select
                                        name="behaviour" id="behaviour"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="Friendly">Friendly</option>
                                        <option value="Aggressive">Aggressive</option>
                                        <option value="Playful">Playful</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="sm:col-span-2"><label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Pet description here"></textarea>
                        </div>
                    </div>
                    <div class="mb-4">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pet Image</span>
                        <div class="px-4 ">
                            <div class="container bg-gray-50 max-w-md w-full mx-auto p-8 rounded-3xl">
                                <input name="dropzone_file" id="dropzone_file" type="file" class="hidden" accept="image/*">
                                <div class="img-area bg-gray-200 p-5 rounded-lg " data-img="">
                                  <i class='bx bxs-cloud-upload icon text-6xl'></i>
                                  <h3 class="text-2xl font-semibold mb-2">Upload Image</h3>
                                  <p class="text-gray-600">Image size must be less than <span class="font-bold">2MB</span></p>
                                  <img id="previewImage" class="hidden w-full mx-auto max-h-56 object-cover" alt="Image preview">

                                </div>
                                <button type="button" class="select-image bg-red-500 text-white w-full py-4 mt-4 rounded-lg bg-blue  font-semibold text-xl transition duration-300 hover:bg-dark-blue focus:outline-none">
                                  Select Image
                                </button>
                              </div>

                            {{-- <div id="image-preview" class="max-w-sm max-h-64 p-4 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input name="dropzone_file" id="dropzone_file" type="file" class="hidden"
                                    accept="image/*" />
                                <label for="dropzone_file" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                    <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div> --}}
                        </div>
                        {{-- IVAN PA CONNECT NALANG ITO HEHEHEHE AS BACKEND TY ILY --}}
                        {{-- <div class="flex justify-center items-center w-full">
                            <label for="dropzone_file"
                                class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Click to upload</span>
                                        or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400" id="file-name-placeholder">
                                        SVG, PNG, JPG or GIF</p>
                                </div>
                                <input name="dropzone_file" id="dropzone_file" type="file" class="hidden"
                                    accept="image/*"
                                    onchange="document.getElementById('file-name-placeholder').innerText = this.files[0].name;">
                            </label>
                        </div> --}}
                    </div>
                    <div class="items-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <button type="submit"
                            class="w-full sm:w-auto justify-center text-white inline-flex bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-primary-800">Add
                            Pet</button>

                        <button id="dcdc" data-modal-toggle="createProductModal" type="button"
                            class="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- drawer component -->
    {{-- dito update --}}
    @foreach ($pets as $pet)
        <form action="{{ route('pets.update', ['id' => $pet->id]) }}" method="POST"
            id="drawer-update-product-{{ $pet->id }}"
            class="update-form fixed top-0 left-0 z-40 w-full h-screen max-w-xl p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
            tabindex="-1" aria-labelledby="drawer-update-product-label" aria-hidden="true"
            enctype="multipart/form-data" class="update-form">
            @csrf
            @method('PUT')
            <!-- Modal header -->
            <div class="flex justify-between items-centers border-b rounded-t sm:mb-5 dark:border-gray-600">
                <h5 id="drawer-label"
                    class="inline-flex items-center pb-3 text-lg  font-bold text-red-500  dark:text-gray-400">Update
                    Pet Information</h5>
                <button id = "exitupdate" type="button"
                    data-drawer-dismiss="drawer-update-product-{{ $pet->id }}"
                    aria-controls="drawer-update-product-{{ $pet->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
            </div>

            <div class="grid gap-1 sm:grid-cols-3 sm:gap-6 ">
                <div class="space-y-4 sm:col-span-2 sm:space-y-6 max-w-sm">
                    <div class = "">
                        <label for="pet_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pet
                            Name</label>
                        <input type="text" name="pet_name" id="pet_name" value="{{ $pet->pet_name }}"
                            class="update-name bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="">
                    </div>
                    <div class = "flex justify-between">
                        <div>
                            <label for="age"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                            <input type="number" id="age" value="{{ $pet->age }}" name="age"
                                class="update-age bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Age" required="">
                        </div>
                        <div>
                            <label for="weight"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight
                                (kg)</label>
                            <input type="number" name="weight" id="weight" value="{{ $pet->weight }}"
                                class="update-weight bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Ex. 12" required="">
                        </div>
                    </div>
                    <div>
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <div
                            class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <div class="px-4 py-3 bg-white rounded-b-lg dark:bg-gray-800">
                                <textarea id="description" name="description" rows="8"
                                    class="update-description block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Write pet description here" required="">{{ $pet->description }} </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pet Image</span>
                        <div class="gap-4 mb-4">
                            <div class="w-full max-w-sm  mb-4">
                                <img class="h-full w-full max-h-64 update_pet_image" alt="Pet Image"
                                    src="{{ asset('storage/images/' . $pet->dropzone_file) }}">
                            </div>
                        </div>


                        <div class="flex justify-center items-center w-full">
                            <label for="dropzone_file_update-{{$pet->id}}"
                                class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500" id="file-name-placeholder-update">SVG, PNG, JPG
                                        or GIFFF</p>
                                </div>
                                <input name="dropzone_file" id="dropzone_file_update-{{$pet->id}}" type="file" class="hidden"
                                    accept="image/*"
                                    onchange="console.log('File uploaded:', this.value); document.getElementById('file-name-placeholder-update').innerText = this.files[0] ? this.files[0].name : 'SVG, PNG, JPG or GIF';">
                            
                            
                                </label>
                        </div>

                    </div>
                    <div class="hidden lg:grid grid-cols-2 gap-4 mt-6">
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update
                            pet</button>
                        <button type="button"
                            class="text-red-600 inline-flex justify-center items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg aria-hidden="true" class="w-5 h-5 mr-1 -ml-1" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
                <div class="space-y-4 sm:space-y-6">
                    <div>
                        <label for="breed"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Breed</label>
                        <input type="text" id="breed" value="{{ $pet->breed }}" name="breed"
                            class="update-breed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Pet Breed" required="">
                    </div>

                    <div>
                        <label for="color"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                        <input type="text" id="color" value="{{ $pet->color }}" name="color"
                            class="update-color bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Color" required="">
                    </div>

                    <div>
                        <label for="pet_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <select id="pet_type" name="pet_type"
                            class="update-type bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Dog" {{ $pet->pet_type === 'Dog' ? 'selected' : '' }}>Dog</option>
                            <option value="Cat" {{ $pet->pet_type === 'Cat' ? 'selected' : '' }}>Cat</option>
                        </select>
                    </div>
                    <div>
                        <label for="adoption_status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adoption
                            Status</label>
                        <select id="adoption_status" name="adoption_status"
                            class="update-adoption-status bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Available" {{ $pet->adoption_status === 'Available' ? 'selected' : '' }}>
                                Available</option>
                            <option value="Unavailable"
                                {{ $pet->adoption_status === 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                            <option value="Unavailable"
                                {{ $pet->adoption_status === 'Adopted' ? 'selected' : '' }}>Adopted</option>
                        </select>
                    </div>
                    <div>
                        <label for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select id="gender" name="gender"
                            class="update-gender bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Male" {{ $pet->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $pet->gender === 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="vaccination_status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vaccination
                            Status</label>
                        <select id="vaccination_status" name="vaccination_status"
                            class="update-vaccination-status bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Fully Vaccinated"
                                {{ $pet->vaccination_status === 'Fully Vaccinated' ? 'selected' : '' }}>Fully
                                Vaccinated</option>
                            <option value="Not Vaccinated"
                                {{ $pet->vaccination_status === 'Not Vaccinated' ? 'selected' : '' }}>Not Vaccinated
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="update-size"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                        <select id="update-size" name="update-size"
                            class="update-size bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Small" {{ $pet->size === 'Small' ? 'selected' : '' }}>Small</option>
                            <option value="Medium" {{ $pet->size === 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="Large" {{ $pet->size === 'Large' ? 'selected' : '' }}>Large</option>
                        </select>
                    </div>
                    <div>
                        <label for="behaviour"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Behaviour</label>
                        <select id="behaviour" name="behaviour"
                            class="update-behaviour bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Friendly" {{ $pet->behaviour === 'Friendly' ? 'selected' : '' }}>Friendly
                            </option>
                            <option value="Aggressive" {{ $pet->behaviour === 'Aggressive' ? 'selected' : '' }}>
                                Aggressive</option>
                            <option value="Playful" {{ $pet->behaviour === 'Playful' ? 'selected' : '' }}>Playful
                            </option>
                        </select>
                    </div>
                    <div class="grid lg:hidden grid-cols-2 gap-4 mt-6">
                        <button type="submit"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update
                            pet</button>
                        <button type="button"
                            class="text-red-600 inline-flex justify-center items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg aria-hidden="true" class="w-5 h-5 mr-1 -ml-1" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
            </div>

        </form>
    @endforeach
    <!-- Preview Drawer -->
    <div id="drawer-read-product-advanced"
        class="overflow-y-auto fixed top-0 left-0 z-40 p-4 w-full max-w-lg h-screen bg-white transition-transform -translate-x-full dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">

        <div>
            <h5 id="read-drawer-label" class="mb-4 leading-none text-2xl font-bold text-gray-900 dark:text-white">Pet
                Details</h5>
        </div>
        <button type="button" data-drawer-dismiss="drawer-read-product-advanced"
            aria-controls="drawer-read-product-advanced"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <dl class="grid grid-cols-2 gap-4 mb-4">
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Name</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_name"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Type</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_type"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Breed</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_breed"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Age</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_age"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Color</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_color"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Gender</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_gender"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Weight</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_weight"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Size</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_size"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Behaviour</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_behaviour"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Adoption Status</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 adoption_status"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Vaccination Status</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 vaccination_status"></h4>
            </div>
            <div
                class="col-span-2 p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Description</dt>
                <h4 class="flex items-center text-gray-500 dark:text-gray-400 pet_description"></h4>
            </div>
        </dl>
        <div class="w-full mb-4">
            <img class="h-full w-full pet_image" alt="Pet Image">
        </div>
        {{-- <div class="flex left-0 justify-center space-x-4 w-full">
            @if ($pets->isNotEmpty())
                <button type="button" data-drawer-target="drawer-update-product-{{ $pet->id }}"
                    data-drawer-show="drawer-update-product-{{ $pet->id }}"
                    data-drawer-dismiss="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced"
                    class="text-white w-full inline-flex items-center justify-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd" />
                    </svg>
                    Edit
                </button>
                <button type="button" data-modal-target="delete-modal-{{ $pet->id }}"
                    data-modal-toggle="delete-modal-{{ $pet->id }}"
                    class="inline-flex w-full items-center text-white justify-center bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" />
                    </svg>
                    Delete
                </button>
            @else
            @endif --}}
        </div>
    </div>

</x-app-layout>
