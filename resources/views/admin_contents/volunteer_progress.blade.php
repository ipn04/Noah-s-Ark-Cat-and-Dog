<x-app-layout>
    <x-slot name="title">Volunteer Progress Page</x-slot>
    @include('admin_top_navbar.admin_top_navbar')

    @include('sidebars.admin_sidebar')
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
                    confirmButtonText: "Ok"
                });
            }
        </script>
    @endif

    @if (session('volunteer_progress'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal(
                    "Success!",
                    "Press 'OK' to exit!",
                    "success"
                )
            });
        </script>
    @endif

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="flex flex-col sm:flex-row justify-between lg:items-center py-4 px-10">
            <div class="flex gap-2 mb-2 sm:mb-0">
                <a href="{{ route('admin.volunteers') }}"
                    class="lg:text-lg text-base hover:font-bold hover:cursor-pointer hover:text-red-700">Volunteers</a>
                <div class = "flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
                <h2 class="font-bold text-base lg:text-lg text-yellow-500">Volunteer Application Details </h2>
            </div>
            <div class="grid grid-cols-2 gap-2 lg:py-0 mx-auto lg:mx-0">
                <form
                    action="{{ route('update.volunteer.progress', ['userId' => $userVolunteerAnswers->volunteer_application->application->user->id, 'applicationId' => $userVolunteerAnswers->volunteer_application->application->id]) }}"
                    method="POST" class="
                    @if ($stage == 1 || $stage == 2 || $stage == 3 || $stage == 5) @else @endif">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg hover:text-green-500 font-bold bg-green-500 text-white rounded-lg shadow-md
                        @if ($stage == 1 || $stage == 2 || $stage == 3 || $stage == 5 || $stage == 10 || $stage == 11) hidden
                        @else
                        block @endif
                        ">
                        @if ($stage == 4)
                            Accept Application
                        @elseif($stage == 0)
                            Proceed to Next Steps
                        @endif
                    </button>
                </form>
                @if ($stage == 5)
                    <h1 class="bg-green-200 px-3 py-3 rounded-lg text-green-600">Application Accepted</h1>
                @elseif ($stage == 10)
                    <h1 class="bg-red-200 px-3 py-3 rounded-lg font-bold text-red-600">Application Rejected</h1>
                @elseif ($stage == 11)
                    <h1 class="bg-red-200 px-3 py-3 rounded-lg font-bold text-red-600">Application Canceled</h1>
                @endif
                <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="
                        @if ($stage > 4) hidden 
                        @else
                        hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg text-center hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md @endif">Reject
                    Application
                </button>
            </div>
        </div>

        <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            reject this application?</h3>
                        <form
                            action="{{ route('admin.volunteer.reject', ['userId' => $userVolunteerAnswers->volunteer_application->application->user->id, 'applicationId' => $userVolunteerAnswers->volunteer_application->application->id]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="reason" id="reason"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                placeholder="Reason" required />
                            <button data-modal-hide="popup-modal" type="submit"
                                class="mt-4 text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class ="flex items-center  py-4 justify-center">
            <div
                class ="grid grid-cols-1 max-w-screen-lg lg:px-8 py-5 bg-white rounded-2xl shadow-md lg:grid-cols-5 gap-10">
                <div>

                    <div class = "flex items-center justify-center gap-2">
                        <div
                            class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 
                            @if ($stage >= 0 && $stage < 6) text-green-600 bg-green-200
                            @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
                            @else
                                text-gray-600 bg-gray-200 @endif
                        ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="lg:w-8 lg:h-8 w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h1 class = "lg:hidden text-center py-2 ">Application Submitted</h1>
                    </div>
                    <h1 class = "hidden lg:block text-center py-2 ">Application Submitted</h1>
                </div>

                <div>
                    <div>
                        <div class = "flex items-center justify-start lg:justify-center gap-2">
                            <div
                                class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16
                                @if ($stage >= 1 && $stage < 6) text-green-600 bg-green-200
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
                                @else
                                text-gray-600 bg-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="lg:w-8 lg:h-8 w-4 h-4">
                                    <path
                                        d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                    <path fill-rule="evenodd"
                                        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h1 class = " lg:hidden text-center py-2 ">Application Validated</h1>

                        </div>
                        <h1 class = "hidden lg:block text-center py-2 ">Application Validated</h1>
                    </div>
                </div>
                <div>
                    <div>
                        <div class = "flex items-center justify-start lg:justify-center gap-2">
                            <div
                                class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16
                                @if ($stage > 2 && $stage < 6) bg-green-200 text-green-500
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
                                @elseif($stage == 2)
                                bg-yellow-200 text-yellow-500
                                @else
                                text-gray-600 bg-gray-200 @endif
                                ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="lg:w-8 lg:h-8 w-4 h-4">
                                    <path
                                        d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                    <path fill-rule="evenodd"
                                        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h1 class = "lg:hidden text-center py-2">Schedule Interview</h1>

                        </div>
                        <h1 class = "hidden lg:block text-center py-2">Schedule Interview</h1>
                    </div>
                </div>
                <div>
                    <div>
                        <div class = "flex items-center justify-start lg:justify-center gap-2">
                            <div
                                class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 
                                y-200
                                @if ($stage > 3 && $stage < 6) bg-green-200 text-green-500
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
                                @elseif($stage == 3)
                                bg-yellow-200 text-yellow-500
                                @else
                                text-gray-600 bg-gray-200 @endif 
                                ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="lg:w-8 lg:h-8 w-4 h-4">
                                    <path
                                        d="M4.5 4.5a3 3 0 0 0-3 3v9a3 3 0 0 0 3 3h8.25a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3H4.5ZM19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06Z" />
                                </svg>
                            </div>
                            <h1 class = "lg:hidden text-center py-2">Interview</h1>

                        </div>
                        <h1 class = "hidden lg:block text-center py-2">Interview</h1>
                    </div>
                </div>
                <div>
                    <div>
                        <div class = "flex items-center justify-start lg:justify-center gap-2
                ">
                            <div
                                class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16  
                                @if ($stage > 4 && $stage < 6) bg-green-200 text-green-500
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
                                @elseif($stage == 4)
                                bg-yellow-200 text-yellow-500
                                @else
                                text-gray-600 bg-gray-200 @endif
                                ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="lg:w-8 lg:h-8 w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M6.912 3a3 3 0 0 0-2.868 2.118l-2.411 7.838a3 3 0 0 0-.133.882V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0 0 17.088 3H6.912Zm13.823 9.75-2.213-7.191A1.5 1.5 0 0 0 17.088 4.5H6.912a1.5 1.5 0 0 0-1.434 1.059L3.265 12.75H6.11a3 3 0 0 1 2.684 1.658l.256.513a1.5 1.5 0 0 0 1.342.829h3.218a1.5 1.5 0 0 0 1.342-.83l.256-.512a3 3 0 0 1 2.684-1.658h2.844Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h1 class = "lg:hidden text-center py-2">Final Decision</h1>

                        </div>
                        <h1 class = "hidden lg:block text-center py-2">Final Decision</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="@if ($stage == 2 || $stage == 3 || $stage == 5) my-2 px-4 @else hidden @endif">
            <div
                class="mx-auto px-4 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 max-w-screen-lg">
                <ul class="flex flex-wrap -mb-px">
                    <li class="me-2">
                        <a href="#" id="uPdatesLink"
                            class="inline-block p-4 text-red-600 border-b-2 border-red-600 hover:text-red-600 hover:border-red-300 rounded-t-lg"
                            aria-current="page" onclick="selectCategory('updates')">Updates</a>
                    </li>
                    <li class="me-2">
                        <a href="#" id="userLLink"
                            class="inline-block p-4 border-b-2 border-gray-100 rounded-t-lg hover:text-red-600 hover:border-red-300  "
                            onclick="selectCategory('user')">User Information</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex  items-center py-5 px-10 justify-center ">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-4 max-w-screen-lg">
                <div>
                    <div id = "updatesContainer" class = "@if ($stage == 2 || $stage == 3 || $stage == 5 ) @else hidden @endif">
                        <div class = "bg-white p-5 max-w-lg rounded-2xl shadow-md h-volunteerProgressHeight flex justify-center items-center">

                            <div class = "@if ($stage == 3) @else hidden @endif"
                                @if ($scheduleInterview) <h2 class="font-bold text-lg p-2">Interview at
                                {{ \Carbon\Carbon::parse($scheduleInterview->date)->format('F j, Y') }}</h2>
                        @else
                            <p>No interview schedule available.</p> @endif
                                @if ($scheduleInterview) <p class="p-2">You have an interview scheduled later at
                                {{ \Carbon\Carbon::parse($scheduleInterview->date)->format('F j, Y') }}
                                {{ \Carbon\Carbon::parse($scheduleInterview->time)->format('g:i A') }}.
                                Please join this meet later at
                                {{ \Carbon\Carbon::parse($scheduleInterview->time)->format('g:i A') }}
                            </p>
                        @else
                            <p class="p-2">You do not have an interview scheduled at the moment.</p> @endif
                                <div class = "grid grid-cols-1 gap-2 py-2">
                                @if (isset($acceptedSchedule))
                                    <a target="_blank"
                                        href="{{ route('interview.admin', ['scheduleId' => $acceptedSchedule->interview_id]) }}">
                                        @php
                                            $scheduledDate = optional($scheduleInterview)->date
                                                ? \Carbon\Carbon::parse($scheduleInterview->date)
                                                : null;
                                            $scheduledTime = optional($scheduleInterview)->time
                                                ? \Carbon\Carbon::parse($scheduleInterview->time)
                                                : null;
                                            $scheduledDateTime =
                                                $scheduledDate && $scheduledTime
                                                    ? $scheduledDate->setTimeFromTimeString(
                                                        $scheduledTime->toTimeString(),
                                                    )
                                                    : null;

                                            $today = \Carbon\Carbon::now();
                                            $isDisabled =
                                                $scheduledDate->isBefore($today) ||
                                                ($scheduledDate->equalTo($today) && $scheduledTime < $currentTime);
                                        @endphp

                                        <button type="submit"
                                            class="p-2 w-full mx-auto text-white {{ $isDisabled ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-500 hover:bg-red-700' }}"
                                            {{ $isDisabled ? 'disabled' : '' }}>
                                            Join Meet
                                        </button>
                                    </a>
                                @endif
                                <form
                                    action="{{ route('volunteer.add.stage', ['id' => $userVolunteerAnswers->volunteer_application->application->id, 'applicationId' => $userVolunteerAnswers->volunteer_application->application->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                        class = "p-2  w-full  mx-auto text-gray-600 bg-yellow-200 hover:bg-yellow-300  text-center font-bold rounded-lg">Wrap
                                        Interview</button>

                                </form>
                                <button id="deleteButton" data-modal-target="deleteModal"
                                    data-modal-toggle="deleteModal" type="button"
                                    class="p-2 w-full rounded-lg mx-auto text-white bg-yellow-500 hover:bg-yellow-700 ">
                                    Cancel Meet
                                </button>
                                <div id="deleteModal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div
                                            class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <button type="button"
                                                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="deleteModal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to
                                                cancel this meeting?</p>
                                            <div>
                                                <form
                                                    action="{{ route('admin.cancel.interview', ['userId' => $userVolunteerAnswers->volunteer_application->application->user->id, 'applicationId' => $userVolunteerAnswers->volunteer_application->application->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="text" name="reason" id="reason"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                                        placeholder="Reason" required />
                                                    <button type="submit"
                                                        class="mt-4 py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-toggle="deleteModal" type="button"
                                                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        No, cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class = "@if($stage ==2) @else hidden @endif">
                            <p class="text-center">Schedule Interview</p>
                            <button data-modal-target="progress-modal" data-modal-toggle="progress-modal"
                                class="block mx-auto my-2 text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                Interview Schedule
                            </button>
                            <div id="progress-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="progress-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5">
                                            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Interview
                                                Schedule</h3>
                                            <div class = "mt-2">
                                                <x-input-label for="date" value="{{ __('Applicant Name') }}" />
                                                <x-text-input type="text" name="date" label="date"
                                                    value="{{ $userVolunteerAnswers->volunteer_application->application->user->firstname . ' ' . $userVolunteerAnswers->volunteer_application->application->user->name }}"
                                                    disabled class="w-full" />
                                            </div>
                                            @if ($scheduleInterview)
                                                <div class = "mt-2">
                                                    <x-input-label for="date" value="{{ __('Interview Date') }}" />
                                                    <x-text-input type="text" name="date" label="date"
                                                        value="{{ \Carbon\Carbon::parse($scheduleInterview->date)->format('F j, Y') }}
                                                        " disabled
                                                        class="w-full" />
                                                </div>
                                            @else
                                                <div class = "mt-2">
        
                                                    <x-input-label for="date" value="{{ __('Interview Date') }}" />
                                                    <x-text-input type="text" name="date" label="date"
                                                        value="N/A" disabled class="w-full" />
                                                </div>
                                            @endif
                                            @if ($scheduleInterview)
                                                <div class = "mt-2">
        
                                                    <x-input-label for="time" value="{{ __('Interview Time') }}" />
                                                    <x-text-input type="text" name="time" label="time"
                                                        value="{{ \Carbon\Carbon::parse($scheduleInterview->time)->format('g:i A') }}
                                                        " disabled
                                                        class="w-full" />
                                                </div>
                                            @else
                                                <div class = "mt-2">
        
                                                    <x-input-label for="time" value="{{ __('Interview Time') }}" />
                                                    <x-text-input type="text" name="time" label="time"
                                                        value="N/A" disabled class="w-full" />
                                                </div>
                                            @endif
                                            <!-- Modal footer -->
                                            <div class="flex items-center mt-6 space-x-2 rtl:space-x-reverse">
                                                <form
                                                    action="{{ route('admin.volunter.interview.accept', ['userId' => $userVolunteerAnswers->volunteer_application->application->user->id, 'applicationId' => $userVolunteerAnswers->volunteer_application->application->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button data-modal-hide="progress-modal" type="submit"
                                                        class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Accept</button>
                                                </form>
                                                <button data-modal-target="agree-modal" data-modal-toggle="agree-modal" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Reject</button>
                                                <div id="agree-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                        <!-- Modal content -->
                                                        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="agree-modal">
                                                                <svg aria-hidde n="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to cancel?</p>
                                                            <div>
                                                                <form
                                                                    action="{{ route('admin.reject.volunteer', ['userId' => $userVolunteerAnswers->volunteer_application->application->user->id, 'applicationId' => $userVolunteerAnswers->volunteer_application->application->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                        <input type="text" name="reason" id="reason" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Reason" required />
                                                                        <button type="submit" class="mt-4 py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                            Yes, I'm sure
                                                                        </button>
                                                                        <button data-modal-toggle="agree-modal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                            No, cancel
                                                                        </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id ="userinfoContainer"
                    class="grid grid-cols-1 lg:my-16 gap-5 @if ($stage == 2 || $stage == 3 || $stage == 5) hidden @else @endif">
                    <div class="w-full bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                        {{-- @foreach ($userVolunteerAnswers as $answers) --}}
                        <div
                            class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                            <img class="object-cover object-center w-32 h-32"
                                src="{{ asset('storage/' . $userVolunteerAnswers->volunteer_application->application->user->profile_image) }}"
                                alt='user profile'>
                        </div>
                        <h1 class = "text-center font-semibold text-2xl py-2 capitalize">
                            {{ $userVolunteerAnswers->volunteer_application->application->user->firstname . ' ' . $userVolunteerAnswers->volunteer_application->application->user->name }}
                        </h1>
                        <div class = "pb-4">
                            @if ($userVolunteerAnswers)
                                <ul class="space-y-4  mb-4">
                                    <li>
                                        <label
                                            class=" inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Email
                                                </div>
                                                <div class="w-full text-base font-medium ">
                                                    <td>{{ $userVolunteerAnswers->volunteer_application->application->user->email }}
                                                </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label
                                            class=" inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Address
                                                </div>
                                                <div class="w-full text-base font-medium capitalize">
                                                    {{ $userVolunteerAnswers->volunteer_application->application->user->street . ', ' . $userVolunteerAnswers->volunteer_application->application->user->barangay . ', ' . $userVolunteerAnswers->volunteer_application->application->user->city . ', ' . $userVolunteerAnswers->volunteer_application->application->user->province }}
                                                    </td>
                                                </div>
                                        </label>
                                    </li>
                                    <div class = "grid-cols-2 grid gap-2">
                                        <li>
                                            <label
                                                class=" mt-4 inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Birthday
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        <td>{{ \Carbon\Carbon::parse($userVolunteerAnswers->volunteer_application->application->user->birthday)->format('F j, Y') }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label
                                                class=" mt-4 inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Gender
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $userVolunteerAnswers->volunteer_application->application->user->gender }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div class = "grid-cols-2 grid gap-2">
                                        <li>
                                            <label
                                                class="  inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Phone
                                                        Number
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $userVolunteerAnswers->volunteer_application->application->user->phone_number }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label
                                                class=" inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Civil
                                                        Status
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $userVolunteerAnswers->volunteer_application->application->user->civil_status }}
                                                    </div>
                                            </label>
                                        </li>
                                    </div>
                                </ul>

                                <button data-modal-target="answer-modal" data-modal-toggle="answer-modal"
                                    class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    type="button">
                                    View Answers
                                </button>
                            @else
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div id = "progressContainer"
                class = "h-volunteerProgressHeight bg-white lg:order-last order-first h-96 overflow-y-auto rounded-2xl p-4  shadow-md @if ($stage == 2 || $stage == 3 || $stage == 5) @else my-16 @endif">
                <h1 class = "font-bold text-xl">Volunteer Progress</h1>
                <table>
                    @if ($firstnotification)
                        @foreach ($firstnotification as $notify)
                            <tr class = "bg-white border-b border-gray-200">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white">
                                    <h5>{{ $notify->user->firstname . ' ' . $notify->user->name . ' ' . $notify->message }}
                                    </h5>
                                    <span
                                        class="text-xs">{{ \Carbon\Carbon::parse($notify->created_at)->format('F j, Y h:i A') }}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

        </div>

        {{-- 
        <div
            class="
        @if ($stage == 3) hidden
        @else
        flex items-center py-5 px-10 justify-center @endif
                ">
            <div class ="grid grid-cols-1 lg:grid-cols-2 gap-5 px-4 max-w-screen-lg w-full lg:mt-12">
                <div class="bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                    @if ($userVolunteerAnswers)
                        {{-- @foreach ($userVolunteerAnswers as $answers) --}}
        {{-- <div
                            class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                            <img class="object-cover object-center w-32 h-32"
                                src="{{ asset('storage/' . $userVolunteerAnswers->volunteer_application->application->user->profile_image) }}"
                                alt='user profile'>
                        </div>
                        <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                            {{ $userVolunteerAnswers->volunteer_application->application->user->firstname . ' ' . $userVolunteerAnswers->volunteer_application->application->user->name }}
                        </h1>
                        <div class = "pb-4">
                            <ul class="space-y-4  mb-4">
                                <li>
                                    <label
                                        class=" inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Email
                                            </div>
                                            <div class="w-full text-base font-medium ">
                                                <td>{{ $userVolunteerAnswers->volunteer_application->application->user->email }}
                                                </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class=" inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Address
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $userVolunteerAnswers->volunteer_application->application->user->street . ', ' . $userVolunteerAnswers->volunteer_application->application->user->barangay . ', ' . $userVolunteerAnswers->volunteer_application->application->user->city . ', ' . $userVolunteerAnswers->volunteer_application->application->user->province }}                                    </td>
                                            </div>
                                    </label>
                                </li>
                                <div class = "grid-cols-2 grid gap-2">
                                    <li>
                                        <label
                                            class=" mt-4 inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                    Birthday
                                                </div>
                                                <div class="w-full text-base font-medium">
                                                    <td>{{ \Carbon\Carbon::parse($userVolunteerAnswers->volunteer_application->application->user->birthday)->format('F j, Y') }}
                                                    </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label
                                            class=" mt-4 inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Gender
                                                </div>
                                                <div class="w-full text-base font-medium capitalize">
                                                    {{ $userVolunteerAnswers->volunteer_application->application->user->gender }}
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </div>
                                <div class = "grid-cols-2 grid gap-2">
                                    <li>
                                        <label
                                            class="  inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Phone
                                                    Number
                                                </div>
                                                <div class="w-full text-base font-medium">
                                                    {{ $userVolunteerAnswers->volunteer_application->application->user->phone_number }}
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label
                                            class=" inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Civil
                                                    Status
                                                </div>
                                                <div class="w-full text-base font-medium capitalize">
                                                    {{ $userVolunteerAnswers->volunteer_application->application->user->civil_status }}
                                                </div>
                                        </label>
                                    </li>
                                </div>
                            </ul>
                          
                            <button data-modal-target="answer-modal" data-modal-toggle="answer-modal"
                                class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                View Answers
                            </button>
                        </div> --}}
        {{-- @endforeach --}}
        {{-- @else
                        <p>No volunteer answers found.</p>
                    @endif
                </div>

                <div class = "bg-white lg:order-last order-first rounded-2xl p-4  h-96 overflow-y-auto  shadow-md h-volunteerProgressContainer overflow-auto">
                    <h1 class = "font-bold text-xl">Volunteer Progress</h1>
                    <table>
                        @if ($firstnotification)
                            @foreach ($firstnotification as $notify)
                                <tr class = "bg-white border-b border-gray-200">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white"><h5>{{ $notify->user->firstname . ' ' . $notify->user->name . ' ' . $notify->message }}</h5>
                                        <span class="text-xs">{{ \Carbon\Carbon::parse($notify->created_at)->format('F j, Y h:i A') }}</span>
                                    </td>
                                </tr>                    
                            @endforeach
                            @if ($stage === '2')
                           
                            @endif
                        @endif
                    </table>
                     --}}
        {{-- <!-- Main modal -->
                   
                </div>
            </div>

        </div> 
  --}}
        @if ($userVolunteerAnswers)
            <div id="answer-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-6xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $userVolunteerAnswers->volunteer_application->application->user->firstname . ' ' . $userVolunteerAnswers->volunteer_application->application->user->name . ' Answers' }}
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="answer-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="first_question" :value="__('Social Media (FB/IG/Twitter)')" />
                                    <x-text-input id="first_question" class="block mt-1 w-full" type="text"
                                        name="first_question" :value="old('first_question', $answers['first_question'] ?? '')" />
                                </div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="second_question" :value="__('What prompted you to adopt from us?')" />
                                    <x-text-input id="second_question" class="block mt-1 w-full" type="text"
                                        name="second_question" :value="old('second_question', $answers['second_question'] ?? '')" />
                                </div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="third_question" :value="__('Have you adopted from us before?')" />
                                    <x-text-input id="third_question" class="block mt-1 w-full" type="text"
                                        name="third_question" :value="old('third_question', $answers['third_question'] ?? '')" />
                                </div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="fourth_question" :value="__('For whom are you adopting a pet?')" />
                                    <x-text-input id="fourth_question" class="block mt-1 w-full" type="text"
                                        name="fourth_question" :value="old('fourth_question', $answers['fourth_question'] ?? '')" />
                                </div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="fifth_question" :value="__('Are there children below 18 in your house?')" />
                                    <x-text-input id="fifth_question" class="block mt-1 w-full" type="text"
                                        name="fifth_question" :value="old('fifth_question', $answers['fifth_question'] ?? '')" />
                                </div>


                            </div>
                            <div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="sixth_question" :value="__('Do you have other pets?')" />
                                    <x-text-input id="sixth_question" class="block mt-1 w-full" type="text"
                                        name="sixth_question" :value="old('sixth_question', $answers['sixth_question'] ?? '')" />
                                </div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="sevent_question" :value="__('Have you had pets in the past?')" />
                                    <x-text-input id="sevent_question" class="block mt-1 w-full" type="text"
                                        name="sevent_question" :value="old('seventh_question', $answers['seventh_question'] ?? '')" />
                                </div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="eight_question" :value="__('Who else do you live with?')" />
                                    <x-text-input id="eight_question" class="block mt-1 w-full" type="text"
                                        name="eight_question" :value="old('eight_question', $answers['eight_question'] ?? '')" />
                                </div>
                                <div class="mt-4" style="pointer-events: none;">
                                    <x-input-label for="ninth_question" :value="__('Are any members of your house hold allergic to animals?')" />
                                    <x-text-input id="ninth_question" class="block mt-1 w-full" type="text"
                                        name="ninth_question" :value="old('ninth_question', $answers['ninth_question'] ?? '')" />
                                </div>
                            </div>
                            {{-- <div class="border-t border-gray-200 rounded-b dark:border-gray-600">
                            <x-primary-button data-modal-target="forid-modal" data-modal-toggle="forid-modal"
                                class="w-full text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                View ID </x-primary-button>
                        </div>
                        <div class="border-t border-gray-200 rounded-b dark:border-gray-600">
                            <x-primary-button data-modal-target="forsignature-modal" data-modal-toggle="forsignature-modal"
                                class="w-full text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                View Signature </x-primary-button>
                        </div> --}}
                        </div>
                        <!-- Modal footer -->
                    </div>
                </div>
            </div>
        @endif

        <script>
            function selectCategory(category) {

                const existingUserInfo = document.getElementById('uPdatesLink');
                const archivedUserInfo = document.getElementById('userLLink');

                if (category === 'updates') {

                    archivedUserInfo.classList.add('text-gray-600');
                    archivedUserInfo.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
                    existingUserInfo.classList.add('border-b-2', 'border-red-600', 'text-red-600');
                    document.getElementById('userinfoContainer').classList.add('hidden');
                    document.getElementById('updatesContainer').classList.remove('hidden');
                    document.getElementById('progressContainer').classList.remove('my-16');


                } else if (category === 'user') {



                    existingUserInfo.classList.add('text-gray-600');
                    existingUserInfo.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
                    archivedUserInfo.classList.add('border-b-2', 'border-red-600', 'text-red-600');

                    document.getElementById('updatesContainer').classList.add('hidden');
                    document.getElementById('userinfoContainer').classList.remove('hidden');

                    document.getElementById('progressContainer').classList.add('my-16');

                }

                // You can add more functionality here based on the selected category
                console.log("Selected category: " + category);

            }
        </script>
    </section>
</x-app-layout>
