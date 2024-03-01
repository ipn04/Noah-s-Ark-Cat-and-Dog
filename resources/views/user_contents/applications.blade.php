<x-app-layout>
    <x-slot name="title">Applications Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">My Applications</h1>
                </div>
            </div>
            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('user.applications') }}" id="allLink"
                                class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all"
                                    class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalApplicationsForUser }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="pendingLink"
                                class="inline-block p-4 text-base rounded-t-lg flex items-center justify-between">Pending
                                <span id="pending"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalPendingApplicationsForUser + $volunteerPending }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="approvedLink"
                                class="inline-block text-base p-4 rounded-t-lg flex items-center justify-between">Approved
                                <span id="approved"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm
                                ">{{ $approvedApplicationForUser + $volunteerApproved }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="rejectedLink"
                                class="inline-block text-base p-4 rounded-t-lg  flex items-center justify-between">Rejected
                                <span id="rejected"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $rejectedApplicationForUser }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <table
                    class=" w-full text-sm text-left text-gray-500 dark:text-gray-400 md:space-x-3 space-y-3 md:space-y-0">
                    <thead
                        class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date of Application
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Application Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answerData)
                            <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                id="adoptionDataContainer" data-stage="{{ $answerData->adoption->stage }}">
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    <div class="text-base text-gray-500 ">
                                        {{ \Carbon\Carbon::parse($answerData->created_at)->format('F j, Y g:ia') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4   lg:table-cell">
                                    <div class="text-base text-gray-500 ">
                                        @if ($answerData->adoption->application->application_type === 'application_form')
                                            Adoption
                                        @else
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 lg:table-cell">
                                    @if ($answerData->adoption->stage >= 0 && $answerData->adoption->stage < 9)
                                        <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                            <p class="text-center">Pending</p>
                                        </div>
                                    @elseif($answerData->adoption->stage == 10)
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Rejected</p>
                                        </div>
                                    @elseif($answerData->adoption->stage == 11)
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Canceled</p>
                                        </div>
                                    @else
                                        <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                            <p class="text-center">Accepted</p>
                                        </div>
                                    @endif

                                </td>
                                <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                    <a href="{{ route('user.adoptionprogress', ['userId' => $answerData->adoption->application->user->id, 'applicationId' => $answerData->adoption->application_id]) }}"
                                        type="button" onclick=""
                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 ">
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        @if (isset($volunteer) && !$volunteer->isEmpty())
                            <!-- Your foreach loop and table data -->
                            @foreach ($volunteer as $vol)
                                <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    id="adoptionDataContainer" data-stage="{{ $vol->volunteer_application->stage }}">
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">
                                            {{ \Carbon\Carbon::parse($vol->created_at)->format('F j, Y g:ia') }}</div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        <div class="text-base text-gray-500 ">
                                            @if ($vol->volunteer_application->application->application_type === 'application_volunteer')
                                                Volunteer
                                            @else
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        @if ($vol->volunteer_application->stage >= 0 && $vol->volunteer_application->stage < 5)
                                            <div
                                                class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                                <p class="text-center">Pending</p>
                                            </div>
                                        @elseif($vol->volunteer_application->stage == 11)
                                            <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                <p class="text-center">Canceled</p>
                                            </div>
                                        @elseif($vol->volunteer_application->stage == 10)
                                            <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                <p class="text-center">Rejected</p>
                                            </div>
                                        @else
                                            <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                                <p class="text-center">Accepted</p>
                                            </div>
                                        @endif

                                    </td>
                                    <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                        <a href="{{ route('user.volunteerprogress', ['userId' => auth()->user()->id, 'applicationId' => $vol->volunteer_application->application->id]) }}                                            "
                                            type="button"
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
                <div class="mt-5 mx-5">
                    {{ $answers->links() }}
                </div>
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
        {{-- <div class="mx-auto max-w-screen-2xl px-4 lg:pt-8 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">My Schedule Request</h1>
                </div>
            </div>
            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('user.applications') }}" id="allLink"
                                class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all"
                                    class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalApplicationsForUser }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="pendingLink"
                                class="inline-block p-4 text-base rounded-t-lg flex items-center justify-between">Pending
                                <span id="pending"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalPendingApplicationsForUser + $volunteerPending }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="approvedLink"
                                class="inline-block text-base p-4 rounded-t-lg flex items-center justify-between">Approved
                                <span id="approved"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm
                                ">{{ $approvedApplicationForUser + $volunteerApproved }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="rejectedLink"
                                class="inline-block text-base p-4 rounded-t-lg  flex items-center justify-between">Rejected
                                <span id="rejected"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $rejectedApplicationForUser }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <table
                    class=" w-full text-sm text-left text-gray-500 dark:text-gray-400 md:space-x-3 space-y-3 md:space-y-0">
                    <thead
                        class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date of Application
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Application Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($interviewSchedules->isEmpty())
                            
                        @else
                            @foreach ($interviewSchedules as $interviewSchedule)
                                <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    id="adoptionDataContainer" data-stage="{{ $answerData->adoption->stage }}">
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">{{ \Carbon\Carbon::parse($interviewSchedule->created_at)->format('F j, Y g:ia') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        <div class="w-24 rounded-lg py-1 font-semibold">
                                            <div class="text-base text-gray-500 ">
                                                {{$interviewSchedule->schedule->schedule_type}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        @if ($interviewSchedule->schedule->schedule_status = 'Pending')
                                            <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                                <p class="text-center">Pending</p>
                                            </div>
                                        @elseif($interviewSchedule->schedule->schedule_status = 'Accepted')
                                            <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                                <p class="text-center">Accepted</p>
                                            </div>
                                        @else
                                            <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                <p class="text-center">Rejected</p>
                                            </div>
                                        @endif
                                    </td>
                                    <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                        <a href="{{ route('user.adoptionprogress', ['userId' => $answerData->adoption->application->user->id, 'applicationId' => $answerData->adoption->application_id]) }}"
                                            type="button" onclick=""
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        @if ($visitSchedules->isEmpty())
                            
                        @else
                            @foreach ($visitSchedules as $visitSchedule)
                                <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    id="adoptionDataContainer" data-stage="{{ $answerData->adoption->stage }}">
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">{{ \Carbon\Carbon::parse($visitSchedule->created_at)->format('F j, Y g:ia') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        <div class="w-24 rounded-lg py-1 font-semibold">
                                            <div class="text-base text-gray-500 ">
                                                {{$visitSchedule->schedule->schedule_type}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        @if ($visitSchedule->schedule->schedule_status = 'Pending')
                                            <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                                <p class="text-center">Pending</p>
                                            </div>
                                        @elseif($visitSchedule->schedule->schedule_status = 'Accepted')
                                            <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                                <p class="text-center">Accepted</p>
                                            </div>
                                        @else
                                            <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                <p class="text-center">Rejected</p>
                                            </div>
                                        @endif
                                    </td>
                                    <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                        <a href="{{ route('user.adoptionprogress', ['userId' => $answerData->adoption->application->user->id, 'applicationId' => $answerData->adoption->application_id]) }}"
                                            type="button" onclick=""
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        @if ($pickupSchedules->isEmpty())
                            
                        @else
                            @foreach ($pickupSchedules as $pickupSchedule)
                                <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    id="adoptionDataContainer" data-stage="{{ $answerData->adoption->stage }}">
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">{{ \Carbon\Carbon::parse($pickupSchedule->created_at)->format('F j, Y g:ia') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        <div class="w-24 rounded-lg py-1 font-semibold">
                                            <div class="text-base text-gray-500 ">
                                                {{$pickupSchedule->schedule->schedule_type}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        @if ($pickupSchedule->schedule->schedule_status = 'Pending')
                                            <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                                <p class="text-center">Pending</p>
                                            </div>
                                        @elseif($pickupSchedule->schedule->schedule_status = 'Accepted')
                                            <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                                <p class="text-center">Accepted</p>
                                            </div>
                                        @else
                                            <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                <p class="text-center">Rejected</p>
                                            </div>
                                        @endif
                                    </td>
                                    <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                        <a href="{{ route('user.adoptionprogress', ['userId' => $answerData->adoption->application->user->id, 'applicationId' => $answerData->adoption->application_id]) }}"
                                            type="button" onclick=""
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
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

        </div> --}}

        <div class="mx-auto max-w-screen-2xl px-4 lg:pt-8 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">My Shelter Visit Request</h1>
                </div>
            </div>
            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('user.applications') }}" id="allLink"
                                class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all"
                                    class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $scheduleCount }}</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <table
                    class=" w-full text-sm text-left text-gray-500 dark:text-gray-400 md:space-x-3 space-y-3 md:space-y-0">
                    <thead
                        class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date of Application
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Application Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr
                                class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4  hidden lg:table-cell">
                                    <div class="text-base text-gray-500 ">
                                        {{ \Carbon\Carbon::parse($schedule->date)->format('F j, Y') }} {{ \Carbon\Carbon::parse($schedule->date)->format('h:ia') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4   lg:table-cell">
                                    <div class="text-base text-gray-500 ">
                                        Shelter Visit
                                    </div>
                                </td>
                                <td class="px-6 py-4 lg:table-cell">
                                    @if ($schedule->schedule_status == 'Pending')
                                        <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                            <p class="text-center">Pending</p>
                                        </div>
                                    @elseif($schedule->schedule_status == 'Accepted')
                                        <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                            <p class="text-center">Accepted</p>
                                        </div>
                                    @elseif($schedule->schedule_status == 'Canceled')
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Canceled</p>
                                        </div>
                                    @else
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Rejected</p>
                                        </div>
                                    @endif


                                </td>
                                <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">

                                    <!-- Modal toggle -->
                                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="w-4 h-4 ">
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                        </svg> </button>
                                    <!-- Main modal -->
                                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-lg max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Shelter Visit
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="default-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 w-full">
                                                        <x-input-label for="date" value="Date" />
                                                        <x-text-input type="text" name="date"
                                                            label="Date of Visit" value="{{ \Carbon\Carbon::parse($schedule->date)->format('F j, Y') }}

                                                            "
                                                            readonly />

                                                    <div class="mt-1 w-full">
                                                        <x-input-label for="time" value="Time" />
                                                        <x-text-input type="text" name="time"
                                                            label="Time of Visit" value="{{ \Carbon\Carbon::parse($schedule->time)->format('h:ia') }}
                                                            "
                                                            readonly />
                                                    </div>

                                                    <div class="mt-1 w-full">
                                                        <x-input-label for="concern" value="Concern" />
                                                        <x-text-input type="text" name="concern" label="Concern"
                                                            value="{{ $schedule->concern }}" readonly />
                                                    </div>
                                                    <form action="{{ route('cancel.schedule', ['scheduleId' => $schedule->visit_id]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="mt-4 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm"
                                                            data-modal-hide="default-modal">
                                                            Cancel Schedule
                                                        </button>
                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </section>
</x-app-layout>
