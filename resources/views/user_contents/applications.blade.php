<x-app-layout>
    <x-slot name="title">Applications Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">My Applications</h1>
                </div>   
            </div>
              
            <!-- WEB RESPONSIVENESS TABLE -->
            <div class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                

                <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        
                        <li class="me-2 relative">
                            <a href="#" class="inline-block p-4 text-red-600 border-b-2 border-red-600 rounded-t-lg active dark:text-red-500 dark:border-red-500 flex items-center justify-between">
                                <span class = "mr-2">All</span>
                                <p class="bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-6 h-6 p-4 text-center text-xs">200</p>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Pending</a>
                        </li>
                        <li class="me-2">
                            <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Approved</a>
                        </li>
                        <li class="me-2">
                            <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Rejected</a>
                        </li>
                        
                        
                    </ul>
                </div>

                <div class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between p-4 ">
                    <div class="w-full md:w-1/2">
                        <form role="search" class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" placeholder="Search application" name="search" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
                    </div>
                  
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-500 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-1.5 -ml-1 " viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter options
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button> 
                    </div>                  
                </div>
                
                <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date of Application
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Application Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Progress
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                         <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">                                         
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">December 05, 2023</div>
                                    </td>
                                    <td class="px-6 py-4   lg:table-cell">
                                        <div class="text-base text-gray-500 ">Adoption</div>
                                    </td>
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">Stage 4</div>
                                    </td>
                                    <td class="px-6 py-4   lg:table-cell">
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Rejected</p>
                                        </div>
                                       
                                    </td>
                                    <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                        <button type="button" data-drawer-target="drawer-read-product-advanced" onclick="" data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced" class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </button>
                                
                                    </td>
                                    
                                    
                                    
 
                                </tr>
                                <!--
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td colspan="5" class="px-6 py-4 text-center">
                                    No data found.
                                </td>
                            </tr>
                        -->
                    </tbody>
                </table> 
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
