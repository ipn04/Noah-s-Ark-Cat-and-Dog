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
                    P
                    confirmButtonText: "Ok"
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
                <div class = "flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
                <h2 class="font-bold text-base lg:text-lg text-yellow-500">Adoption Application Details</h2>
            </div>
            <div
                class="@if ($stage == 8) grid grid-cols-1  @else grid grid-cols-2 @endif gap-2 lg:py-0 mx-auto lg:mx-0 ">
                {{-- <button class="hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg hover:text-green-500 font-bold bg-green-500 text-white rounded-lg shadow-md">
                    Download PDF
                </button> --}}
                <form
                    action="{{ route('admin.updateStage', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                    method="POST" class="
                    @if ($stage == 1 || $stage == 2 || $stage == 3 || $stage >= 5) @else @endif">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg hover:text-green-500 font-bold bg-green-500 text-white rounded-lg shadow-md
                    @if (
                        $stage == 1 ||
                            $stage == 2 ||
                            $stage == 3 ||
                            $stage == 5 ||
                            $stage == 6 ||
                            $stage == 7 ||
                            $stage == 9 ||
                            $stage == 10 ||
                            $stage == 11) hidden
                    @else
                    block @endif
                    ">
                        @if ($stage == 4)
                            Accept Application
                        @elseif ($stage == 8)
                            Mark as Adopted
                        @elseif($stage == 0)
                            Proceed to Next Steps
                        @endif
                    </button>
                </form>
                @if ($stage == 9)
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
                            action="{{ route('admin.rejectStage', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="reason" id="reason" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Reason" required />
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
                    <div class = "flex items-center justify-center gap-2 ">
                        <div
                            class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 
                                @if ($stage >= 0 && $stage < 10) bg-green-200 text-green-500
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
                                    @if ($stage > 0 && $stage < 10) bg-green-200 text-green-500
                                    @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
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
                                    @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
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
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
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
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
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
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
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
                                @elseif($stage == 10 || $stage == 11)
                                bg-red-200 text-red-500
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
            class=" @if ($stage == 2 || $stage == 3 || $stage == 6 || $stage == 7  || $stage == 9) my-4 
        @else
        hidden @endif ">
            <div class="mx-auto text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 max-w-screen-lg">
                <ul class="flex flex-wrap -mb-px">
                    <li class="me-2">
                        <a href="#" id="updatesLink"
                            class="inline-block p-4 text-red-600 border-b-2 border-red-600 hover:text-red-600 hover:border-red-300 rounded-t-lg"
                            aria-current="page" onclick="selectCategory('updates')">Updates</a>
                    </li>
                    <li class="me-2">
                        <a href="#" id="userLink"
                            class="inline-block p-4 border-b-2 border-gray-100 rounded-t-lg hover:text-red-600 hover:border-red-300  "
                            onclick="selectCategory('user')">User and Pet Information</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class=" flex items-center py-5 justify-center
        ">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 max-w-screen-lg">
                <div class = "col-span-2  ">
                    <div
                        id = "announcementContainer" class = "@if ($stage == 2 || $stage ==3 || $stage == 6  || $stage == 7  || $stage == 9) mb-7 block 
                        @else
                        hidden @endif">
                        <div class = "bg-white rounded-2xl shadow-md w-full h-96 flex items-center justify-center">

                            <div class = "@if ($stage == 6) @else hidden @endif">
                                <h2 class="font-bold text-2xl text-center p-2">
                                    Congratulations!
                                </h2>
                              
                                <p class = "px-10 text-justify"> Applicant has sent a schedule for pet pickup.
                                    Click here to view the schedule request for pet pickup.</p>

                                    <button data-modal-target="progress-modal" data-modal-toggle="progress-modal"
                                    class="block my-2 text-white bg-red-500 px-5 py-3  mx-auto hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    type="button">
                                    Schedule Pickup
                                </button>
        
                                <!-- Main modal -->
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
                                            <div class="p-4 md:p-5 max-w-full">
                                                <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">
                                                    Schedule Pickup
                                                </h3>
        
                                                <div class = "mt-1">
                                                    <x-input-label for="name" value="{{ __('Name') }}" />
                                                    <x-text-input type="text" name="name" label="name"
                                                        value="{{ $schedulePickup->application->user->firstname ?? ''}} {{ $schedulePickup->application->user->name ?? ''}}"
                                                        disabled class="w-full my-2" />
                                                </div>
        
                                                <div class = "mt-2">
                                                    <x-input-label for="location" value="{{ __('Location') }}" />
                                                    <textarea name="location"
                                                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm "
                                                        label="location" value="" disabled>{{ $schedulePickup->application->user->street ?? ''}}, {{ $schedulePickup->application->user->barangay ?? ''}}, {{ $schedulePickup->application->user->city ?? ''}}, {{ $schedulePickup->application->user->province ?? ''}}</textarea>
                                                </div>
        
                                                <div class = "mt-1">
                                                    <x-input-label for="date" value="{{ __('Date of Pickup') }}" />
                                                    <x-text-input type="text" name="date" label="date"
                                                        value="{{ \Carbon\Carbon::parse($schedulePickup->date ?? '')->format('F j, Y') }}
                                                        "
                                                        disabled class="w-full  my-2" />
                                                </div>
        
        
                                                <div class = "mt-2">
                                                    <x-input-label for="time" value="{{ __('Time of Pickup') }}" />
                                                    <x-text-input type="text" name="time" label="time"
                                                        value="{{ \Carbon\Carbon::parse($schedulePickup->time ?? '')->format('g:i A') }}"
                                                        disabled class="w-full  my-2" />
                                                </div>
        
        
                                                <!-- Modal footer -->
                                                <div class="flex items-center mt-6 space-x-2 rtl:space-x-reverse">
                                                    <form
                                                        action="{{ route('admin.pickupStage', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button data-modal-hide="progress-modal }}" type="submit"
                                                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                            Accept
                                                        </button>
                                                    </form>
        
                                                    <button type="button" data-modal-target="reject-pickup" data-modal-toggle="reject-pickup"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Reject
                                                    </button>

                                                    <div id="reject-pickup" tabindex="-1"
                                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <button type="button"
                                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-hide="reject-pickup">
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
                                                                        action="{{ route('admin.rejectPickup', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <input type="text" name="reason" id="reason" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Reason" required />
                                                                        <button data-modal-hide="reject-pickup" type="submit"
                                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                            Yes, I'm sure
                                                                        </button>
                                                                        <button data-modal-hide="reject-pickup" type="button"
                                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                            cancel</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class = "@if ($stage == 2) @else hidden  @endif my-auto">
                                <h2 class="font-bold text-lg text-center p-2">
                                    Applicant has sent a schedule for interview!
                                </h2>
                                <p class = "px-2 text-center">Click here to view the schedule request for interview.</p>
                                <button data-modal-target="interview-modal" data-modal-toggle="interview-modal"
                                class="block text-white my-4 mx-auto max-w-5xl px-5 py-3  bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button">
                                View Interview Schedule
                            </button>
                            <!-- Main modal -->
                            <div id="interview-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="interview-modal">
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
                                                    value="{{ $adoptionAnswer->user->firstname . ' ' . $adoptionAnswer->user->name }}"
                                                    disabled class="w-full my-2" />
                                            </div>
                                            {{-- <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Date:
                                                {{ \Carbon\Carbon::parse($scheduleInterview->date ?? null)->format('F, j, Y') }}</h3>
                                            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Time:
                                                {{ \Carbon\Carbon::parse($scheduleInterview->time ?? null)->format('g:i, A') }}</h3> --}}
           
                                            @if ($scheduleInterview)
                                                <div class = "mt-2">
                                                    <x-input-label for="date" value="{{ __('Interview Date') }}" />
                                                    <x-text-input type="text" name="date" label="date"
                                                        value="{{ \Carbon\Carbon::parse($scheduleInterview->date)->format('F j, Y') }}
                                                        "
                                                        disabled class="w-full my-2" />
                                                </div>
                                            @else
                                                <div class = "mt-2">
    
                                                    <x-input-label for="date" value="{{ __('Interview Date') }}" />
                                                    <x-text-input type="text" name="date" label="date"
                                                        value="N/A" disabled class="w-full my-2" />
                                                </div>
                                            @endif
    
                                            @if ($scheduleInterview)
                                                <div class = "mt-2">
    
                                                    <x-input-label for="time" value="{{ __('Interview Time') }}" />
                                                    <x-text-input type="text" name="time" label="time"
                                                        value="{{ \Carbon\Carbon::parse($scheduleInterview->time)->format('g:i A') }}
                                                        "
                                                        disabled class="w-full my-2" />
                                                </div>
                                            @else
                                                <div class = "mt-2">
    
                                                    <x-input-label for="time" value="{{ __('Interview Time') }}" />
                                                    <x-text-input type="text" name="time" label="time"
                                                        value="N/A" disabled class="w-full my-2" />
                                                </div>
                                            @endif
    
                                            <div class="flex items-center mt-6 space-x-2 rtl:space-x-reverse">
                                                <form
                                                    action="{{ route('admin.interviewStage', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Accept</button>
                                                </form>
                                                
                                                <button type="button" data-modal-target="reject-modal" data-modal-toggle="reject-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Reject</button>
                                                
                                                <div id="reject-modal" tabindex="-1"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="reject-modal">
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
                                                                    action="{{ route('admin.rejectInterview', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="text" name="reason" id="reason" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Reason" required />
                                                                    <button data-modal-hide="reject-modal" type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                    <button data-modal-hide="reject-modal" type="button"
                                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                        cancel</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class = "@if($stage == 3) @else hidden @endif w-11/12">
                                @php
                                    $scheduledDate = optional($scheduleInterview ?? '')->date
                                        ? \Carbon\Carbon::parse($scheduleInterview->date ?? '')
                                        : null;
                                    $scheduledTime = optional($scheduleInterview ?? '')->time
                                        ? \Carbon\Carbon::parse($scheduleInterview->time ?? '')
                                        : null;
                                    $scheduledDateTime =
                                        $scheduledDate && $scheduledTime
                                            ? $scheduledDate->setTimeFromTimeString($scheduledTime->toTimeString())
                                            : null;
                                @endphp

                                <h2 class="font-bold text-lg p-2 ">
                                    @if ($scheduledDateTime)
                                        Interview at {{ $scheduledDateTime->format('F j, Y g:ia') }}
                                    @else
                                        No scheduled interview
                                    @endif
                                </h2>

                                @if ($scheduledDateTime)
                                    <p class="p-2 mb-2">
                                        You have an interview scheduled later at
                                        {{ $scheduledDateTime->format('F j, Y g:ia') }}.
                                        Please join this meet later at {{ $scheduledDateTime->format(' g:ia') }}.
                                    </p>

                                    <div class="grid grid-cols-1 gap-2 py-2">
                                        <a target="_blank"
                                            href="{{ route('interview.admin', ['scheduleId' => optional($scheduleInterview)->interview_id]) }}">
                                            @php
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
                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you
                                                        want
                                                        to cancel this meeting?</p>
                                                    <div>
                                                        <form
                                                            action="{{ route('admin.cancelInterview', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="text" name="reason" id="reason" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Reason" required />
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
                                @else
                                    <p class="p-2">No interview is currently scheduled.</p>
                                @endif

                                <form
                                    action="{{ route('admin.wrap', ['userId' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class = "p-2  w-full mx-auto text-gray-600 bg-yellow-200 hover:bg-yellow-300  text-center font-bold rounded-lg">Wrap
                                        Interview</button>
                                </form>
                            </div>
                            <div class = "@if ($stage == 7) p-4 w-11/12 @else hidden @endif ">
                                <h2 class = "font-bold text-xl pl-2">Schedule Confirmed</h2>
                                <h2 class = "font-bold text-lg pl-2">Date and Time of Arrival</h2>
                                <p class="p-2 pe-2 ps-4">
                                    @isset($schedulePickup->date)
                                        {{ \Carbon\Carbon::parse($schedulePickup->date)->format('F j, Y') }}
                                    @endisset

                                    @isset($schedulePickup->time)
                                        {{ \Carbon\Carbon::parse($schedulePickup->time)->format('g:i A') }}
                                    @endisset

                                </p>
                                <h2 class = "font-bold text-lg p-2 ps-2">Location</h2>
                                <p class = "p-2 pe-2 ps-4">
                                    {{ $adoptionAnswer->user->street . ', ' . $adoptionAnswer->user->barangay . ', ' . $adoptionAnswer->user->city . ', ' . $adoptionAnswer->user->province }}
                                </p>

                                <form
                                    action="{{ route('update.contract', ['user' => $adoptionAnswer->user_id, 'id' => $adoptionAnswer->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <label
                                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white font-extrabold"
                                        for="dropzone-file">Upload your Contract Here.</label>
                                    <input name="contract_file"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="dropzone-file" type="file" required>
                                    </label>

                                    
                                    <div class="grid grid-cols-1 gap-2 py-2">
                                        <button type="submit"
                                            class = "p-2 w-full text-white bg-red-500 hover:bg-red-700  text-center font-bold rounded-lg">Submit</button>
                                    </div>
                                </form>
                                
                                <a  class = "w-full text-center" href="{{ route('download.contract', ['id' => $adoption->id]) }}">
                                    <button
                                        class="bg-yellow-300 hover:bg-yellow-400 text-gray-800 font-bold p-2 w-full rounded-lg inline-flex justify-center items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span>Download Contract</span>
                                    </button>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div id = "userContainer" class = "
                    @if ($stage == 2 || $stage == 3 || $stage == 6 || $stage == 7  || $stage == 9) hidden
                    @else
                    grid grid-cols-1  lg:grid-cols-2 lg:pt-12 gap-5 max-w-screen-lg
                    @endif">
                        <div class="bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                            <div
                                class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                <img class="object-cover object-center w-32 h-32"
                                    src="{{ asset('storage/' . $adoptionAnswer->user->profile_image) }}"
                                    alt='user profile'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                                {{ $adoptionAnswer->user->firstname . ' ' . $adoptionAnswer->user->name }}
                            </h1>
                            <div class = "pb-4">
                                <ul class="space-y-4  mb-4">
                                    <div>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Birthday
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ \Carbon\Carbon::parse($adoptionAnswer->user->birthday)->format('F j, Y') }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Email
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $adoptionAnswer->user->email }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <label data-modal-target="select-modal" data-modal-toggle="select-modal"
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Address
                                                    </div>
                                                    <div class="text-base font-medium ">
                                                        <p class="text-ellipsis overflow-hidden line-clamp-1">
                                                            {{ $adoptionAnswer->user->street . ', ' . $adoptionAnswer->user->barangay . ', ' . $adoptionAnswer->user->city . ', ' . $adoptionAnswer->user->province }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div id="select-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <!-- Modal header -->
                                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                    Address
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal">
                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-4 md:p-5">
                                                                <p class="text-gray-500 dark:text-gray-400 mb-4">Complete Address</p>
                                                                <ul class="space-y-4 mb-4">
                                                                    <li>
                                                                        <input type="radio" id="job-3" name="job" value="job-3" class="hidden peer">
                                                                        <label for="job-3" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                                            <div class="block">
                                                                                <div class="w-full text-lg font-semibold">Address</div>
                                                                                <div class="w-full text-gray-500 dark:text-gray-400">                                                            
                                                                                    {{ $adoptionAnswer->user->street . ', ' . $adoptionAnswer->user->barangay . ', ' . $adoptionAnswer->user->city . ', ' . $adoptionAnswer->user->province }}
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </label>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Phone
                                                        Number
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $adoptionAnswer->user->phone_number }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Gender
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $adoptionAnswer->user->gender }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Civil
                                                        Status
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $adoptionAnswer->user->civil_status }}
                                                    </div>
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
                            </div>
                        </div>
                        <div class="bg-white px-5 lg:mt-0 mt-12 shadow-md rounded-2xl text-gray-900">

                            <div
                                class="mx-auto w-32 h-32 -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                                <img class="object-cover object-center w-32 h-32"
                                    src="{{ asset('storage/images/' . $adoption->pet->dropzone_file) }}"
                                    alt='Woman looking front'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                                {{ $adoption->pet->pet_name }}
                            </h1>
                            <div class="pb-4">
                                <ul class="space-y-4 mb-4">
                                    <div>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Age
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $adoption->pet->age }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Gender
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $adoption->pet->gender }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                        Breed
                                                    </div>
                                                    <div class="w-full text-base font-medium">
                                                        {{ $adoption->pet->breed }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Weight
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $adoption->pet->weight }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Size
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $adoption->pet->size }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <label
                                                class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                <div class="block">
                                                    <div class="w-full text-gray-500 text-sm dark:text-gray-400">Color
                                                    </div>
                                                    <div class="w-full text-base font-medium capitalize">
                                                        {{ $adoption->pet->color }}
                                                    </div>
                                                </div>
                                            </label>
                                        </li>                
                                    </div>
                                </ul>
                                <button data-modal-target="pet-modal" data-modal-toggle="pet-modal"
                                    class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    type="button">
                                    More details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    id = "adoptionProgress" class = "bg-white lg:order-last order-first  h-96   overflow-y-auto rounded-2xl p-4 shadow-md 
                    @if ($stage == 0 || $stage == 1 || $stage == 4 || $stage == 5 || $stage == 8  || $stage == 10)
                        h-adminProgressHeight
                    @endif
                    @if ($stage == 2 || $stage == 3 || $stage == 6 || $stage == 7  || $stage == 9)
                    @else
                    my-12
                    @endif">
                    <h1 class = "font-bold text-xl">Adoption Progress</h1>
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
        {{-- <div
            class = "@if ($stage == 3 || $stage == 7) hidden
                    @else
                    flex items-center  py-5  justify-center @endif
                     ">
            <div class ="grid grid-cols-1 lg:grid-cols-3 lg:pt-14 gap-5 max-w-screen-lg">
                <div class="bg-white px-5 mt-10 lg:mt-0 shadow-md rounded-2xl text-gray-900">
                    <div
                        class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center w-32 h-32"
                            src="{{ asset('storage/' . $adoptionAnswer->user->profile_image) }}" alt='user profile'>
                    </div>
                    <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                        {{ $adoptionAnswer->user->firstname . ' ' . $adoptionAnswer->user->name }}
                    </h1>
                    <div class = "pb-4">
                        <ul class="space-y-4  mb-4">
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Birthday
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ \Carbon\Carbon::parse($adoptionAnswer->user->birthday)->format('F j, Y') }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Email
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $adoptionAnswer->user->email }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Address
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $adoptionAnswer->user->street . ', ' . $adoptionAnswer->user->barangay . ', ' . $adoptionAnswer->user->city . ', ' . $adoptionAnswer->user->province }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Phone Number
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $adoptionAnswer->user->phone_number }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Gender
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $adoptionAnswer->user->gender }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Civil Status
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $adoptionAnswer->user->civil_status }}
                                            </div>
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
                    </div>
                </div>
                <div class="bg-white px-5 lg:mt-0 mt-12 shadow-md rounded-2xl text-gray-900">

                    <div class="mx-auto w-32 h-32 -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                        <img class="object-cover object-center  w-32 h-32"
                            src="{{ asset('storage/images/' . $adoption->pet->dropzone_file) }}"
                            alt='Woman looking front'>
                    </div>
                    <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                        {{ $adoption->pet->pet_name }}</h1>
                    <div class = "pb-4">
                        {{-- <table class = "border-separate border-spacing-3">
                            <tr>
                                <td class = "font-bold">Age</td>
                                <td class = "capitalize">{{ $adoption->pet->age }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Gender</td>
                                <td class = "capitalize">{{ $adoption->pet->gender }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Breed</td>
                                <td class = "capitalize">{{ $adoption->pet->breed }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Weight</td>
                                <td class = "capitalize">{{ $adoption->pet->weight }} kg</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Size</td>
                                <td class = "capitalize">{{ $adoption->pet->size }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Color</td>
                                <td class = "capitalize">{{ $adoption->pet->color }}</td>
                            </tr>
                            <tr>
                                <td class = "font-bold">Vaccination</td>
                                <td class = "capitalize">{{ $adoption->pet->vaccination_status }}</td>
                            </tr>
                        </table> --}}
        {{-- <ul class="space-y-4  mb-4">
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Age
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $adoption->pet->age }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Gender
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $adoption->pet->gender }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">
                                                Breed
                                            </div>
                                            <div class="w-full text-base font-medium">
                                                {{ $adoption->pet->breed }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Weight
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $adoption->pet->weight }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Size
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $adoption->pet->size }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label
                                        class="inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Color
                                            </div>
                                            <div class="w-full text-base font-medium capitalize">
                                                {{ $adoption->pet->color }}
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </div>
                        </ul>
                        <button data-modal-target="pet-modal" data-modal-toggle="pet-modal"
                            class="block text-white w-full bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            type="button">
                            More details
                        </button>
                    </div>
                </div>
                <div class ="bg-white lg:order-last order-first h-96 overflow-y-auto  rounded-2xl p-4 shadow-md">
                    <h1 class = "font-bold text-xl mb-4">Adoption Progress</h1>
                    <a class="px-6 underline"
                        href="{{ route('export.pdf', ['userId' => $adoptionAnswer->user_id, 'applicationId' => $adoptionAnswer->id]) }}">download</a>
                    @if ($stage === 2)
                        <!-- Modal toggle -->
                       
                    @elseif ($stage === 6)
                        <!-- Modal toggle -->
                        
                    @elseif ($stage === 9)
                        <div class="flex justify-center items-center my-2">
                         
                        </div>
                    @else
                    @endif
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
                </div> --}}
        {{-- </div>   --}}
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
                        {{ $adoption->pet->pet_name . ' Details' }} </h3>
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
                                        {{ $adoption->pet->pet_name }}</div>
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
                                        {{ $adoption->pet->pet_type }}</div>
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
                                        {{ $adoption->pet->breed }}</div>
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
                                        {{ $adoption->pet->age }}</div>
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
                                        {{ $adoption->pet->color }}</div>
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
                                        {{ $adoption->pet->adoption_status }}</div>
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
                                        {{ $adoption->pet->gender }}</div>
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
                                        {{ $adoption->pet->vaccination_status }}</div>
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
                                        {{ $adoption->pet->weight }} kg</div>
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
                                        {{ $adoption->pet->size }}</div>
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
                                        {{ $adoption->pet->behaviour }}</div>
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
                                        {{ $adoption->pet->description }}</div>
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
                            src="{{ asset('storage/images/' . $adoption->pet->dropzone_file) }}" alt="pet image">
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="answer-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-6xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $adoptionAnswer->user->firstname . ' ' . $adoptionAnswer->user->name . ' Answers' }}
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
                            <x-text-input id="first_question" class="block mt-1 w-full" type="text"
                                name="first_question" :value="old('first_question', $answers['first_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="second_question" :value="__('What prompted you to adopt from us?')" />
                            <x-text-input id="second_question" class="block mt-1 w-full" type="text"
                                name="second_question" :value="old('second_question', $answers['second_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="third_question" :value="__('Have you adopted from us before?')" />
                            <x-text-input id="third_question" class="block mt-1 w-full" type="text"
                                name="third_question" :value="old('third_question', $answers['third_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fourth_question" :value="__('For whom are you adopting a pet?')" />
                            <x-text-input id="fourth_question" class="block mt-1 w-full" type="text"
                                name="fourth_question" :value="old('fourth_question', $answers['fourth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fifth_question" :value="__('Are there children below 18 in your house?')" />
                            <x-text-input id="fifth_question" class="block mt-1 w-full" type="text"
                                name="fifth_question" :value="old('fifth_question', $answers['fifth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="sixth_question" :value="__('Do you have other pets?')" />
                            <x-text-input id="sixth_question" class="block mt-1 w-full" type="text"
                                name="sixth_question" :value="old('sixth_question', $answers['sixth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="sevent_question" :value="__('Have you had pets in the past?')" />
                            <x-text-input id="sevent_question" class="block mt-1 w-full" type="text"
                                name="sevent_question" :value="old('sevent_question', $answers['sevent_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="eight_question" :value="__('Who else do you live with?')" />
                            <x-text-input id="eight_question" class="block mt-1 w-full" type="text"
                                name="eight_question" :value="old('eight_question', $answers['eight_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="ninth_question" :value="__('Are any members of your house hold allergic to animals?')" />
                            <x-text-input id="ninth_question" class="block mt-1 w-full" type="text"
                                name="ninth_question" :value="old('ninth_question', $answers['ninth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="tenth_question" :value="__(
                                'Who will be responsible for feeding, grooming, and generally caring of your pet?',
                            )" />
                            <x-text-input id="tenth_question" class="block mt-1 w-full" type="text"
                                name="tenth_question" :value="old('tenth_question', $answers['tenth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="eleventh_question" :value="__(
                                'Who will be financially responsible for your pets needs (i.e food,vet,bills,etc)?',
                            )" />
                            <x-text-input id="eleventh_question" class="block mt-1 w-full" type="text"
                                name="eleventh_question" :value="old('eleventh_question', $answers['eleventh_question'])" />
                        </div>



                    </div>

                    <div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twelfth_question" :value="__(
                                'Who will look after your pet if you go on vacation or in case of emergency?',
                            )" />
                            <x-text-input id="twelfth_question" class="block mt-1 w-full" type="text"
                                name="twelfth_question" :value="old('twelfth_question', $answers['twelfth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="thirteenth_question" :value="__('How many hours in an average work day will your pet be left alone?')" />
                            <x-text-input id="thirteenth_question" class="block mt-1 w-full" type="text"
                                name="thirteenth_question" :value="old('thirteenth_question', $answers['thirteenth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fourteenth_question" :value="__('Does everyone in the family support your decision to adopt a pet?')" />
                            <x-text-input id="fourteenth_question" class="block mt-1 w-full" type="text"
                                name="fourteenth_question" :value="old('fourteenth_question', $answers['fourteenth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="fifteenth_question" :value="__(
                                'What steps will you take to familiarize your new pet with his/her new surrounding?',
                            )" />
                            <x-text-input id="fifteenth_question" class="block mt-1 w-full" type="text"
                                name="fifteenth_question" :value="old('fifteenth_question', $answers['fifteenth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="seventeenth_question" :value="__('What type of building do you live in?')" />
                            <x-text-input id="seventeenth_question" class="block mt-1 w-full" type="text"
                                name="seventeenth_question" :value="old('seventeenth_question', $answers['seventeenth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="eighteenth_question" :value="__('Do you rent?')" />
                            <x-text-input id="eighteenth_question" class="block mt-1 w-full" type="text"
                                name="eighteenth_question" :value="old('eighteenth_question', $answers['eighteenth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="nineteenth_question" :value="__('What happens to your pet if or when you move?')" />
                            <x-text-input id="nineteenth_question" class="block mt-1 w-full" type="text"
                                name="nineteenth_question" :value="old('nineteenth_question', $answers['nineteenth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentieth_question" :value="__('Do you have a fenced yard? ')" />
                            <x-text-input id="twentieth_question" class="block mt-1 w-full" type="text"
                                name="twentieth_question" :value="old('twentieth_question', $answers['twentieth_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentyfirst_question" :value="__('How much time will your dog spend in the yard?')" />
                            <x-text-input id="twentyfirst_question" class="block mt-1 w-full" type="text"
                                name="twentyfirst_question" :value="old('twentyfirst_question', $answers['twentyfirst_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentysecond_question" :value="__('Are you prepared to walk and potty train your dog? ')" />
                            <x-text-input id="twentysecond_question" class="block mt-1 w-full" type="text"
                                name="twentysecond_question" :value="old('twentysecond_question', $answers['twentysecond_question'])" />
                        </div>
                        <div class="mt-4" style="pointer-events: none;">
                            <x-input-label for="twentythird_question" :value="__('Are you prepared to manage chewing, marking, excessive barking, etc?')" />
                            <x-text-input id="twentythird_question" class="block mt-1 w-full" type="text"
                                name="twentythird_question" :value="old('twentythird_question', $answers['twentythird_question'])" />
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
                            View Image </x-primary-button>
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
                        src="{{ asset('storage/signatures/' . $adoptionAnswers->upload) }}" alt='user profile'>
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
                        src="{{ asset('storage/signatures/' . $adoptionAnswers->upload2) }}" alt='user profile'>
                </div>
            </div>
        </div>
    </div>

    <div id="petimage-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-7xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                    <img class="object-cover object-center mx-auto max-w-3xl h-full"
                        src="{{ asset('storage/images/' . $adoption->pet->dropzone_file) }}" alt='user profile'>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectCategory(category) {

            const existingPetsLink = document.getElementById('updatesLink');
            const archivedPetsLink = document.getElementById('userLink');

            if (category === 'updates') {
                document.getElementById('userContainer').classList.add('hidden');
                document.getElementById('announcementContainer').classList.remove('hidden');
                document.getElementById('adoptionProgress').classList.remove('my-12');
                document.getElementById('adoptionProgress').classList.remove('h-adminProgressHeight');
                document.getElementById('adoptionProgress').classList.add('h-96');

                archivedPetsLink.classList.add('text-gray-600');
                archivedPetsLink.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
                existingPetsLink.classList.add('border-b-2', 'border-red-600', 'text-red-600');


            } else if (category === 'user') {
                document.getElementById('userContainer').classList.remove('hidden');
                document.getElementById('userContainer').classList.add('grid', 'grid-cols-1',  'lg:grid-cols-2', 'lg:pt-12' ,'gap-5' ,'max-w-screen-lg');
                document.getElementById('adoptionProgress').classList.add('my-12');
                document.getElementById('adoptionProgress').classList.remove('h-96');
                document.getElementById('adoptionProgress').classList.add('h-adminProgressHeight');


                document.getElementById('announcementContainer').classList.add('hidden');
                existingPetsLink.classList.add('text-gray-600');
                existingPetsLink.classList.remove('border-b-2', 'border-red-600', 'text-red-600');
                archivedPetsLink.classList.add('border-b-2', 'border-red-600', 'text-red-600');
            }

            // You can add more functionality here based on the selected category
            console.log("Selected category: " + category);
        }
    </script>

</x-app-layout>
