<x-guest-layout>
    <div class =  "bg-cover  py-10 px-10 lg:px-28" style="background-image: url('{{ asset('images/yellowbg.png') }}');">
        <div class = "animation">
            <h1 class = "text-4xl lg:text-5xl  font-bold text-white text-center">About Us</h1>
            <p class = "md:text-xl text-lg text-white text-center py-2 px-8 lg:px-40">Welcome to Noah’s Ark Dog and Cat Shelter, a compassionate haven for our four-legged friends in need. Established in 2018, Noah’s Ark is a charitable and non-governmental organization (NGO) located in Mabalacat, Pampanga, Philippines. Our mission is rooted in the belief that every animal deserves love, care, and a chance for a better life.


            </p>

            <div id="default-carousel" class="relative w-5/6 mx-auto mt-6" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/noahss.jpg') }}"  
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/noahss.jpg') }}" 
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/noahss.jpg') }}" 
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/noahss.jpg') }}" 
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/noahss.jpg') }}" 
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class =  "bg-cover d py-16 px-10 lg:px-28"
        style="background-image: url('{{ asset('images/redbackground.png') }}');">
        <div class = "animation  grid grid-cols-1 md:grid-cols-2 gap-1 lg:px-10 ">
            <div class = "flex flex-col justify-center py-4 md:py-0 ">
                <h1 class = "text-4xl lg:text-5xl  font-bold text-center py-5 md:text-left text-white">Mission</h1>
                <p class = "text-justify md:text-left text-center px-4 md:px-0 text-white text-base md:text-lg ">At Noah's Ark, our mission is to provide a safe and loving environment for stray and abandoned dogs and cats. We strive to be their voice and advocates, working towards a future where no animal is left behind. Through dedicated care, rehabilitation, and responsible rehoming, we aim to create a community where both humans and animals coexist harmoniously.


                </p>
            </div>
            <div class = "flex justify-end py-4 md:py-0  ">
                <img class = "lg:max-w-md lg:h-80 max-w-xs h-60 object-cover rounded-xl"
                    src="{{ asset('images/volunteerprogram.jpg') }}" alt="ark">
            </div>

        </div>
        <div class = "animation grid grid-cols-1 md:grid-cols-2 gap-1 lg:px-10">
            <div class = "order-2 md:order-1 py-4 md:py-0">
                <img class = "lg:max-w-md lg:h-80 max-w-xs h-60 object-cover rounded-xl "
                    src="{{ asset('images/volunteerprogram.jpg') }}" alt="ark">
            </div>
            <div class = "flex flex-col justify-center order-1 md:order-2 py-4  md:py-0">
                <h1 class = "text-4xl lg:text-5xl  font-bold text-center py-5 md:text-right text-white ">Vision</h1>
                <p class = "text-justify md:text-right md:text-lg text-center  px-4 md:px-0 text-white text-base ">
                    We envision a world where every animal is treated with kindness, respect, and compassion. Noah’s Ark is committed to promoting responsible pet ownership, raising awareness about animal welfare, and creating a society where the bond between humans and animals is strengthened, leading to a more humane and understanding world.


                </p>
            </div>
        </div>

    </div>

    <div class = "animation p-10 lg:p-20">
        <h1 class = "text-4xl lg:text-5xl  font-bold text-center text-red-600">Our Story</h1>
        <p class = "text-justify text-base md:text-lg p-4 lg:py-7 lg:px-40">Noah’s Ark began as a heartfelt response to the growing number of stray and abandoned animals in our community. Fueled by a shared passion for animal welfare, our founders came together in 2018 to create a haven where these animals could find refuge, love, and a second chance at a happy life.

            Our journey has been one of challenges and triumphs, fueled by the unwavering dedication of our team and the support of compassionate individuals like you. From humble beginnings, we have grown into a haven that not only shelters animals but also advocates for their well-being and educates the community on the importance of animal welfare.
            
            Every adoption, every rehabilitation success story, and every life we touch reinforces our commitment to making a difference in the lives of these animals. Join us in our mission to create a world where every wagging tail and purring friend is cherished and given the love they deserve.
            
            Thank you for being a part of Noah’s Ark Dog and Cat Shelter – where compassion knows no bounds, and every pawprint leaves a lasting impact.
        </p>
        <div class = " lg:px-40">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" alt="">
                    </div>
                </div>
            </div>

        </div>
</x-guest-layout>

{{-- dito about us page. Dito mo lagay content --}}
