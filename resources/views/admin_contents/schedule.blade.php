<x-app-layout>
    <x-slot name="title">Schedule Page</x-slot>
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

            @if (session('update_status'))
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
        </div>

        <div class="mx-auto max-w-screen-2xl px-4  lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">Shelter's Schedule</h1>
                </div>
            </div>

            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">

                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('admin.schedule') }}" id="allLink" class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all" class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $allSchedules }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.schedule') }}" id="pendingLink" class="inline-block p-4 text-base rounded-t-lg flex items-center justify-between">Interview
                                <span id="pending" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                   {{ $scheduleInterview }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.schedule') }}" id="approvedLink" class="inline-block text-base p-4 rounded-t-lg flex items-center justify-between">Shelter Visit
                                <span  id="approved" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                {{ $scheduleVisit }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.schedule') }}" id="rejectedLink" class="inline-block text-base p-4 rounded-t-lg  flex items-center justify-between">Pet Pickup
                                <span  id="rejected" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                  {{ $scheduleInPickup }}
                                </span>
                            </a>
                        </li>  
                    </ul>
                </div>

                <div
                    class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between p-4 ">
                    <div class="w-full md:w-1/2">
                        <form role="search" class="flex items-center">
                            <label for="accepted-user-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="accepted-user-search" placeholder="Search pet" name="search"
                                    required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
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
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Schedule Type
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            @if ($schedule->schedule_status == 'Accepted')
                                <tr id="acceptedSchedule"  data-stage="{{ $schedule->schedule_type }}" data-name={{ $schedule->firstname . ' '. $schedule->lastname}}
                                    class="schedule-user bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row"
                                        class="flex items-center px-5 py-4 font-medium text-slate-600 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ asset('storage/' . $schedule->image) }}" alt="Pet Image">
                                        <div class="ps-2 flex flex-col">

                                            <div class="text-lg lg:text-base">{{ $schedule->firstname }}
                                                {{ $schedule->lastname }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        @if ($schedule->schedule_type == 'Interview')
                                        <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->schedule_date)->format('F j, Y') }}</div>
                                        @elseif($schedule->schedule_type == 'Pickup')
                                        <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->pickup_date)->format('F j, Y') }}</div>
                                        @else
                                        <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->visit_date)->format('F j, Y') }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        @if ($schedule->schedule_type == 'Interview')
                                        <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->schedule_time)->format('g:ia') }}</div>
                                        @elseif($schedule->schedule_type == 'Pickup')
                                        <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->pickup_time)->format('g:ia') }}</div>
                                        @else
                                        <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->visit_time)->format('g:ia') }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        @if ($schedule->schedule_type == 'Interview')
                                            @if ($schedule->interview_type == 'application_form')
                                                <div
                                                    class="text-purple-600 w-24 rounded-lg py-1 font-semibold bg-blue-200">
                                                    <p class="text-center">Adoption Interview</p>
                                                </div>
                                            @else
                                                <div class="text-sky-600 w-24 rounded-lg py-1 font-semibold bg-sky-200">
                                                    <p class="text-center">Volunteer Interview</p>
                                                </div>
                                            @endif
                                        @elseif($schedule->schedule_type == 'Pickup')
                                            <div
                                                class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                                <p class="text-center">Pet Pickup</p>
                                            </div>
                                        @else
                                            <div
                                                class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                                <p class="text-center">Shelter Visit</p>
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <td class="items-center gap-1  hidden lg:table-cell">
                                        @if ($schedule->schedule_type == 'Interview')
                                            @if ($schedule->interview_type == 'application_form') 
                                            {{-- <a href="{{ route('admin.adoptionprogress', [$schedule->adoption_id])}}"> --}}
                                            <a href="{{ route('admin.adoptionprogress', ['userId' => $schedule->user_id, 'id' => $schedule->interview_application_id]) }}">
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
                                            @elseif($schedule->interview_type == 'application_volunteer') 
                                            {{-- comment ko muna kase 'di pa tapos si volunteer progress' --}}
                                            {{-- <a href="{{ route('admin.volunteer.progress', [$schedule->interview_id])}}"> --}}
                                            <a href="{{ route('admin.volunteer.progress', ['userId' => $schedule->user_id, 'id' => $schedule->interview_id])}}">
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
                                            @endif
                                        @elseif($schedule->schedule_type == 'Pickup' && $schedule->user_id !== null && $schedule->pickup_application_id !== null)
                                        {{-- <a href="{{ route('admin.adoptionprogress', [$schedule->adoption_id])}}"> --}}
                                            <a href="{{ route('admin.adoptionprogress', ['userId' => $schedule->user_id, 'id' => $schedule->pickup_application_id]) }}">
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
                                        @elseif($schedule->schedule_type == 'dsds')
                                        @else
                                        <!-- Modal toggle -->
                                        <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="w-4 h-4 ">
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>    
                                        </button>
                                        
                                        <!-- Main modal -->
                                        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Static modal
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4">
                                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                                        </p>
                                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
  
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
                            @else
                            @endif
                        @endforeach

                    </tbody>
                </table>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">

                </nav>


            </div>
        </div>

        <div class="mx-auto max-w-screen-2xl px-4 lg:py-4 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">Shelter's Schedule Request</h1>
                </div>
            </div>

            <!-- WEB RESPONSIVENESS TABLE -->
            <div class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('admin.schedule') }}" id="allSchedule" class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all" class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $allSchedulesPending}}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.schedule') }}" id="interviewSchedule" class="inline-block text-base p-4 rounded-t-lg  flex items-center justify-between">Interview
                                <span  id="interview" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                  {{ $pendingInterview }}
                                </span>
                            </a>
                        </li>  
                        <li class="me-2">
                            <a href="{{ route('admin.schedule') }}"  id="visitSchedule" class="inline-block p-4 text-base rounded-t-lg flex items-center justify-between">Shelter Visit
                                <span id="visit" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                   {{ $pendingVisit }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('admin.schedule') }}"  id="pickupSchedule" class="inline-block text-base p-4 rounded-t-lg flex items-center justify-between">Pet Pickup
                                <span  id="pickup" class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                {{ $pendingInPickup }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div
                    class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between p-4 ">
                    <div class="w-full md:w-1/2">
                        <form role="search" class="flex items-center">
                            <label for="pending-user-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="pending-user-search" placeholder="Search user" name="search"
                                    required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
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
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Concern
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                        @if ($schedule->schedule_status == 'Pending')
                            <tr id="pendingSchedule"  data-stage="{{ $schedule->schedule_type }}" data-name="{{$schedule->firstname . ' ' . $schedule->lastname}}"
                                class="schedule-user-pending bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row"
                                    class="flex items-center px-5 py-4 font-medium text-slate-600 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{ asset('storage/' . $schedule->image) }}" alt="Pet Image">
                                    <div class="ps-2 flex flex-col">

                                        <div class="text-lg lg:text-base">{{ $schedule->firstname }}
                                            {{ $schedule->lastname }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    @if ($schedule->schedule_type == 'Interview')
                                    <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->schedule_date)->format('F j, Y') }}</div>
                                    @elseif($schedule->schedule_type == 'Pickup')
                                    <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->pickup_date)->format('F j, Y') }}</div>
                                    @else
                                    <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->visit_date)->format('F j, Y') }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    @if ($schedule->schedule_type == 'Interview')
                                    <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->schedule_time)->format('g:ia') }}</div>
                                    @elseif($schedule->schedule_type == 'Pickup')
                                    <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->pickup_time)->format('g:ia') }}</div>
                                    @else
                                    <div class="text-base text-gray-500">{{ \Carbon\Carbon::parse($schedule->visit_time)->format('g:ia') }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    @if ($schedule->schedule_type == 'Interview')
                                        @if ($schedule->interview_type == 'application_form')
                                            <div
                                                class="text-blue-600 w-24 rounded-lg py-1 font-semibold bg-blue-200">
                                                <p class="text-center">Adoption Interview</p>
                                            </div>
                                        @else
                                            <div class="text-sky-600 w-24 rounded-lg py-1 font-semibold bg-sky-200">
                                                <p class="text-center">Volunteer Interview</p>
                                            </div>
                                        @endif
                                    @elseif($schedule->schedule_type == 'Pickup')
                                        <div
                                            class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                            <p class="text-center">Pet Pickup</p>
                                        </div>
                                    @else
                                        <div
                                            class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                            <p class="text-center">Shelter Visit</p>
                                        </div>
                                        
                                    @endif
                                </td>
                                <td class="items-center gap-1  hidden lg:table-cell">
                                    @if ($schedule->schedule_type == 'Interview')
                                        @if ($schedule->interview_type == 'application_form')
                                            {{-- <a href="{{ route('admin.adoptionprogress', [$schedule->adoption_id])}}"> --}}
                                            <a href="{{ route('admin.adoptionprogress', ['userId' => $schedule->user_id, 'id' => $schedule->interview_application_id]) }}">
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
                                        @elseif($schedule->interview_type == 'application_volunteer')
                                            <a href="{{ route('admin.volunteer.progress', ['userId' => $schedule->user_id, 'id' => $schedule->interview_application_id])}}">
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
                                        @endif
                                        {{-- </a> --}}
                                    @elseif($schedule->schedule_type == 'Pickup')
                                    {{-- <a href="{{ route('admin.adoptionprogress', [$schedule->adoption_id])}}"> --}}
                                    {{-- <a href="{{ route('admin.adoptionprogress', ['userId' => $schedule->user_id, 'id' => $schedule->pickup_application_id]) }}"> --}}
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
                                    @else
                                    <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" class="w-4 h-4 ">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                    </svg>                                    </button>
                                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Terms of Service
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                                    </p>
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                                    </p>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <form method="POST" action="{{ route('update.schedule.status', ['id' => $schedule->visit_id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="mr-2 py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                                            Accept Schedule
                                                        </button>
                                                    </form> 
                                                    <form method="POST" action="{{ route('reject.visit', ['id' => $schedule->visit_id]) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="ms-3 py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                                            Reject Schedule
                                                        </button>
                                                        <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </td>
                                <td class="items-center gap-1  hidden lg:table-cell">
                                    @if ($schedule->schedule_type == 'Interview')
                                        {{-- @if ($schedule->interview_type == 'application_form')
                                            <a href="{{ route('admin.adoptionprogress', [$schedule->interview_id])}}">
                                                <button type="button"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4 ">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                </button>
                                            @else
                                            <a href="{{ route('admin.volunteer.progress', [$schedule->interview_id])}}">
                                                <button type="button"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4 ">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                </button>
                                        @endif --}}
                                        </a>
                                    @elseif($schedule->schedule_type == 'Pickup')
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
                        @else
                        @endif
                    @endforeach

                    </tbody>
                </table>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">

                </nav>


            </div>
        </div>

    </section>
</x-app-layout>
