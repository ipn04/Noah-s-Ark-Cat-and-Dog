<x-app-layout>
    <x-slot name="title">Adoption Form Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="flex flex-col sm:flex-row justify-between lg:items-center py-4 px-10">
            <div class="flex gap-2 mb-2 sm:mb-0">
                <a href="{{ route('user.dashboard') }}" class="text-lg hover:font-bold hover:cursor-pointer hover:text-red-700">Home</a>
                <p class="text-lg">>></p>
                <h2 class="font-bold text-lg text-yellow-500">Adoption Application Details</h2>
            </div>
            <div class = "">
                <a href="" class="hover:bg-white p-3 hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md">Cancel Application</a>
            </div>
        </div>
        

        <div class = "flex items-center  py-5  justify-center">
            <div class = "grid grid-cols-1 max-w-screen-lg px-5 bg-white rounded-lg lg:grid-cols-7 gap-4 ">
                <div>
                    Application Submitted
                </div>
                <div>
                    Application Validated
                </div>
                <div>
                    Schedule Interview
                </div>
                <div>
                    Interview
                </div>
                <div>
                    Final Decision
                </div>
                <div>
                    Schedule Pickup
                </div>
                <div>
                    Pet Adopted
                </div>
            </div>
        </div>
        <div class = "flex items-center  py-5  justify-center">

        <div class = "grid grid-cols-1  lg:grid-cols-3  gap-5 max-w-screen-lg">
            <div class = "bg-white rounded-xl">
                Czarina Cuarez
            </div>
            <div class = "bg-white rounded-xl">
                Yumi
            </div>
            <div class = "bg-white rounded-xl">
                Shelter's Notes
            </div>
        </div>
    </section>


    
</x-app-layout>
