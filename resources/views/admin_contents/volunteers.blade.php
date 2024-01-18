<x-app-layout>
    <x-slot name="title">Volunteers Page</x-slot>
    @include('admin_top_navbar.admin_top_navbar')
    @include('sidebars.admin_sidebar')

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
                    <h1 class = "text-2xl text-red-500 font-bold">Volunteers Applications</h1>
                </div>
            </div>
            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">

                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('admin.volunteers') }}" id="allLink" class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all" class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $volunteerCount }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.volunteers') }}" id="pendingLink" class="inline-block p-4 text-base rounded-t-lg flex items-center justify-between">Pending
                                <span id="pending" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $volunteerPendingCount }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.volunteers') }}" id="approvedLink" class="inline-block text-base p-4 rounded-t-lg flex items-center justify-between">Approved
                                <span  id="approved" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $volunteerApprovedCount }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.volunteers') }}" id="rejectedLink" class="inline-block text-base p-4 rounded-t-lg  flex items-center justify-between">Rejected
                                <span  id="rejected" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                   {{ $volunteerRejectedCount }}
                                </span>
                            </a>
                        </li>      
                    </ul>
                </div>

                <div
                    class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between p-4 ">
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
                                <input type="text" id="simple-search" placeholder="Search user" name="search"
                                    required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <form action="{{route('export.volunteer')}}">
                            <button  type="submit" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-white focus:outline-none bg-green-800 rounded-lg border border-green-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                Successful Volunteer Applications
                            </button>
                        </form>
                    </div>         
                </div>

                <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Applicant Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date of Application
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stage
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Progress
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($volunteer as $volunteers)
                            <tr id="volunteerData"  data-stage="{{ $volunteers->volunteer_application->stage }}" data-name="{{$volunteers->volunteer_application->application->user->firstname . ' ' . $volunteers->volunteer_application->application->user->name}}"
                                class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row"
                                    class="flex items-center px-5 py-4 font-medium text-slate-600 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ asset('storage/' . $volunteers->volunteer_application->application->user->profile_image) }}"
                                        alt="Pet Image">
                                    <div class="ps-2 flex flex-col">
                                        <div class="text-lg lg:text-base">
                                            {{ $volunteers->volunteer_application->application->user->firstname }}
                                            {{ $volunteers->volunteer_application->application->user->name }}</div>
                                    </div>
                                </td>

                                <td class="px-6 py-4  hidden lg:table-cell">
                                    <div class="text-base text-gray-500 ">{{ \Carbon\Carbon::parse($volunteers->created_at)->format('M d, Y g:ia') }}</div>
                                </td>
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    <div
                                        class=" w-24 rounded-lg py-1 font-semibold
                                    @if ($volunteers->volunteer_application->stage == 0) text-slate-600 bg-slate-200
                                    @elseif ($volunteers->volunteer_application->stage == 1)
                                    text-yellow-600 bg-yellow-200
                                    @elseif ($volunteers->volunteer_application->stage == 2)
                                    text-orange-600 bg-orange-200
                                    @elseif ($volunteers->volunteer_application->stage == 3)
                                    text-sky-600 bg-sky-200
                                    @elseif ($volunteers->volunteer_application->stage == 4)
                                    text-purple-600 bg-purple-200
                                    @elseif ($volunteers->volunteer_application->stage == 5)
                                    text-green-600 bg-green-200
                                    @else
                                    text-red-600 bg-red-200 @endif">
                                        <p class="text-center">Stage {{ $volunteers->volunteer_application->stage }}</p>
                                    </div>
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    @if ($volunteers->volunteer_application->stage == 10)
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Rejected</p>
                                        </div>
                                    @elseif ($volunteers->volunteer_application->stage == 5)
                                        <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                            <p class="text-center">Accepted</p>
                                        </div>
                                    @else
                                        <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                            <p class="text-center">Pending</p>
                                        </div>
                                    @endif

                                </td>
                                <td class="items-center gap-1  hidden lg:table-cell">
                                    <a
                                        href="{{ route('admin.volunteer.progress', ['userId' => $volunteers->volunteer_application->application->user->id, 'id' =>$volunteers->volunteer_application->application->id]) }}">
                                        <button type="button" 
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </button>
                                    </a>
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
                                            class="absolute bg-white border rounded shadow-md mt-2 max-w-24" x-cloak>
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
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
</x-app-layout>
