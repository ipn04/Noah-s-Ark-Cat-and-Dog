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
                 
                    block hover:bg-white py-3 px-14 lg:p-3 w-full max-w-lg hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md ">Cancel
                    Application</a>
            </div>
        </div>
        <div class = "flex items-center  py-4 justify-center">
            <div
                class = "grid grid-cols-1 max-w-screen-lg px-14 lg:px-8 py-5 bg-white rounded-2xl shadow-md lg:grid-cols-5 gap-2">
                <div>
                    <div class = "flex items-center justify-center gap-2">
                        <div
                            class = "flex items-center justify-center rounded-full w-6 h-6 lg:w-16 lg:h-16 text-gray-600 bg-gray-200
                                text-gray-600 bg-gray-200 ">
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
                                    text-gray-600 bg-gray-200 ">
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
                                
                                
                                text-gray-600 bg-gray-200 ">
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
                                bg-gray-200 text-gray-600 ">
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
                                
                                text-gray-600 bg-gray-200 ">
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

        <div class="flex hidden items-center py-5 px-10 justify-center        ">
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
                                <img class="object-cover object-center w-32 h-32" src="" alt='user profile'>
                            </div>
                            <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                                czarina cuarez
                            </h1>
                            <div class = "pb-4">
                                <table class = "border-separate border-spacing-3">
                                    <tr>
                                        <td class = "font-bold">Age</td>
                                        <td>18</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Gender</td>
                                        <td class = "capitalize">female</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Phone</td>
                                        <td class = "capitalize">09566216696</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Email</td>
                                        <td>czarinakrisel@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td class = "font-bold">Civil Status</td>
                                        <td class = "capitalize">single</td>
                                    </tr>

                                    <tr>
                                        <td class = "font-bold">Address</td>
                                        <td class = "capitalize">

                                        </td>
                                    </tr>
                                </table>
                                <x-primary-button>
                                    <a href = "">View Answers</a>
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


        <div class="flex  items-center py-5 px-10 justify-center        ">
            <div class = "grid grid-cols-1 lg:grid-cols-2  gap-5 px-4 max-w-screen-2xl lg:mt-12">

                    <div class="bg-white px-5 mt-10  lg:mt-0 shadow-md rounded-2xl text-gray-900">
                        <div
                            class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                            <img class="object-cover object-center w-32 h-32" src="" alt='user profile'>
                        </div>
                        <h1 class = "text-center font-bold text-2xl py-2 capitalize">
                            czarina cuarez
                        </h1>
                        <div class = "pb-4">
                            <table class = "border-separate border-spacing-3">
                                <tr>
                                    <td class = "font-bold">Age</td>
                                    <td>18</td>
                                </tr>
                                <tr>
                                    <td class = "font-bold">Gender</td>
                                    <td class = "capitalize">female</td>
                                </tr>
                                <tr>
                                    <td class = "font-bold">Phone</td>
                                    <td class = "capitalize">09566216696</td>
                                </tr>
                                <tr>
                                    <td class = "font-bold">Email</td>
                                    <td>czarinakrisel@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class = "font-bold">Civil Status</td>
                                    <td class = "capitalize">single</td>
                                </tr>

                                <tr>
                                    <td class = "font-bold">Address</td>
                                    <td class = "capitalize">

                                    </td>
                                </tr>
                            </table>
                            <x-primary-button>
                                <a href = "">View Answers</a>
                            </x-primary-button>
                        </div>
                    </div>

                <div class = "bg-white lg:order-last order-first max-h-96 rounded-2xl p-4 shadow-md">
                    <h1 class = "font-bold text-xl">Adoption Progress</h1>

                </div>
            </div>

        </div>


    </section>
</x-app-layout>
