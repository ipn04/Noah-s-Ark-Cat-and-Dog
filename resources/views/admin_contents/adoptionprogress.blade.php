<x-app-layout>
    <x-slot name="title">Adoption Form Page</x-slot>
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
                    confirmButtonText: "Cool"
                });
            }
        </script>
    @endif

    @if (session('updateStage'))
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
                <a href="{{ route('admin.adoptions') }}"
                    class="lg:text-lg text-base hover:font-bold hover:cursor-pointer hover:text-red-700">Adoptions</a>
                <p class="lg:text-lg text-base">>></p>
                <h2 class="font-bold text-base lg:text-lg text-yellow-500">Adoption Application Details</h2>
            </div>
            <div class="lg:py-0 mx-auto lg:mx-0">
                <form action="{{ route('admin.updateStage', ['id' => $adoptionAnswer->id]) }}" method="POST"
                    class="grid grid-cols-1 
                    @if ($stage == 1 || $stage == 2 || $stage == 3 || $stage >= 5) lg:grid-cols-1
                    @else
                    lg:grid-cols-2 @endif
                    py-3 gap-3 ">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg hover:text-green-500 font-bold bg-green-500 text-white rounded-lg shadow-md
                    @if ($stage == 1 || $stage == 2 || $stage == 3 || $stage == 5 || $stage == 7 || $stage == 9) hidden
                    @else
                    block @endif
                    ">
                        @if ($stage == 4)
                            Accept Application
                        @elseif ($stage == 7)
                            Mark as Adopted
                        @else
                            Proceed to Next Steps
                        @endif
                    </button>
                    <button type="submit"
                        class="
                        @if ($stage > 4) hidden 
                        @else
                        hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg text-center hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md @endif">Reject
                        Application</button>
                </form>
            </div>
        </div>


        <div class = "flex items-center  py-4 justify-center">
            <div
                class = "grid grid-cols-1 max-w-screen-lg px-14 lg:px-5 py-3 bg-white rounded-2xl shadow-md lg:grid-cols-7 gap-2">
                <div>
                    <div class = "flex items-center justify-center gap-2 ">
                        <div
                            class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 
                                @if ($stage >= 0 && $stage < 10) bg-green-200 text-green-500
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
                                    @if ($stage > 0 && $stage < 10) bg-green-200 text-green-500
                                    @else
                                    text-gray-600 bg-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="lg:w-8 lg:h-8 w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h1 class = "lg:hidden text-center py-2 ">Application Validated</h1>

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
                                text-gray-600 bg-gray-200 @endif">
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
                        <div class = "flex items-center justify-start lg:justify-center gap-2">
                            <div
                                class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 
                                @if ($stage > 4 && $stage < 10) bg-green-200 text-green-500
                                @elseif($stage == 4)
                                bg-yellow-200 text-yellow-500
                                @else
                                text-gray-600 bg-gray-200 @endif ">
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
                            <h2 class = "font-bold text-lg p-2 ps-2">Date and Time of Arrival</h2>
                            <p class = "p-2 pe-2 ps-4">November 16,2023</p>
                            <h2 class = "font-bold text-lg p-2 ps-2">Location</h2>
                            <p class = "p-2 pe-2 ps-4">Blk 54 lot 3 Sarmiento Homes, San Jose del Monte Bulacan</p>

                            <div class="flex items-center justify-center w-full py-3">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Upload Contract Here</span> click or drag and
                                            drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PDF FILE ONLY</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div>

                            <div class = "grid grid-cols-1 gap-2 py-2">
                                <button
                                    class = "p-2 w-2/3 mx-auto text-white bg-red-500 hover:bg-red-700  text-center font-bold rounded-lg">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div
                        class = "@if ($stage == 3) mb-7 flex justify-center items-center
                    @else
                    hidden @endif">
                        <div class = "bg-white p-5 max-w-lg rounded-lg shadow-md">
                            <h2 class = "font-bold text-lg p-2">Interview at 2023-13-11</h2>
                            <p class = "p-2">You have an interview scheduled later at 10:00am. Please join this meet
                                later at 10:00 am</p>
                            <div class = "grid grid-cols-1 gap-2 py-2">
                                <form action="{{ route('admin.wrap', ['id' => $adoptionAnswer->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class = "p-2 w-2/3 mx-auto text-white bg-red-500 hover:bg-red-700  text-center font-bold rounded-lg">Join
                                        Meet</button>
                                    <button type="submit"
                                        class = "p-2  w-2/3 mx-auto text-gray-600 bg-yellow-200 hover:bg-yellow-300  text-center font-bold rounded-lg">Wrap
                                        Interview</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class = "grid grid-cols-1  lg:grid-cols-2 lg:pt-14 gap-5 px-4 max-w-screen-lg">
                        <div class="bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                            <div
                                class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                <img class="object-cover object-center w-32 h-32"
                                    src="{{ asset('storage/' . $adoptionAnswer->application->user->profile_image) }}"
                                    alt='user profile'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                                {{ $adoptionAnswer->application->user->firstname . ' ' . $adoptionAnswer->application->user->name }}
                            </h1>
                            <div class = "pb-4">
                                <table class = "border-separate border-spacing-3">
                                    <tr>
                                        <td class = "font-bold">Age</td>
                                        <td>{{ $adoptionAnswer->application->user->birthday }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Gender</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->application->user->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Phone</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->application->user->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Email</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->application->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Civil Status</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->application->user->email }}</td>
                                    </tr>

                                    <tr>
                                        <td class = "font-bold">Address</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->application->user->province . ' ' . $adoptionAnswer->application->user->city . ' ' . $adoptionAnswer->application->user->barangay . ' ' . $adoptionAnswer->application->user->street }}
                                        </td>
                                    </tr>
                                </table>
                                <x-primary-button>
                                    <a href = "">View Answers</a>
                                </x-primary-button>
                            </div>
                        </div>
                        <div class="bg-white px-5 lg:mt-0 mt-12 shadow-md rounded-2xl text-gray-900">

                            <div
                                class="mx-auto w-32 h-32 -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                <img class="object-cover object-center w-32 h-32"
                                    src="{{ asset('storage/images/' . $adoptionAnswer->pet->dropzone_file) }}"
                                    alt='Woman looking front'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">{{ $adoptionAnswer->pet->pet_name }}
                            </h1>
                            <div class = "pb-4">
                                <table class = "border-separate border-spacing-3">
                                    <tr>
                                        <td class = "font-bold">Age</td>
                                        <td>{{ $adoptionAnswer->pet->age }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Gender</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->pet->pet_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Breed</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->pet->breed }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Weight</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->pet->weight }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Size</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->pet->size }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Color</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->pet->color }}</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Vaccination</td>
                                        <td class = "capitalize">{{ $adoptionAnswer->pet->vaccination_status }}</td>
                                    </tr>
                                </table>
                                <x-primary-button>
                                    <a href = "">More Details</a>
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "bg-white lg:order-last order-first max-h-96 rounded-2xl p-4 shadow-md">
                    <h1 class = "font-bold text-xl">Adoption Progress</h1>

                </div>
            </div>

        </div>
        <div
            class = "@if ($stage == 3 || $stage == 7) hidden
                    @else
                    flex items-center  py-5  justify-center @endif
                     ">
            <div class = "grid grid-cols-1  lg:grid-cols-3 lg:pt-14 gap-5 px-4 max-w-screen-lg">
                <div class="bg-white px-5 mt-10 lg:mt-0 shadow-md rounded-2xl text-gray-900">
                    <div
                        class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center w-32 h-32"
                            src="{{ asset('storage/' . $adoptionAnswer->application->user->profile_image) }}"
                            alt='user profile'>
                    </div>
                    <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                        {{ $adoptionAnswer->application->user->firstname . ' ' . $adoptionAnswer->application->user->name }}
                    </h1>
                    <div class = "pb-4">
                        <table class = "border-separate border-spacing-3">
                            <tr>
                                <td class = "font-bold">Age</td>
                                <td class = "capitalize">{{ $adoptionAnswer->application->user->birthday }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Gender</td>
                                <td class = "capitalize">{{ $adoptionAnswer->application->user->gender }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Phone</td>
                                <td class = "capitalize">{{ $adoptionAnswer->application->user->phone_number }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Email</td>
                                <td class = "capitalize">{{ $adoptionAnswer->application->user->email }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Civil Status</td>
                                <td class = "capitalize">{{ $adoptionAnswer->application->user->email }}</td>
                            </tr>

                            <tr>
                                <td class = "font-bold">Address</td>
                                <td class = "capitalize">{{ $adoptionAnswer->application->user->province . ' ' . $adoptionAnswer->application->user->city . ' ' . $adoptionAnswer->application->user->barangay . ' ' . $adoptionAnswer->application->user->street }}
                                </td>
                            </tr>
                        </table>
                        <x-primary-button>
                            <a href = "">View Answers</a>
                        </x-primary-button>
                    </div>
                </div>
                <div class="bg-white px-5 lg:mt-0 mt-12 shadow-md rounded-2xl text-gray-900">

                    <div class="mx-auto w-32 h-32 -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center  w-32 h-32"
                            src="{{ asset('storage/images/' . $adoptionAnswer->pet->dropzone_file) }}"
                            alt='Woman looking front'>
                    </div>
                    <h1 class = "text-center font-bold text-2xl py-2 capitalize">{{ $adoptionAnswer->pet->pet_name }}</h1>
                    <div class = "pb-4">
                        <table class = "border-separate border-spacing-3">
                            <tr>
                                <td class = "font-bold">Age</td>
                                <td class = "capitalize">{{ $adoptionAnswer->pet->age }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Gender</td>
                                <td class = "capitalize">{{ $adoptionAnswer->pet->pet_name }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Breed</td>
                                <td class = "capitalize">{{ $adoptionAnswer->pet->breed }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Weight</td>
                                <td class = "capitalize">{{ $adoptionAnswer->pet->weight }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Size</td>
                                <td class = "capitalize">{{ $adoptionAnswer->pet->size }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Color</td>
                                <td class = "capitalize">{{ $adoptionAnswer->pet->color }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Vaccination</td>
                                <td class = "capitalize">{{ $adoptionAnswer->pet->vaccination_status }}</td>
                            </tr>
                        </table>
                        <x-primary-button>
                            <a href = "">More Details</a>
                        </x-primary-button>
                    </div>
                </div>
                <div class = "bg-white lg:order-last order-first rounded-2xl p-4 shadow-md">
                    <h1 class = "font-bold text-xl">Adoption Progress</h1>
                    @if ($stage === '2')
                        <!-- Modal toggle -->
                        <button data-modal-target="progress-modal-{{ $adoptionAnswer->id }}" data-modal-toggle="progress-modal-{{ $adoptionAnswer->id }}"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Interview Schedule
                        </button>

                        <!-- Main modal -->
                        <div id="progress-modal-{{ $adoptionAnswer->id }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="progress-modal-{{ $adoptionAnswer->id }}">
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
                                        <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Name
                                            {{ $scheduleInterview->application->user->firstname }}
                                            {{ $scheduleInterview->application->user->name }}</h3>
                                        <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Date
                                            {{ $scheduleInterview->date }}</h3>
                                        <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Time
                                            {{ $scheduleInterview->time }}</h3>
                                        <!-- Modal footer -->
                                        <div class="flex items-center mt-6 space-x-2 rtl:space-x-reverse">
                                            <form action="{{ route('admin.interviewStage', ['id' => $adoptionAnswer->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button data-modal-hide="progress-modal-{{ $adoptionAnswer->id }}" type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept</button>
                                                <button data-modal-hide="progress-modal-{{ $adoptionAnswer->id }}" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
    </section>
</x-app-layout>
