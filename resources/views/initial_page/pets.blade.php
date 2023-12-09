<x-guest-layout>
    <div class="bg-red-700 ">
        <div class="mx-auto flex justify-between py-4 max-w-screen-xl px-6">
            
            <div class="flex gap-4 w-full">
                
                <label for="underline_select" class="sr-only">Underline select</label>
                <select id="underline_select" class="block py-2.5 px-0 w-1/6 text-sm text-green-500 bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-green-400 dark:border-green-700 focus:outline-none focus:ring-0 focus:border-green-200 peer">
                    <option selected>All</option>
                    <option value="Cat">Cat</option>
                    <option value="Dog">Dog</option>
                </select>

                <label for="availability" class="sr-only">Underline select</label>
                <select id="availability" class="block py-2.5 px-0 w-1/6 text-sm text-green-500 bg-transparent border-0 border-b-2 border-green-200 appearance-none dark:text-green-400 dark:border-green-700 focus:outline-none focus:ring-0 focus:border-green-200 peer">
                    <option selected>All</option>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>
    
            <form role="search" class="flex items-center w-1/3">
                <label for="pet-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                        </svg>
                    </div>
                    <input type="text" id="pet-search" placeholder="Search pet" name="search" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
            </form>
        </div> 
    </div>
    <div class="max-w-screen-xl ml-auto mr-auto">
        <div class="px-6 py-4">
            <h1 class="font-bold text-2xl">List of Pets</h1>
            <hr class="h-0.5 mt-2 bg-gray-400 border-1">
        </div>
      
        @include('initial_page.pet_lists')
    </div>
</x-guest-layout>
<script>
$(document).ready(function() {
    $('#underline_select').on('change', function() {
        let selectedPet = $(this).val();

        $.ajax({
            type: 'GET',
            url: '/filter-pets', // Define your API endpoint here
            data: {
                category: selectedPet
            },
            success: function(response) {
                $('.pet-lists').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


</script>
{{-- dito pet page. Ako na bahala dito --}}