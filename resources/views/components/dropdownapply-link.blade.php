<!-- x-notifdropdown-link.blade.php -->

@props(['href', 'imageSource', 'name'])

<a href="{{ $href }}"
    class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
    <div class="flex items-center">

        <div class = "flex items-center relative">
            <div
                class="absolute bottom-0 right-0 bg-amber-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs pointer-events-none">
                <div class="flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                        <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                      </svg>
                      
                </div>

            </div>


            <!-- Profile image -->
            <img src="{{ $imageSource ?? asset('default_image_url.jpg') }}" alt="Profile Image"
                class="w-10 h-10 rounded-full mr-2">
        </div>


        <div class="flex-1 ps-1">
            <span class = "font-bold">{{ $name }}</span>
            {{ $slot }}
        </div>
    </div>
</a>
