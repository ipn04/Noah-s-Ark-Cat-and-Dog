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
                <h2 class="font-bold text-base lg:text-lg text-yellow-500">Volunteer Application Details</h2>
            </div>
            <div class="py-3 lg:py-0 mx-auto lg:mx-0">
                <a href=""
                    class="
                    @if ($stage >= 5) hidden 
                    @else
                    block hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md @endif
                    ">Cancel
                    Application</a>
            </div>
            @if($stage == 10)
                <h1 class="bg-red-300 px-3 py-3 text-red-600">Application rejected</h1>
            @endif
        </div>
        <div class = "flex items-center  py-4 justify-center">
            <div
                class = "grid grid-cols-1 max-w-screen-lg px-14 lg:px-8 py-5 bg-white rounded-2xl shadow-md lg:grid-cols-5 gap-2">
                <div>
                    <div class = "flex items-center justify-center gap-2">
                        <div
                            class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 text-gray-600 bg-gray-200
                                @if($stage >= 0 && $stage <6)
                                text-green-500 bg-green-200
                                @else
                                text-gray-600 bg-gray-200 
                                @endif
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
                                @if ($stage > 0 && $stage < 6) bg-green-200 text-green-500
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

        <div class="  
        @if ($stage == 3 ) flex items-center py-5 justify-center
        @else
        hidden @endif  
         ">
            <div class = "grid grid-cols-1 lg:grid-cols-3  gap-5 px-4 max-w-screen-2xl">
                <div class = "col-span-2 ">


                    <div class = "mb-7 flex justify-center items-center
                   ">
                        <div class = "bg-white p-5 max-w-lg rounded-lg shadow-md">
                            <h2 class = "font-bold text-lg p-2">Interview at 2023-13-11</h2>
                            <p class = "p-2">You have an interview scheduled later at 10:00am. Please join this
                                meet
                                later at 10:00 am.</p>
                            <div class = "grid grid-cols-1 gap-2 py-2">
                                <button
                                    class = "p-2 w-2/3 mx-auto text-white bg-red-500 hover:bg-red-700  text-center font-bold rounded-lg">Join
                                    Meet</button>

                            </div>
                        </div>
                    </div>
                    <div class = " 
                        grid grid-cols-1 lg:pt-14 gap-5 px-4 max-w-screen-lg ">
                        <div class="bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                            <div
                                class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                <img class="object-cover object-center w-32 h-32" src="{{ asset('storage/' . $userVolunteerAnswers->volunteer_application->application->user->profile_image) }}" alt='user profile'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                                
                            </h1>
                            <div class = "pb-4">
                                <table class = "border-separate border-spacing-3">
                                    <tr>
                                        <td class = "font-bold">Birthdate</td>
                                        <td>{{ $userVolunteerAnswers->volunteer_application->application->user->birthday }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Gender</td>
                                        <td class = "capitalize">{{ $userVolunteerAnswers->volunteer_application->application->user->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Phone</td>
                                        <td class = "capitalize">{{ $userVolunteerAnswers->volunteer_application->application->user->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Email</td>
                                        <td>{{ $userVolunteerAnswers->volunteer_application->application->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Civil Status</td>
                                        <td class = "capitalize">{{ $userVolunteerAnswers->volunteer_application->application->user->civil_status }}</td>
                                    </tr>

                                    <tr>
                                        <td class = "font-bold">Address</td>
                                        <td class = "capitalize">
                                            {{ $userVolunteerAnswers->volunteer_application->application->user->region . ' ' . $userVolunteerAnswers->volunteer_application->application->user->province . ' ' .  $userVolunteerAnswers->volunteer_application->application->user->city . ' ' .  $userVolunteerAnswers->volunteer_application->application->user->barangay . ' ' .  $userVolunteerAnswers->volunteer_application->application->user->street}}
                                        </td>
                                    </tr>
                                </table>
                                <button data-modal-target="answer-modal" data-modal-toggle="answer-modal"
                                    class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    type="button">
                                    View Answers
                                </button>
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class = "bg-white lg:order-last order-first max-h-96 rounded-2xl p-4 shadow-md">
                    <h1 class = "font-bold text-xl">Adoption Progress</h1>

                </div>
            </div>

        </div>


        <div class="   
        @if ($stage == 3 || $stage == 7) hidden 
        @else 
        flex items-center  py-5  px-10  justify-center
         @endif    
          "
         >
            <div class = "grid grid-cols-1 lg:grid-cols-2  gap-10 px-4 max-w-screen-lg lg:mt-12">

                    <div class="bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                        @if($userVolunteerAnswers)
                            {{-- @foreach ($userVolunteerAnswers as $answers) --}}
                                <div
                                    class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                    <img class="object-cover object-center w-32 h-32" src="{{ asset('storage/' . $userVolunteerAnswers->volunteer_application->application->user->profile_image) }}" alt='user profile'>
                                </div>
                                <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                                    {{ $userVolunteerAnswers->volunteer_application->application->user->firstname .' '.$userVolunteerAnswers->volunteer_application->application->user->name }}
                                </h1>
                                <div class = "pb-4">
                                    <table class = "border-separate border-spacing-3">
                                        <tr>
                                            <td class="font-bold">Birthday</td>
                                            <td>{{ $userVolunteerAnswers->volunteer_application->application->user->birthday }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Gender</td>
                                            <td class="capitalize">{{ $userVolunteerAnswers->volunteer_application->application->user->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Phone</td>
                                            <td class="capitalize">{{ $userVolunteerAnswers->volunteer_application->application->user->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Email</td>
                                            <td>{{ $userVolunteerAnswers->volunteer_application->application->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Civil Status</td>
                                            <td class="capitalize">{{ $userVolunteerAnswers->volunteer_application->application->user->civil_status }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Address</td>
                                            <td class="capitalize">{{ $userVolunteerAnswers->volunteer_application->application->user->region . ' ' . $userVolunteerAnswers->volunteer_application->application->user->province  . ' ' . $userVolunteerAnswers->volunteer_application->application->user->city  . ' ' . $userVolunteerAnswers->volunteer_application->application->user->barangay  . ' ' . $userVolunteerAnswers->volunteer_application->application->user->street}}</td>
                                        </tr>
                                            
                                    </table>
                                    <button data-modal-target="answer-modal" data-modal-toggle="answer-modal"
                                        class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        type="button">
                                        View Answers
                                    </button>
                                </div>
                            {{-- @endforeach --}}
                        @else
                            <p>No volunteer answers found.</p>
                        @endif
                    </div>

                <div class = "bg-white lg:order-last order-first max-h-96 rounded-2xl p-4 shadow-md">
                    <h1 class = "font-bold text-xl">Adoption Progress</h1>
                    @if ($stage === '1')
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Schedule Interview
                        </button>


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
                                    <form action="{{ route('update.volunteer.interview', ['userId' => $userVolunteerAnswers->volunteer_application->application->user->id,'applicationId' => $userVolunteerAnswers->volunteer_application->application->id] ) }}"
                                        class="p-4 md:p-5" method="POST">
                                        @csrf
                                        <h1 class = " text-left  text-lg">Please state your interview availability and
                                            start time.
                                            Interviews are limited to <b>1 hour.</b>
                                        </h1>
                                        <p class = "text-xs  italic">Note that the administration will have the final
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
                    @endif
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
                            {{ $userVolunteerAnswers->volunteer_application->application->user->firstname . ' ' .$userVolunteerAnswers->volunteer_application->application->user->name . ' Answers' }}
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
                    <div class="p-4 md:p-5 grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="first_question" :value="__('Social Media (FB/IG/Twitter)')" />
                            <x-text-input id="first_question" class="block mt-1 w-full" type="text" name="first_question"
                            :value="old('first_question', $answers['first_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="second_question" :value="__('What prompted you to adopt from us?')" />
                            <x-text-input id="second_question" class="block mt-1 w-full" type="text" name="second_question"
                            :value="old('second_question', $answers['second_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="third_question" :value="__('Have you adopted from us before?')" />
                            <x-text-input id="third_question" class="block mt-1 w-full" type="text" name="third_question"
                            :value="old('third_question', $answers['third_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fourth_question" :value="__('For whom are you adopting a pet?')" />
                            <x-text-input id="fourth_question" class="block mt-1 w-full" type="text" name="fourth_question"
                            :value="old('fourth_question', $answers['fourth_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fifth_question" :value="__('Are there children below 18 in your house?')" />
                            <x-text-input id="fifth_question" class="block mt-1 w-full" type="text" name="fifth_question"
                                :value="old('fifth_question', $answers['fifth_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="sixth_question" :value="__('Do you have other pets?')" />
                            <x-text-input id="sixth_question" class="block mt-1 w-full" type="text" name="sixth_question"
                                :value="old('sixth_question', $answers['sixth_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="sevent_question" :value="__('Have you had pets in the past?')" />
                            <x-text-input id="sevent_question" class="block mt-1 w-full" type="text" name="sevent_question"
                                :value="old('seventh_question', $answers['seventh_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="eight_question" :value="__('Who else do you live with?')" />
                            <x-text-input id="eight_question" class="block mt-1 w-full" type="text" name="eight_question"
                                :value="old('eight_question', $answers['eight_question'] ?? '')"/>
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="ninth_question" :value="__('Are any members of your house hold allergic to animals?')" />
                            <x-text-input id="ninth_question" class="block mt-1 w-full" type="text" name="ninth_question"
                                :value="old('ninth_question', $answers['ninth_question'] ?? '')"/>
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

    </section>
</x-app-layout>
