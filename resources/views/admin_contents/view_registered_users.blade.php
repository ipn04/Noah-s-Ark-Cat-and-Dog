<x-app-layout>
    <x-slot name="title">Registerd User Page</x-slot>
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
            @if (session('update'))
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
        </div>
        
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">Registered Users</h1>
                </div>   
            </div>
            <!-- WEB RESPONSIVENESS TABLE -->
            <div class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                <div class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between p-4 ">
                    <div class="w-full md:w-1/2">
                        <form role="search" class="flex items-center ">
                            <label for="registered-user" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="registered-user" placeholder="Search user" name="search" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            
                        </form>
                        
                    </div>                        
                </div>
                
                <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Applicant Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gender
                            </th>
                            <th scope="col" class="">
                                Civil Status
                            </th>
                            <th scope="col" class="">
                                Phone Number
                            </th>
                            <th scope="col" class="">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($showUsers)
                            @foreach ($showUsers as $user)
                                <tr id="registeredUser" data-name="{{ $user->firstname . ' ' . $user->name }}" class="registeredUser bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row" class=" hidden lg:flex items-center px-5 py-4 font-medium text-slate-600 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 ob rounded-full" src="{{ asset('storage/' . $user->profile_image ) }}" alt="user profile">
                                        <div class="ps-2 flex flex-col">
                                            <div class="text-lg lg:text-base">{{$user->firstname . ' ' . $user->name}}</div>
                                            <div class="text-sm  lg:hidden">
                                                    <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                        <p class="text-center"></p>
                                                    </div>
                                            </div>
                                        </div>
                                    </td>
                                                                                    
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base capitalize text-gray-500 ">{{ $user->gender }}</div>
                                    </td>
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base capitalize text-gray-500 ">{{ $user->civil_status }}</div>
                                    </td>
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">{{ $user->phone_number }}</div>
                                    </td>
                                    <td class="items-center gap-1  hidden lg:table-cell">
                                        <button data-modal-target="select-modal-{{ $user->id }}" data-modal-toggle="select-modal-{{ $user->id }}" class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </button>     
                                    </td>
                                    <td>
                                        <div x-data="{ dropdownOpen: false }">
                                            <button @click="dropdownOpen = !dropdownOpen" class="flex lg:hidden items-center gap-1 focus:outline-none">
                                                Actions
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                    <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        
                                            <!-- Dropdown content -->
                                            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute bg-white border rounded shadow-md mt-2 max-w-24" x-cloak>
                                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-400 hover:bg-gray-100">
                                                    <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                                            </svg>                                                                                                                    
                                                        <span class="ml-1">Show</span>
                                                    </div>
                                                </a>                                                   
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Main modal -->
                                <div id="select-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-6xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    User Details
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal-{{ $user->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="grid grid-cols-2 p-4 md:p-5">
                                                <ul class="space-y-4 mb-4">
                                                    <li>
                                                        <input type="radio" id="job-1" name="job" value="job-1" class="hidden peer" required>
                                                        <label for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">                           
                                                            <div class="block">
                                                                <div class="w-full text-lg font-semibold">{{ $user->firstname . ' ' . $user->name }}</div>
                                                                <div class="w-full text-gray-500 dark:text-gray-400">Full Name</div>
                                                            </div>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="job-2" name="job" value="job-2" class="hidden peer">
                                                        <label for="job-2" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                            <div class="block">
                                                                <div class="w-full text-lg font-semibold">{{ $user->email }}</div>
                                                                <div class="w-full text-gray-500 dark:text-gray-400">Email</div>
                                                            </div>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="job-3" name="job" value="job-3" class="hidden peer">
                                                        <label for="job-3" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                            <div class="block">
                                                                <div class="w-full text-lg font-semibold capitalize">{{ $user->gender }}</div>
                                                                <div class="w-full text-gray-500 dark:text-gray-400">Gender</div>
                                                            </div>
                                                        </label>
                                                    </li>
                                                </ul>
                                                <ul class="space-y-4 mb-4">
                                                    <li>
                                                        <input type="radio" id="job-1" name="job" value="job-1" class="hidden peer" required>
                                                        <label for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">                           
                                                            <div class="block">
                                                                <div class="w-full text-lg font-semibold">{{  \Carbon\Carbon::parse($user->birthday)->format('M d, Y') }}
                                                                </div>
                                                                <div class="w-full text-gray-500 dark:text-gray-400">Birthday</div>
                                                            </div>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="job-2" name="job" value="job-2" class="hidden peer">
                                                        <label for="job-2" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                            <div class="block">
                                                                <div class="w-full text-lg font-semibold capitalize">{{ $user->civil_status }}</div>
                                                                <div class="w-full text-gray-500 dark:text-gray-400 ">Civil Status</div>
                                                            </div>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="job-3" name="job" value="job-3" class="hidden peer">
                                                        <label for="job-3" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                                            <div class="block">
                                                                <div class="w-full text-lg font-semibold capitalize">{{ $user->street . ' ' . $user->barangay . ' ' . $user->city . ' ' . $user->province . ' ' . $user->region }}</div>
                                                                <div class="w-full text-gray-500 dark:text-gray-400 ">Address</div>
                                                            </div>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                        @else

                        @endif
                    </tbody>
                </table> 
                <div class="mt-5 mx-5">
                    {{ $showUsers->links() }}
                </div>
                <div class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-20 md:space-y-0 justify-between p-4 lg:px-4 lg:py-6">
                    <div class="w-full md:w-1/2">    
                    </div>        
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </div>                  
                </div>
            </div>
        </div>
        
    </section>
</x-app-layout>
