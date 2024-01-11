
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M19.5 22.5a3 3 0 003-3v-8.174l-6.879 4.022 3.485 1.876a.75.75 0 01-.712 1.321l-5.683-3.06a1.5 1.5 0 00-1.422 0l-5.683 3.06a.75.75 0 01-.712-1.32l3.485-1.877L1.5 11.326V19.5a3 3 0 003 3h15z" />
                    <path d="M1.5 9.589v-.745a3 3 0 011.578-2.641l7.5-4.039a3 3 0 012.844 0l7.5 4.039A3 3 0 0122.5 8.844v.745l-8.426 4.926-.652-.35a3 3 0 00-2.844 0l-.652.35L1.5 9.59z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-700 text-xl font-semibold">Total Applications</p>
                <p class="text-gray-500 text-sm">Since today</p>
            </div>
            <div class="ml-auto flex items-center">
                <p class="text-4xl font-bold text-red-500">5</p>
            </div>
        </div>
        
           <!-- Column 2 -->
           <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
            <div class="mr-4 flex items-center text-red-500">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                </svg>
                
            </div>
            <div>
                <p class="text-gray-700 text-xl font-semibold">All Pets Available</p>
                <p class="text-gray-500 text-sm">Since today</p>
            </div>
            <div class="ml-auto flex items-center">
                <p class="text-4xl font-bold text-red-500">5</p>
            </div>
        </div>
     
           <!-- Column 3 -->
           <div class="flex p-6 bg-white shadow rounded-lg hover:shadow-md items-center">
            <div class="mr-4 flex items-center text-red-500">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                  <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                </svg>
                
            </div>
            <div>
                <p class="text-gray-700 text-xl font-semibold">Total Registered Applicants </p>
                <p class="text-gray-500 text-sm">Since today</p>
            </div>
            <div class="ml-auto flex items-center">
                <p class="text-4xl font-bold text-red-500">5</p>
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
                            <p class="text-base text-gray-500 font-normal">December 03, 2023</p>
                        </div>
                        <button type="button" class="text-white shadow-md text-sm lg:text-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">View All</button>
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
                    <tr>
                        <td class="p-4">
                            <div class=" text-sm  text-center">Czarina Cuarez</div>

                        </td>
                        <td class="p-2">
                            <div class=" text-sm text-center">Adoption</div>

                        </td>
                        <td class="p-4">
                           <div class="  text-xs text-center">5:00 pm</div>
                        </td>
                        <td class="p-4  text-center">
                           <button type="button" class="text-white shadow-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                 <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                 <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                               </svg>
                               
                              </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4">
                            <div class=" text-sm  text-center">Czarina Cuarez</div>

                        </td>
                        <td class="p-2">
                            <div class=" text-sm text-center">Adoption</div>

                        </td>
                        <td class="p-4">
                           <div class="  text-xs text-center">5:00 pm</div>
                        </td>
                        <td class="p-4  text-center">
                           <button type="button" class="text-white shadow-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                 <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                 <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                               </svg>
                               
                              </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4">
                            <div class=" text-sm  text-center">Czarina Cuarez</div>

                        </td>
                        <td class="p-2">
                            <div class=" text-sm text-center">Adoption</div>

                        </td>
                        <td class="p-4">
                           <div class="  text-xs text-center">5:00 pm</div>
                        </td>
                        <td class="p-4  text-center">
                           <button type="button" class="text-white shadow-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                 <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                 <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                               </svg>
                               
                              </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4">
                            <div class=" text-sm  text-center">Czarina Cuarez</div>

                        </td>
                        <td class="p-2">
                            <div class=" text-sm text-center">Adoption</div>

                        </td>
                        <td class="p-4">
                           <div class="  text-xs text-center">5:00 pm</div>
                        </td>
                        <td class="p-4  text-center">
                           <button type="button" class="text-white shadow-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                 <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                 <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                               </svg>
                               
                              </button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
         
        <div class="rounded-lg bg-white shadow-lg overflow-x-auto max-h-screen p-6 overflow-y-hidden">
            <p class="caption-top text-red-500 text-xl text-center font-bold mb-4">
                Total Adopted Pets This Month
            </p>
        
            <!-- Chart Container -->
            <canvas id="myLineChart" width="400" height="200"></canvas>
        </div>
        
        <script>
            // Sample data for the chart
            var data = {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Adopted Pets',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    data: [10, 20, 15, 25],
                }]
            };
        
            // Chart Configuration
            var config = {
                type: 'line',
                data: data,
                options: {
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Weeks'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Number of Pets'
                            }
                        }
                    }
                }
            };
        
            // Create the chart
            var myChart = new Chart(document.getElementById('myLineChart'), config);
        </script>
        

             
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
                        <th class="px-4 py-3 text-gray-500">Progress</th>
                        <th class="px-4 py-3 text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td class="p-4">
                           <div class=" text-sm  text-center">Czarina Cuarez</div>
                        </td>
                        <td class="p-4">
                           <div class=" text-sm text-center">Adoption</div>
                        </td>
                        <td class="p-4">
                           <div class="  text-sm text-center">January 23 5:00 pm</div>
                        </td>
                        <td class="p-4  text-center">
                           <div class="  text-sm text-center">Stage 1</div>

                        </td>
                        <td class="p-4  text-center">
                           <button type="button" class="text-white shadow-md bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                 <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                 <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                               </svg>
                               
                              </button>
                        </td>
                    </tr>
                    
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
   </div>

   


</x-app-layout>

  