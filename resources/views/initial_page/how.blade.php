<x-guest-layout>

    <div class =  "bg-cover py-10 px-10 lg:px-28" style="background-image: url('{{ asset('images/yellowbg.png') }}');">
      <div class = "animation">
        <h1 class = "text-5xl font-bold text-white text-center">How Can I help?</h1>
        <div class = "inline-block flex justify-center py-4">
            <p class = "text-xl text-yellow-500 bg-white text-center px-5 py-2 rounded-md ">Thank you for considering
                ways to support pet adoption!
            </p>
        </div>

        <img class=" max-w-full md:max-w-2xl mx-auto rounded-2xl" src="{{ asset('images/imgage.jpg') }}" alt="image description">
      </div>


    </div>

    <div class = "animation">
        <div class = "inline-block flex justify-center py-4">
            <p class = "text-xl text-yellow-500 bg-white text-center px-8 py-2 rounded-md ">Your contribution can make a
                significant difference in the lives of animals waiting for their forever homes. Here are two impactful
                ways you can get involved:
            </p>
        </div>
    </div>

    <div class = "bg-cover" style="background-image: url('{{ asset('images/redbackground.png') }}');">
    <div class =  "animation py-10 px-10 lg:px-28 grid-cols-1 md:grid-cols-2 grid"
        >
        
        <div class = "flex flex-col items-center justify-center">
            <h1 class = "text-5xl font-bold text-white text-center">Volunteer</h1>
            <p class = "text-lg  text-white text-center py-4 rounded-md ">
                Since our start in 2018, Noah's Ark Dog and Cat Shelter has faced challenges with manpower, but our team
                is growing, and exciting things are ahead! As our community expands, we need more volunteers to bring
                our ideas to life. With extra help, we can do so much more for our furry friends. Join us in making a
                difference! </p>
            <div class=" py-2 mx-auto text-center ">
                <a href="{{ route('pets') }}"
                    class="bg-yellow-500 hover:bg-white text-white hover:text-red-500 text-lg text-2xl font-bold py-2 px-6 lg:py-4 lg:px-8 rounded-full">
                    Apply for Volunteer
                </a>
            </div>
        </div>

        <div>
            <img class="max-w-full md:max-w-lg mx-auto my-5 md:my-0 rounded-2xl" src="{{ asset('images/volunteer1.jpg') }}" alt="image description">

        </div>
        
    </div>
    </div>

    <div class = "bg-cover"style="background-image: url('{{ asset('images/yellowbg.png') }}');">
    <div class =  " animation py-10 px-10 lg:px-28" >
        <h1 class = "text-5xl font-bold text-white text-center">Donate</h1>
        <div class = "inline-block flex justify-center py-4">
            <p class = "text-xl text-yellow-500 bg-white text-center px-5 py-2 rounded-md ">Your contribution, no matter
                how big or small, can transform a homeless pet's world. By donating today, you're not just supporting an
                organization – you're giving a voice to those who can't speak for themselves. Every peso brings us one
                step closer to providing shelter, care, and love to animals in need. Join our mission and be a hero for
                these adorable companions waiting for a forever home. Your generosity is their hope – let's create a
                brighter future together!
            </p>
        </div>
        <div class = "grid grid-cols-1 md:grid-cols-3 py-4 gap-8 md:gap-0 md:py-4">
            <div class = "flex flex-col justify-center items-center">
                <h1 class = "text-6xl text-white">4</h1>
                <p class = "text-white text-2xl">Pets Rescued</p>
            </div>
            <div class = "flex flex-col justify-center items-center">
                <h1 class = "text-6xl text-white">4</h1>
                <p class = "text-white text-2xl">Pets Adopted</p>
            </div>
            <div class = "flex flex-col justify-center items-center">
                <h1 class = "text-6xl text-white">4</h1>
                <p class = "text-white text-2xl">Monthly Expenses</p>
            </div>
        </div>
    </div>
  </div>

  <div class = "bg-cover"  style="background-image: url('{{ asset('images/redbackground.png') }}');">
    <div class =  "animation py-10 px-10 lg:px-28">

        <h1 class = "text-4xl py-5 font-bold text-white text-center">Official Donation Platforms</h1>
        <table class="bg-white table md:hidden rounded-lg mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                <tr >
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/bdo.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Ma. Leah D. Ibuna</div>
                            <div class="text-lg font-normal text-gray-500">00773022485</div>
                        </div>  
                    </th>
                    </td>
                </tr>
                <tr>
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/BPI-logo.jpg') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Patricia Joy Pablo</div>
                            <div class="font-normal text-lg text-gray-500">2429367673</div>
                        </div>  
                    </th>
                    </td>
                </tr>
                <tr >
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/gcash.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Ma. Leah D. Ibuna</div>
                            <div class="text-lg font-normal text-gray-500">09338240324</div>
                        </div>  
                    </th>
                    </td>
                </tr>
                <tr>
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/metrobank.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Leah Santos</div>
                            <div class="font-normal text-lg text-gray-500">4257425907928</div>
                        </div>  
                    </th>
                    </td>
                </tr>
                <tr >
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/gcash.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Reynald Farala</div>
                            <div class="text-lg font-normal text-gray-500">09338240359</div>
                        </div>  
                    </th>
                    </td>
                </tr>
                <tr>
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/paypal.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Paypal</div>
                            <div class="font-normal text-lg text-gray-500">jenn.results@yahoo.com</div>
                        </div>  
                    </th>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="bg-white hidden md:table rounded-lg mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
           
            <tbody>
                <tr >
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/bdo.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Ma. Leah D. Ibuna</div>
                            <div class="text-lg font-normal text-gray-500">00773022485</div>
                        </div>  
                    </th>
                    </td>
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/BPI-logo.jpg') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Patricia Joy Pablo</div>
                            <div class="font-normal text-lg text-gray-500">2429367673</div>
                        </div>  
                    </th>
                    </td>
                </tr>
                <tr >
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/gcash.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Ma. Leah D. Ibuna</div>
                            <div class="text-lg font-normal text-gray-500">09338240324</div>
                        </div>  
                    </th>
                    </td>
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/metrobank.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Leah Santos</div>
                            <div class="font-normal text-lg text-gray-500">4257425907928</div>
                        </div>  
                    </th>
                    </td>
                </tr>
                <tr >
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/gcash.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Reynald Farala</div>
                            <div class="text-lg font-normal text-gray-500">09338240359</div>
                        </div>  
                    </th>
                    </td>
                    <td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-12 h-12 rounded-full" src="{{ asset('images/paypal.png') }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-xl font-semibold">Paypal</div>
                            <div class="font-normal text-lg text-gray-500">jenn.results@yahoo.com</div>
                        </div>  
                    </th>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
  </div>

    <div class = " animation py-10 px-10 lg:px-28 bg-white">
        <h1 class = "text-4xl py-5 font-bold text-red-500 text-center">Shelter's Wishlists</h1>
        <div class = "grid grid-cols-1 gap-5 md:grid-cols-2 ">
            <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-red-100 dark:bg-gray-800 text-red-600 dark:text-white">
                <h2 id="accordion-color-heading-1">
                  <button type="button" class="flex items-center justify-between w-full p-5 md:text-xl text-lg font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-red-200 dark:focus:ring-red-800 dark:border-gray-700 dark:text-gray-400 hover:bg-red-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
                    <span>Food and Treats</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li>
                        Dry Dog Food
                      </li>
                      <li>
                        Canned Cat Food
                      </li>
                      <li>
                        Grain-Free Dog Treats
                      </li>
                      <li>
                        Grain-Free Dog Treats
                      </li>
                  </ul>
                  </div>
                </div>
                <h2 id="accordion-color-heading-2">
                  <button type="button" class="flex items-center md:text-xl text-lg justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-red-200 dark:focus:ring-red-800 dark:border-gray-700 dark:text-gray-400 hover:bg-red-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-2" aria-expanded="false" aria-controls="accordion-color-body-2">
                    <span>Comfort and Bedding</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li>
                        Soft Blankets
                      </li>
                      <li>
                        Warm Pet Beds
                      </li>
                      <li>
                        Plush Cat Beds
                      </li>
                      <li>
                        Heated Pet Pads
                      </li>
                  </ul>
                  </div>
                </div>
                <h2 id="accordion-color-heading-3">
                  <button type="button" class="flex items-center md:text-xl text-lg justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-red-200 dark:focus:ring-red-800 dark:border-gray-700 dark:text-gray-400 hover:bg-red-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-3" aria-expanded="false" aria-controls="accordion-color-body-3">
                    <span>Cleaning Supplies</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
                  <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li>
                        Soft Blankets
                      </li>
                      <li>
                        Warm Pet Beds
                      </li>
                      <li>
                        Plush Cat Beds
                      </li>
                      <li>
                        Heated Pet Pads
                      </li>
                  </ul>
                  </div>
                </div>
              </div>
  
              <div id="accordion-color2" data-accordion="collapse" data-active-classes="bg-red-100 dark:bg-gray-800 text-red-600 dark:text-white">
                <h2 id="accordion-color-heading-4">
                  <button type="button" class="flex items-center md:text-xl text-lg justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-red-200 dark:focus:ring-red-800 dark:border-gray-700 dark:text-gray-400 hover:bg-red-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-4" aria-expanded="true" aria-controls="accordion-color-body-4">
                    <span>Toys and Enrichment</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-color-body-4" class="hidden" aria-labelledby="accordion-color-heading-1">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li>
                        Pet-Safe Disinfectant                      
                      </li>
                      <li>
                        Bleach
                      </li>
                      <li>
                        Paper Towels
                      </li>
                      <li>
                        Trash Bags
                      </li>
                  </ul>
                  </div>
                </div>
                <h2 id="accordion-color-heading-5">
                  <button type="button" class="flex items-center md:text-xl text-lg justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-red-200 dark:focus:ring-red-800 dark:border-gray-700 dark:text-gray-400 hover:bg-red-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-5" aria-expanded="false" aria-controls="accordion-color-body-5">
                    <span>Medical and Grooming Supplies</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-color-body-5" class="hidden" aria-labelledby="accordion-color-heading-2">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li>
                        Pet Shampoo                      
                      </li>
                      <li>
                        Flea and Tick Prevention
                      </li>
                      <li>
                        Nail Clippers
                      </li>
                      <li>
                        Ear Cleaner
                      </li>
                  </ul>
                  </div>
                </div>
                <h2 id="accordion-color-heading-6">
                  <button type="button" class="flex items-center md:text-xl text-lg justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-red-200 dark:focus:ring-red-800 dark:border-gray-700 dark:text-gray-400 hover:bg-red-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-6" aria-expanded="false" aria-controls="accordion-color-body-6">
                    <span>Identification and transport</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-color-body-6" class="hidden" aria-labelledby="accordion-color-heading-3">
                  <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                      <li>
                        Collars and Leashes                      
                      </li>
                      <li>
                        Pet Tags
                      </li>
                      <li>
                        Microchip Scanners
                      </li>
                      <li>
                        Pet Carriers
                      </li>
                  </ul>
                  </div>
                </div>
              </div>
              
        </div>


    </div>

</x-guest-layout>

{{-- dito how page. Dito mo lagay content --}}
