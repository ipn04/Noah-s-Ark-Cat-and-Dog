<div class="sm:ml-64">
    <x-app-layout>
        @include('admin_top_navbar.admin_top_navbar')
        @include('sidebars.admin_sidebar')

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-4 bg-red-800">
            <div class="container mx-auto">

                <div class="grid grid-cols-1  p-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 px-8">

                    <!-- Column 1 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M19.5 22.5a3 3 0 003-3v-8.174l-6.879 4.022 3.485 1.876a.75.75 0 01-.712 1.321l-5.683-3.06a1.5 1.5 0 00-1.422 0l-5.683 3.06a.75.75 0 01-.712-1.32l3.485-1.877L1.5 11.326V19.5a3 3 0 003 3h15z" />
                                <path
                                    d="M1.5 9.589v-.745a3 3 0 011.578-2.641l7.5-4.039a3 3 0 012.844 0l7.5 4.039A3 3 0 0122.5 8.844v.745l-8.426 4.926-.652-.35a3 3 0 00-2.844 0l-.652.35L1.5 9.59z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">Total Applications</p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $totalApplication }}</p>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                            </svg>

                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">All Pets Available</p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $availpet }}</p>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
                        <div class="mr-4 flex items-center text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <div>
                            <p class="text-gray-700 text-xl font-semibold">Total Registered Applicants </p>
                            <p class="text-gray-500 text-sm">Since today</p>
                        </div>
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl font-bold text-red-500">{{ $registered }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="lg:py-8 py-5 px-10 container mx-auto">
            <div class ="grid lg:grid-cols-2 grid-cols-1 gap-3 lg:gap-10">

                <div class="rounded-lg bg-transparent shadow-lg overflow-x-hidden">
                    <table class="w-full  p-4 rounded-lg overflow-hidden">
                        <caption class="caption-top text-left bg-white text-red-500 p-4 text-xl font-bold">
                            <div class = "flex justify-between">
                                <div>
                                    Today's Shelter's Schedule
                                    <p class="text-base text-gray-500 font-normal">{{ $formattedDate }}</p>
                                </div>
                                <a href = {{(route('admin.schedule'))}}
                                    class="text-white shadow-md text-sm lg:text-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">View
                                    All</a>
                            </div>

                        </caption>
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-gray-500">Name</th>
                                <th class="px-4 py-3 text-gray-500">Category</th>

                                <th class="px-4 py-3 text-gray-500">Time</th>
                                <th class="px-4 py-3 text-gray-500">Details</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($schedules as $schedule)

                            <tr>
                                    <td class="p-4">
                                        <div class=" text-sm  text-center">{{ $schedule->firstname }}
                                            {{ $schedule->lastname }}</div>

                                    </td>
                                    <td class="p-2">

                                    @if ($schedule->type == 'Interview')
                                        @if ($schedule->application_type == 'application_form')
                                                <div class=" text-sm text-center">Adoption Interview</div>
                                            @else
                                                <div class=" text-sm text-center">Volunteer Interview</div>
                                        @endif
                                    @elseif($schedule->type == 'Pickup')
                                        <div class=" text-sm text-center">Pet Pickup</div>
                                    @else
                                        <div class=" text-sm text-center">Shelter Visit</div>
                                    @endif
                                    </td>
                                    <td class="p-4">
                                        @if ($schedule->type == 'Interview')
                                       <p class = "text-sm text-center"> {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->interview_time)->format('h:ia') }} </p>

                                    @elseif($schedule->type == 'Pickup')
                                    <p class = "text-sm text-center"> {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->pickup_time)->format('h:ia') }} </p>                                    @else
                                    <p class = "text-sm text-center"> {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->visit_time)->format(' h:ia') }} </p>                                    @endif
                                    </td>
                                    <td class="p-4  text-center">
                                            @if ($schedule->type == 'Interview')
                                                @if ($schedule->application_type == 'application_form')
                                                    <a
                                                        href="{{ route('admin.adoptionprogress', ['userId' => $schedule->user_id, 'id' => $schedule->application_id]) }}">
                                                        <button type="button"
                                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-4 h-4 ">
                                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                            </svg>
                                                        </button>
                                                    @else
                                                        <a
                                                            href="{{ route('admin.volunteer.progress',  ['userId' => $schedule->user_id, 'id' => $schedule->application_id]) }}">
                                                            <button type="button"
                                                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="w-4 h-4 ">
                                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                                </svg>
                                                            </button>
                                                        </a>
                                                @endif
                                            @elseif($schedule->type == 'Pickup')
                                                <a href="{{ route('admin.adoptionprogress',  ['userId' => $schedule->user_id, 'id' => $schedule->application_id]) }}">
                                                    <button type="button"
                                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-4 h-4 ">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            @elseif($schedule->type == 'dsds')
                                            @else
                                            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-400 hover:bg-red-600 rounded-lg shadow-md" type="button">
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
                                                           {{ $schedule->firstname }} {{ $schedule->lastname }}'s Shelter Visit
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-4 md:p-5 space-y-4 text-left">
                                                            <h1 class = "text-xl font-bold">Shelter Visit Details</h1>
                                                            {{-- <p><b>Shelter Visit Date:</b> {{ $formattedDate }}</p>
                                                            <p><b>Shelter Visit Time:</b> {{ \Carbon\Carbon::createFromFormat('H:i:s', $schedule->visit_time)->format('h:ia') }}</p>
                                                            <p><b>Concern:</b> {{ $schedule->concern }}</p> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
    
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <div class = "lg:hidden w-80 h-40 overflow-x-hidden overflow-y-hidden  rounded-lg bg-white ">
                    <canvas id="adoptedPetsChartd" class = "r" style=""></canvas>
                </div>
                <div class=" hidden lg:block rounded-lg bg-white shadow-lg  lg:max-h-72 lg:max-w-full overflow-x-hidden overflow-y-hidden">
                  
                    <canvas id="adoptedPetsChart" class = "lg:max-w-full lg:max-h-full " style=""></canvas>

                    <script>
                        // Chart Data
                        var chartData = <?php echo json_encode($chartData); ?>;
                        
                        // Get chart labels and data
                        var labels = Object.keys(chartData);
                        var data = Object.values(chartData);
                    
                        // Reverse the order of labels and data
                        labels = labels.reverse();
                        data = data.reverse();
                    
                        // Round each data value to zero decimal places
                        data = data.map(function(value) {
                            return Math.round(value);
                        });
                    
                        // Create a Chart.js chart
                        var ctx = document.getElementById('adoptedPetsChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Adopted Pets per Month',
                                    data: data,
                                    backgroundColor: 'rgba(255, 0, 0, 0.47)',
                                    borderColor: 'rgba(255, 0, 0, 0.75)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        precision: 0,  // Ensure y-axis values are displayed as whole numbers
                                        callback: function(value) {
                                            return Math.round(value);  // Round y-axis labels to whole numbers
                                        }
                                    }
                                }
                            }
                        });
                        // Create a Chart.js chart
                        var ctx = document.getElementById('adoptedPetsChartd').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Adopted Pets per Month',
                                    data: data,
                                    backgroundColor: 'rgba(255, 0, 0, 0.47)',
                                    borderColor: 'rgba(255, 0, 0, 0.75)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        precision: 0,  // Ensure y-axis values are displayed as whole numbers
                                        callback: function(value) {
                                            return Math.round(value);  // Round y-axis labels to whole numbers
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                    
                    
                    
                </div>

             


            </div>


        </div>
        <div class = "container px-10 pt-2 pb-10 mx-auto">
            <div class="rounded-lg shadow-lg overflow-x-auto">
                <table class="w-full p-4 rounded-lg overflow-hidden">
                    <caption class="caption-top bg-white text-red-500 p-4 text-xl text-left font-bold">
                        Recent Application
                    </caption>
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-gray-500">Applicant Name</th>
                            <th class="px-4 py-3 text-gray-500">Category</th>
                            <th class="px-4 py-3 text-gray-500">Date of Application</th>
                            <th class="px-4 py-3 text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($applications as $application)
                            <tr>
                                <td class="p-4">
                                    <div class=" text-sm  text-center">{{ $application->firstname }}
                                        {{ $application->lastname }}</div>
                                </td>
                                <td class="p-4">
                                    @if ($application->type == 'application_form')
                                        <div class=" text-sm text-center">Adoption</div>
                                    @else
                                        <div class=" text-sm text-center">Volunteer</div>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="text-sm text-center">{{ \Carbon\Carbon::parse($application->update)->format('F j, Y g:ia') }}</div>
                                </td>
                                <td class="p-4  text-center">

                                    {{-- comment ko muna kase nag kaka error sa'ken --}}
                                    {{-- ginawa ko na kase reference both application and user io --}}
                                   @if ($application->type == 'application_form')
                                        <a href = "{{ route('admin.adoptionprogress', ['userId' => $application->user_id, 'id' => $application->id]) }}"
                                            class="text-white shadow-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @else
                                        <a href = "{{ route('admin.volunteer.progress', ['userId' => $application->user_id, 'id' => $application->id])  }}"
                                            class="text-white shadow-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif 
                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>


    </x-app-layout>
