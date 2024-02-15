<x-app-layout>
    <x-slot name="title">Adoption Form Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')
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

    @if (session('send_schedule'))
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
                <a href="{{ route('user.dashboard') }}"
                    class="lg:text-lg text-base hover:font-bold hover:cursor-pointer hover:text-red-700">Home</a>
                <p class="lg:text-lg text-base">>></p>
                <h2 class="font-bold text-base lg:text-lg text-yellow-500">Adoption Application Details</h2>
            </div>
            <div class="py-3 lg:py-0 mx-auto lg:mx-0">
                <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="
                    @if ($stage >= 0 && $stage <= 3) block hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md 
                    @elseif ($stage > 3)
                    hidden @endif">
                    Cancel Application
                </button>
            </div>
            @if ($stage == 9)
                <h1 class="bg-green-300 px-3 py-3 text-white-600">Application done</h1>
            @elseif ($stage == 10)
                <h1 class="bg-red-300 px-3 py-3 text-red-600">Application rejected</h1>
            @elseif ($stage == 11)
                <h1 class="bg-red-300 px-3 py-3 text-red-600">Application canceled</h1>
            @endif
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
                            cancel this application?</h3>
                        <form
                            action="{{ route('cancel.stage', ['userId' => auth()->user()->id, 'id' => $adoptionAnswerData->adoption->application->id]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button data-modal-hide="popup-modal" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
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

        <div class = "flex items-center  py-4 justify-center">
            <div
                class = "grid grid-cols-1 max-w-screen-lg px-14 lg:px-5 py-3 bg-white rounded-2xl shadow-md lg:grid-cols-7 gap-2">
                <div>
                    <div class = "flex items-center justify-center gap-2">
                        <div
                            class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 text-gray-600 bg-gray-200
                            @if ($stage >= 0 && $stage < 10) bg-green-200 text-green-500
                                @else
                                text-gray-600 bg-gray-200 @endif">
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
                                @if ($stage > 0 && $stage < 10) bg-green-200 text-green-500
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
                                @if ($stage > 2 && $stage < 10) bg-green-200 text-green-500
                                @elseif($stage == 2)
                                bg-yellow-200 text-yellow-500
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
                                @if ($stage > 3 && $stage < 10) bg-green-200 text-green-500
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
                                @if ($stage > 4 && $stage < 10) bg-green-200 text-green-500
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
                <div>
                    <div>
                        <div class = "flex items-center justify-start lg:justify-center gap-2">
                            <div
                                class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 
                                @if ($stage > 6 && $stage < 10) bg-green-200 text-green-500
                                @elseif($stage == 6)
                                bg-yellow-200 text-yellow-500
                                @else
                                text-gray-600 bg-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="lg:w-8 lg:h-8 w-4 h-4">
                                    <path
                                        d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                                    <path
                                        d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                                    <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                </svg>
                            </div>
                            <h1 class = "lg:hidden text-center py-2">Schedule Pickup</h1>

                        </div>
                        <h1 class = "lg:block hidden text-center py-2">Schedule Pickup</h1>
                    </div>
                </div>
                <div>
                    <div>
                        <div class = "flex items-center  justify-start lg:justify-center gap-2">
                            <div
                                class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16
                                @if ($stage > 8 && $stage < 10) bg-green-200 text-green-500
                                @else
                                text-gray-600 bg-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="lg:w-8 lg:h-8 w-4 h-4">
                                    <path
                                        d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
                                    <path fill-rule="evenodd"
                                        d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h1 class = "lg:hidden text-center py-2">Pet Adopted</h1>

                        </div>
                        <h1 class = "hidden lg:block text-center py-2">Pet Adopted</h1>
                    </div>
                </div>
            </div>
        </div>



        <div
            class="@if ($stage == 3 || $stage == 7) flex items-center py-5 justify-center
    @else
    hidden @endif
    ">
            <div class = "grid grid-cols-1 lg:grid-cols-3  gap-5 px-4 max-w-screen-lg">
                <div class = "col-span-2 ">

                    <div
                        class = "   @if ($stage == 7) mb-7 flex justify-center items-center
                                    @else
                                    hidden @endif">
                        <div class = "bg-white p-5 max-w-lg rounded-lg shadow-md">
                            <h2 class = "font-bold text-xl p-2">Schedule Confirmed</h2>
                            <p class = "italic text-sm px-2 pb-3 ps-2">The shelter is on their way now to your
                                location,
                                please wait for them</p>
                            <h2 class = "font-bold text-lg p-2 ps-2">Estimated Date and Time of Arrival</h2>

                            <p class="p-2 pe-2 ps-4">
                                @isset($scheduleInterview->date)
                                    {{ \Carbon\Carbon::parse($schedulePickup->date)->format('F j, Y') }}
                                @endisset

                                @isset($scheduleInterview->time)
                                    {{ \Carbon\Carbon::parse($schedulePickup->time)->format('g:i A') }}
                                @endisset

                            </p>

                            <h2 class = "font-bold text-lg p-2 ps-2">Location</h2>
                            <p class = "p-2 pe-2 ps-4">
                                {{ $adoption->application->user->street . ', ' . $adoption->application->user->barangay . ', ' . $adoption->application->user->city . ', ' . $adoption->application->user->province }}
                            </p>

                        </div>
                    </div>
                    <div
                        class = "@if ($stage == 3) mb-7 flex justify-center items-center
                @else
                hidden @endif">
                        <div class = "bg-white p-5 max-w-lg rounded-lg shadow-md">
                            <h2 class = "font-bold text-lg p-2">Interview at
                                {{ \Carbon\Carbon::parse($schedulePickup->date ?? '')->format('F j, Y') }}
                            </h2>
                            <p class = "p-2">You have an interview scheduled later at
                                {{ \Carbon\Carbon::parse($schedulePickup->time ?? '')->format('g:i A') }}
                                . Please join this meet
                                later at {{ \Carbon\Carbon::parse($schedulePickup->time ?? '')->format('g:i A') }}
                                .</p>
                            <div class = "grid grid-cols-1 gap-2 py-2">
                                <a target="_blank"
                                    href="{{ optional($schedulePickup)->interview_id ? route('interview.user', ['scheduleId' => $schedulePickup->interview_id]) : '#' }}">
                                    @php
                                        $scheduledDate = optional($schedulePickup)->date ? \Carbon\Carbon::parse($schedulePickup->date) : null;
                                        $scheduledTime = optional($schedulePickup)->time ? \Carbon\Carbon::parse($schedulePickup->time) : null;
                                        $scheduledDateTime = $scheduledDate && $scheduledTime ? $scheduledDate->setTimeFromTimeString($scheduledTime->toTimeString()) : null;

                                        $today = \Carbon\Carbon::now();

                                        // Add a null check before calling isBefore()
                                        $isDisabled = ($scheduledDate && $scheduledDate->isBefore($today)) || ($scheduledDate && $scheduledDate->equalTo($today) && $scheduledTime && $scheduledTime < $currentTime);
                                    @endphp
                                    <button type="submit"
                                        class="p-2 w-full rounded-lg mx-auto text-white {{ $isDisabled ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-500 hover:bg-red-700' }}"
                                        {{ $isDisabled ? 'disabled' : '' }}>
                                        Join Meet
                                    </button>
                                </a>


                                <button type="button" id="deleteButton" data-modal-target="deleteModal"
                                    data-modal-toggle="deleteModal"
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
                                            <div class="flex justify-center items-center space-x-4">
                                                <form
                                                    action="{{ route('user.cancelInterview', ['userId' => auth()->user()->id, 'id' => $adoptionAnswerData->adoption->application->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
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
                    </div>
                    <div
                        class = " 
                    grid grid-cols-1  lg:grid-cols-2 lg:pt-14 gap-5 px-4 max-w-screen-lg ">
                        <div class="bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                            <div
                                class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                <img class="object-cover object-center w-32 h-32"
                                    src="{{ asset('storage/' . $userr->profile_image) }}" alt='user profile'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                                {{ $userr->firstname . ' ' . $userr->name }}
                            </h1>
                            <div class = "pb-4">
                                <ul class="space-y-3  mb-4">
                                    <div class = "grid grid-cols-2 gap-1 pt-4">
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Birthday
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ \Carbon\Carbon::parse($userr->birthday)->format('F j, Y') }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Gender
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $userr->gender }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div class = "grid grid-cols-2 gap-1 p-1">
                                        <li>
                                            <label
                                                class="  inline-flex items-center justify-between w-full h-full  p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Phone Number
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $userr->phone_number }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label
                                                class="  inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Civil Status
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $userr->civil_status }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <li>
                                        <label
                                            class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                    Email
                                                </div>
                                                <div class="w-full text-base font-medium">
                                                    {{ $userr->email }}
                                                </div>
                                            </div>
                                        </label>

                                    </li>

                                    <li>
                                        <label
                                            class="  inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                    Address
                                                </div>
                                                <div class="w-full text-base font-medium">
                                                    {{ $userr->street . ', ' . $userr->barangay . ', ' . $userr->city . ', ' . $userr->province }}
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>

                                <button data-modal-target="answer-modal" data-modal-toggle="answer-modal"
                                    class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    type="button">
                                    View Answers
                                </button>

                            </div>
                        </div>
                        <div class="bg-white px-5 lg:mt-0 mt-12 shadow-md rounded-2xl text-gray-900">

                            <div
                                class="mx-auto w-32 h-32 -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                <img class="object-cover object-center w-32 h-32"
                                    src="{{ asset('storage/images/' . $petData->dropzone_file) }}"
                                    alt='Woman looking front'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">{{ $petData->pet_name }}
                            </h1>
                            <div class = "pb-4">
                                <ul class="space-y-3  mb-4">
                                    <div class = "grid grid-cols-2 gap-1 pt-4">
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Age
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $petData->age }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Gender
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $petData->gender }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                </ul>

                                <table class = "border-separate border-spacing-3">
                                    <tr>
                                        <td class = "font-bold">Age</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Gender</td>
                                        <td class = "capitalize">{{ $petData->pet_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Breed</td>
                                        <td class = "capitalize">{{ $petData->breed }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Weight</td>
                                        <td class = "capitalize">{{ $petData->weight }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Size</td>
                                        <td class = "capitalize">{{ $petData->size }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Color</td>
                                        <td class = "capitalize">{{ $petData->color }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Vaccination</td>
                                        <td class = "capitalize">{{ $petData->vaccination_status }}</td>
                                    </tr>
                                </table>
                                <button data-modal-target="pet-modal" data-modal-toggle="pet-modal"
                                    class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    type="button">
                                    More details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "bg-white lg:order-last order-first overflow-y-auto max-h-96 rounded-2xl p-4 shadow-md">
                    <h1 class = "font-bold text-xl">Adoption Progress</h1>
                    <table>
                        @if($firstnotification)
                            @foreach ($firstnotification as $notify)
                                <tr class = "bg-white border-b border-gray-200">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white"><h5>{{  $notify->message }}</h5></td>
                                </tr>                    
                            @endforeach
                        @endif
                        Your application has been successfully submitted on the shelter. Your application is going to be reviewed by the shelter.
                    </table>
                </div>

                
            </div>

        </div>




        <div
            class = "
        @if ($stage == 3 || $stage == 7) hidden 
        @else 
        flex items-center  py-5  justify-center @endif">

            <div
                class = "grid grid-cols-1  
            @if ($stage == 5) lg:grid-cols-2 lg:pt-14 gap-5 px-4 max-w-screen-lg 
            @else
            lg:grid-cols-3 lg:pt-14 gap-5 px-4 max-w-screen-lg @endif">
                <div
                    class = "   @if ($stage == 5) mb-7 flex justify-center items-center
                                    @else
                                    hidden @endif">
                    <div class = "bg-white p-5 max-w-lg rounded-lg shadow-md">
                        <h2 class = "font-bold text-xl p-2">Congratulations!</h2>
                        <p class = "p-2 ">Your adoption application has been approved. You are now able to adopt
                            Yumi. Please select a schedule for pick-uping the dog.</p>

                        <div class = "flex justify-center items-center p-2">
                            <img class="object-cover rounded-full object-center w-40 h-40"
                                src="{{ asset('storage/images/' . $petData->dropzone_file) }}"
                                alt='Woman looking front'>
                        </div>

                        <div class = "grid grid-cols-1 gap-2 py-2">
                            <button data-modal-target="pickup-schedule" data-modal-toggle="pickup-schedule"
                                class = "p-2 w-2/3 mx-auto text-white bg-red-500 hover:bg-red-700  text-center font-bold rounded-lg">Select
                                Schedule
                            </button>
                            {{-- Select Schedule --}}
                            <div id="pickup-schedule" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Schedule
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="pickup-schedule">
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
                                        <form
                                            action="{{ route('schedule.pickup', ['userId' => auth()->user()->id]) }}"
                                            class="p-4 md:p-5" method="POST">
                                            @csrf
                                            <h1 class = " text-left  text-lg">Please state your schedule availability
                                                for pet pickup.
                                                <b>The Shelter will bring the dog to the home.</b>
                                            </h1>
                                            <p class = "text-xs  italic">Note that the administration will have the
                                                final
                                                say on
                                                whether or not to approve your proposed schedule.</p>
                                            <div class="-mx-3  pt-3 flex flex-wrap">
                                                <div class="w-full px-3 sm:w-1/2">
                                                    <div class="mb-5">
                                                        <label for="date"
                                                            class="mb-3 block text-base  font-bold text-[#07074D]">
                                                            Date
                                                        </label>
                                                        <input type="date" name="date" id="date"
                                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-red-500 focus:shadow-md" />
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 sm:w-1/2">
                                                    <div class="mb-5">
                                                        <label for="time"
                                                            class="mb-3 block text-base font-bold text-[#07074D]">
                                                            Time
                                                        </label>
                                                        <input type="time" name="time" id="time"
                                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-red-500 focus:shadow-md" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4 mx-auto">
                                                <button type="submit"
                                                    class="text-white mt-6 inline-flex justify-center items-center bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Submit
                                                </button>
                                                <button type="submit"
                                                    class="text-white mt-6 inline-flex justify-center items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1-ms-1 w-4 h-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class=" @if ($stage == 5) hidden 
                @else
                block bg-white px-5 mt-10 lg:mt-0 shadow-md rounded-2xl text-gray-900 @endif">

                    <div
                        class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="h-32 w-32 object-cover rounded-full "
                            src='{{ asset('storage/' . $userr->profile_image) }}' alt='Woman looking front'>
                    </div>
                    <h1 class = "text-center font-bold text-2xl capitalize">
                        {{ $userr->firstname . ' ' . $userr->name }}</h1>
                    <div class = "pb-4">
                        <ul class="space-y-3  mb-4">
                            <div class = "grid grid-cols-2 gap-1 pt-4">
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Birthday
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ \Carbon\Carbon::parse($userr->birthday)->format('F j, Y') }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Gender
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $userr->gender }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div class = "grid grid-cols-2 gap-1 p-1">
                                <li>
                                    <label
                                        class="  inline-flex items-center justify-between w-full h-full  p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Phone Number
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $userr->phone_number }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class="  inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Civil Status
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $userr->civil_status }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <li>
                                <label
                                    class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <div class="block">
                                        <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                            Email
                                        </div>
                                        <div class="w-full text-base font-medium">
                                            {{ $userr->email }}
                                        </div>
                                    </div>
                                </label>

                            </li>

                            <li>
                                <label
                                    class="  inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <div class="block">
                                        <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                            Address
                                        </div>
                                        <div class="w-full text-base font-medium">
                                            {{ $userr->street . ', ' . $userr->barangay . ', ' . $userr->city . ', ' . $userr->province }}
                                        </div>
                                    </div>
                                </label>
                            </li>
                        </ul>

                        <button data-modal-target="answer-modal" data-modal-toggle="answer-modal"
                            class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            type="button">
                            View Answers
                        </button>

                    </div>
                </div>
                <div
                    class=" @if ($stage == 5) hidden 
                @else
                block bg-white px-5 mt-10 h-full lg:mt-0 shadow-md rounded-2xl text-gray-900 @endif">

                    <div class="mx-auto w-32 h-32 -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center h-32 w-32"
                            src="{{ asset('storage/images/' . $petData->dropzone_file) }}" alt='Woman looking front'>
                    </div>
                    <h1 class = "text-center font-bold text-2xl capitalize">{{ $petData->pet_name }}</h1>
                    <div class = "pb-4">
                        <ul class="space-y-3  mb-4">
                            <div class = "grid grid-cols-2 gap-1 pt-4">
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Age
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $petData->age }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Gender
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $petData->gender }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div class = "grid grid-cols-2 gap-1 p-1">
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Breed
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $petData->breed }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Weight
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $petData->weight }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div class = "grid grid-cols-2 gap-1 p-1">
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Size
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $petData->size }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Color
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $petData->color }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <li>
                                <label
                                    class="inline-flex items-center justify-between w-full h-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <div class="block">
                                        <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                            Vaccination
                                        </div>
                                        <div class="w-full text-base font-medium">
                                            {{ $petData->vaccination_status }}
                                        </div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                        
                        <button data-modal-target="pet-modal" data-modal-toggle="pet-modal"
                            class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            type="button">
                            More details
                        </button>
                    </div>
                </div>
                <div
                    class = "bg-white lg:order-last order-first rounded-2xl max-h-96 overflow-y-auto p-4 shadow-md h-96
                    @if ($stage == 5) w-3/4 mx-auto
                    @else @endif">
                        <h1 class = "font-bold text-xl">Adoption Progress</h1>
                        <!-- Modal toggle -->
                        <table>
                            @if($firstnotification)
                                @foreach ($firstnotification as $notify)
                                    <tr class = "bg-white border-b border-gray-200">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white"><h5>{{ $notify->message }}</h5></td>
                                    </tr>                    
                                @endforeach
                            @endif
                            <tr class = "bg-white border-b border-gray-200">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white"><h5>Your application has been successfully submitted on the shelter. Your application is going to be reviewed by the shelter.</h5></td>
                            </tr>   
                            @if ($stage === 1)
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Schedule Interview
                            </button> 
                        </table>
                       
                            

                        <!-- Main modal -->
                        <div id="crud-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Schedule
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="crud-modal">
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
                                    <form action="{{ route('schedule.interview', ['userId' => auth()->user()->id]) }}"
                                        class="p-4 md:p-5" method="POST">
                                        @csrf
                                        <h1 class = " text-left  text-lg">Please state your interview availability
                                            and
                                            start time.
                                            Interviews are limited to <b>1 hour.</b>
                                        </h1>
                                        <p class = "text-xs  italic">Note that the administration will have the
                                            final
                                            say on
                                            whether or not to approve your proposed schedule.</p>
                                        <div class="-mx-3  pt-3 flex flex-wrap">
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <label for="date"
                                                        class="mb-3 block text-base  font-bold text-[#07074D]">
                                                        Date
                                                    </label>
                                                    <input type="date" name="date" id="date"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-red-500 focus:shadow-md" />
                                                </div>
                                            </div>
                                            <div class="w-full px-3 sm:w-1/2">
                                                <div class="mb-5">
                                                    <label for="time"
                                                        class="mb-3 block text-base font-bold text-[#07074D]">
                                                        Time
                                                    </label>
                                                    <input type="time" name="time" id="time"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-red-500 focus:shadow-md" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4 mx-auto">
                                            <button type="submit"
                                                class="text-white mt-6 inline-flex justify-center items-center bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Submit
                                            </button>
                                            <button type="submit"
                                                class="text-white mt-6 inline-flex justify-center items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="me-1-ms-1 w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @elseif ($stage === 9)
                        <a href="{{ route('download.contract', ['id' => $adoption->id]) }}">
                            <button
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                </svg>
                                <span>Download</span>
                            </button>
                        </a>
                    @else
                    @endif
                </div>
            </div>
    </section>

    <!-- Main modal -->
    <div id="pet-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-5xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $petData->pet_name . ' Details' }} </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="pet-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 grid grid-cols-1 md:grid-cols-4 gap-2">
                    <ul class="space-y-4 ">
                        <li>
                            <input type="text" id="pet-name" name="job" value="pet-name"
                                class="hidden peer" required>
                            <label for="pet-name"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->pet_name }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Name</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="text" id="pet-type" name="job" value="pet-type"
                                class="hidden peer" required>
                            <label for="pet-type"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->pet_type }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Pet Type</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="text" id="pet-breed" name="job" value="pet-breed"
                                class="hidden peer" required>
                            <label for="pet-breed"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->breed }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Breed</div>
                                </div>
                            </label>
                        </li>
                        
                       
                    </ul>
                    <ul class = "space-y-4 ">
                        <li>
                            <input type="text" id="pet-age" name="job" value="pet-age" class="hidden peer"
                                required>
                            <label for="pet-age"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->age }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Age</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="text" id="pet-color" name="job" value="pet-color"
                                class="hidden peer" required>
                            <label for="pet-color"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->color }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Color</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="text" id="adoption-status" name="job" value="adoption-status"
                                class="hidden peer" required>
                            <label for="adoption-status"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->adoption_status }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Adoption Status</div>
                                </div>
                            </label>
                        </li>
                       
                    </ul>
                    
                    <ul class = "space-y-4 ">
                        <li>
                            <input type="text" id="pet-gender" name="job" value="pet-gender"
                                class="hidden peer" required>
                            <label for="pet-gender"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->gender }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Gender</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="text" id="vaccination-status" name="job" value="vaccination-status"
                                class="hidden peer" required>
                            <label for="vaccination-status"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->vaccination_status }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Vaccination Status</div>
                                </div>
                            </label>
                        </li>
                          
                        <li>
                            <input type="text" id="pet-weight" name="job" value="pet-weight"
                                class="hidden peer" required>
                            <label for="pet-weight"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->weight }} kg</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Weight</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                    <ul class = "space-y-4 ">
                      
                        <li>
                            <input type="text" id="pet-size" name="job" value="pet-size"
                                class="hidden peer" required>
                            <label for="pet-size"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->size }} cm</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Size</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="text" id="pet-behavior" name="job" value="pet-behavior"
                                class="hidden peer" required>
                            <label for="pet-behavior"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->behaviour }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Behavior</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="text" id="pet-description" name="job" value="job-1"
                                class="hidden peer" required>
                            <label for="job-1"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        {{ $petData->description }}</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Description</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class = "p-5 text-center">
                    <button type="submit" class="rounded" data-modal-target="petimage-modal"
                        data-modal-toggle="petimage-modal">
                        <img class="max-w-2xl max-h-60 mx-auto"
                            src="{{ asset('storage/images/' . $petData->dropzone_file) }}" alt="pet image">
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div id="petimage-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-screen">
            <div class="relative  rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="petimage-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 items-center text-center">
                    <img class="object-cover object-center mx-auto max-w-xl  "
                        src="{{ asset('storage/images/' . $petData->dropzone_file) }}" alt='user profile'>
                </div>
            </div>
        </div>
    </div>
    <div id="answer-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $userr->firstname . ' ' . $userr->name . ' Answers' }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="answer-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="first_question" :value="__('Social Media (FB/IG/Twitter)')" />
                            <x-text-input id="first_question" class="block mt-1 w-full" type="text"
                                name="first_question" :value="old('first_question', $adoptionAnswerData->first_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="second_question" :value="__('What prompted you to adopt from us?')" />
                            <x-text-input id="second_question" class="block mt-1 w-full" type="text"
                                name="second_question" :value="old('second_question', $adoptionAnswerData->second_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="third_question" :value="__('Have you adopted from us before?')" />
                            <x-text-input id="third_question" class="block mt-1 w-full" type="text"
                                name="third_question" :value="old('third_question', $adoptionAnswerData->third_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fourth_question" :value="__('For whom are you adopting a pet?')" />
                            <x-text-input id="fourth_question" class="block mt-1 w-full" type="text"
                                name="fourth_question" :value="old('fourth_question', $adoptionAnswerData->fourth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fifth_question" :value="__('Are there children below 18 in your house?')" />
                            <x-text-input id="fifth_question" class="block mt-1 w-full" type="text"
                                name="fifth_question" :value="old('fifth_question', $adoptionAnswerData->fifth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="sixth_question" :value="__('Do you have other pets?')" />
                            <x-text-input id="sixth_question" class="block mt-1 w-full" type="text"
                                name="sixth_question" :value="old('sixth_question', $adoptionAnswerData->sixth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="sevent_question" :value="__('Have you had pets in the past?')" />
                            <x-text-input id="sevent_question" class="block mt-1 w-full" type="text"
                                name="sevent_question" :value="old('sevent_question', $adoptionAnswerData->sevent_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="eight_question" :value="__('Who else do you live with?')" />
                            <x-text-input id="eight_question" class="block mt-1 w-full" type="text"
                                name="eight_question" :value="old('eight_question', $adoptionAnswerData->eight_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="ninth_question" :value="__('Are any members of your house hold allergic to animals?')" />
                            <x-text-input id="ninth_question" class="block mt-1 w-full" type="text"
                                name="ninth_question" :value="old('ninth_question', $adoptionAnswerData->ninth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="tenth_question" :value="__(
                                'Who will be responsible for feeding, grooming, and generally caring of your pet?',
                            )" />
                            <x-text-input id="tenth_question" class="block mt-1 w-full" type="text"
                                name="tenth_question" :value="old('tenth_question', $adoptionAnswerData->tenth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="eleventh_question" :value="__(
                                'Who will be financially responsible for your pets needs (i.e food,vet,bills,etc)?',
                            )" />
                            <x-text-input id="eleventh_question" class="block mt-1 w-full" type="text"
                                name="eleventh_question" :value="old('eleventh_question', $adoptionAnswerData->eleventh_question)" />
                        </div>



                    </div>

                    <div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twelfth_question" :value="__(
                                'Who will look after your pet if you go on vacation or in case of emergency?',
                            )" />
                            <x-text-input id="twelfth_question" class="block mt-1 w-full" type="text"
                                name="twelfth_question" :value="old('twelfth_question', $adoptionAnswerData->twelfth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="thirteenth_question" :value="__('How many hours in an average work day will your pet be left alone?')" />
                            <x-text-input id="thirteenth_question" class="block mt-1 w-full" type="text"
                                name="thirteenth_question" :value="old('thirteenth_question', $adoptionAnswerData->thirteenth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fourteenth_question" :value="__('Does everyone in the family support your decision to adopt a pet?')" />
                            <x-text-input id="fourteenth_question" class="block mt-1 w-full" type="text"
                                name="fourteenth_question" :value="old('fourteenth_question', $adoptionAnswerData->fourteenth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fifteenth_question" :value="__(
                                'What steps will you take to familiarize your new pet with his/her new surrounding?',
                            )" />
                            <x-text-input id="fifteenth_question" class="block mt-1 w-full" type="text"
                                name="fifteenth_question" :value="old('fifteenth_question', $adoptionAnswerData->fifteenth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="seventeenth_question" :value="__('What type of building do you live in?')" />
                            <x-text-input id="seventeenth_question" class="block mt-1 w-full" type="text"
                                name="seventeenth_question" :value="old('seventeenth_question', $adoptionAnswerData->seventeenth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="eighteenth_question" :value="__('Do you rent?')" />
                            <x-text-input id="eighteenth_question" class="block mt-1 w-full" type="text"
                                name="eighteenth_question" :value="old('eighteenth_question', $adoptionAnswerData->eighteenth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="nineteenth_question" :value="__('What happens to your pet if or when you move?')" />
                            <x-text-input id="nineteenth_question" class="block mt-1 w-full" type="text"
                                name="nineteenth_question" :value="old('nineteenth_question', $adoptionAnswerData->nineteenth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentieth_question" :value="__('Do you have a fenced yard? ')" />
                            <x-text-input id="twentieth_question" class="block mt-1 w-full" type="text"
                                name="twentieth_question" :value="old('twentieth_question', $adoptionAnswerData->twentieth_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentyfirst_question" :value="__('How much time will your dog spend in the yard?')" />
                            <x-text-input id="twentyfirst_question" class="block mt-1 w-full" type="text"
                                name="twentyfirst_question" :value="old('twentyfirst_question', $adoptionAnswerData->twentyfirst_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentysecond_question" :value="__('Are you prepared to walk and potty train your dog? ')" />
                            <x-text-input id="twentysecond_question" class="block mt-1 w-full" type="text"
                                name="twentysecond_question" :value="old('twentysecond_question', $adoptionAnswerData->twentysecond_question)" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentythird_question" :value="__('Are you prepared to manage chewing, marking, excessive barking, etc?')" />
                            <x-text-input id="twentythird_question" class="block mt-1 w-full" type="text"
                                name="twentythird_question" :value="old('twentythird_question', $adoptionAnswerData->twentythird_question)" />
                        </div>
                    </div>
                    <div class="border-t border-gray-200 rounded-b dark:border-gray-600">
                        <x-primary-button data-modal-target="forid-modal" data-modal-toggle="forid-modal"
                            class="w-full text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            type="button">
                            View ID </x-primary-button>
                    </div>
                    <div class="border-t border-gray-200 rounded-b dark:border-gray-600">
                        <x-primary-button data-modal-target="forsignature-modal"
                            data-modal-toggle="forsignature-modal"
                            class="w-full text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            type="button">
                            View Signature </x-primary-button>
                    </div>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
    <div id="forid-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="forid-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <img class="object-cover object-center  mx-auto max-w-3xl  h-full"
                        src="{{ asset('storage/signatures/' . $adoptionAnswerData->upload) }}" alt='user profile'>
                </div>
            </div>
        </div>
    </div>

    <div id="forsignature-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="forsignature-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <img class="object-cover object-center  mx-auto max-w-3xl  h-full"
                        src="{{ asset('storage/signatures/' . $adoptionAnswerData->upload2) }}" alt='user profile'>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
