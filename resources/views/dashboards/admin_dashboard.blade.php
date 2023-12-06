
<div class="sm:ml-64">
   <x-app-layout>
      @include('sidebars.admin_sidebar')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4 bg-red-800">
      <div class="container mx-auto">
         <!-- 2 columns on small screens, 3 columns on medium screens, 4 columns on large screens -->
         <div class="grid grid-cols-1  p-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 px-8">
           <!-- Column 1 -->
           <div class="p-4 bg-white shadow rounded-lg shadow-sm hover">
            <p class = "text-center text-lg">Total Applications</p>
            <p class = "text-center text-4xl font-bold ">5</p>

          </div>
     
           <!-- Column 2 -->
           <div class="p-4 bg-white shadow rounded-lg">
             <p class = "text-center text-lg">Animals Available</p>
             <p class = "text-center text-4xl font-bold ">5</p>

           </div>
     
           <!-- Column 3 -->
           <div class="p-5 bg-white shadow rounded-lg">
            <p class = "text-center text-lg">Registered Users</p>
            <p class = "text-center text-4xl font-bold ">5</p>

           </div>
     
           <!-- Add more columns as needed -->
     
         </div>
       </div>
   </div>

   <div class="lg:py-8 py-5 px-5 container mx-auto">
      <div class ="grid lg:grid-cols-2 grid-cols-1 gap-3 lg:gap-20">

         <div class="rounded-lg shadow-lg overflow-x-auto">
            <table class="w-full p-4 rounded-lg overflow-hidden">
                <caption class="caption-top bg-white text-red-500 p-4 text-xl font-bold">
                    Today's Shelter's Schedule
                    <p class="text-base  text-gray-500 font-normal">December 03, 2023</p>
                </caption>
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-gray-500">Category</th>
                        <th class="px-4 py-3 text-gray-500">Name</th>
                        <th class="px-4 py-3 text-gray-500"">Time</th>
                        <th class="px-4 py-3 text-gray-500"">Details</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td class="p-4">
                           <div class=" text-sm text-center">Adoption</div>
                        </td>
                        <td class="p-4">
                           <div class=" text-sm  text-center">Czarina Cuarez</div>
                        </td>
                        <td class="p-4">
                           <div class="  text-sm text-center">5:00 pm</div>
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
         
        <div class="rounded-lg bg-white shadow-lg overflow-x-auto">
             <p class="caption-top  text-red-500 p-4 text-xl text-center font-bold">
                 Total Adopted Pets This Month
             </p>      
         </div>

             
      </div>

      
      </div>
      <div class = "container px-5 pt-2 pb-10 mx-auto">
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

  