<x-guest-layout>
    <div class =  "bg-cover" style="background-image: url('{{ asset('images/redbackground.png') }}');">
        <div class = "grid grid-cols-1 lg:grid-cols-2 ">

            <div class = "flex items-center justify-end pt-10 lg:py-20 px-5">
                <div>
                    <h2 class = "text-white text-xl lg:text-3xl">Ready to change a life?</h2>
                    <h1 class= " lg:text-9xl text-7xl">
                        <span class="text-white font-bold">Be a</span>
                        <span class="text-yellow-500 font-bold">Hero!</span>
                    </h1>


                    <p class = "text-white font-normal text-base lg:text-xl">Adopting means our little survivors will be
                        gifted new
                        homes and hopes!</p>
                    <div class = "py-8                                  ">
                        <a href="{{ route('pets') }}"
                            class="bg-white hover:bg-yellow-500 text-red-500 hover:text-white text-lg text-2xl font-bold py-2 px-6 lg:py-4 lg:px-8 rounded-full">
                            Adopt Now!
                        </a>
                    </div>
                </div>
            </div>
            <div class ="flex items-center justify-center py-5 lg:py-20 px-5">
                <img class = "" style = "max-height:30rem;" src="{{ asset('images/dogcircle.png') }}"
                    alt="dog">
            </div>
            <div>
            </div>
        </div>
    </div>

    <div>
        <div class = "grid grid-cols-1 lg:grid-cols-2 lg:py-20 py-8 px-10 lg:px-0">
            <div class = " flex justify-center items-center ">
                <div class = "">
                    <div class = "  hidden lg:block lg:absolute  lg:ml-52 lg:mt-52">
                        <img class = "lg:max-w-xs lg:h-60  max-w-xs object-cover rounded-xl"
                            src="{{ asset('images/noahsark.jpg') }}" alt="ark">
                    </div>
                    <img class = "lg:max-w-md lg:h-96 max-w-xs h-60 object-cover rounded-xl"
                        src="{{ asset('images/noahss.jpg') }}" alt="ark">
                </div>
            </div>
            <div class = "flex items-center justify-center">
                <div class = "max-w-3xl py-5 px-10 lg:py-0">
                    <h1 class = "lg:text-5xl text-3xl text-center py-2 lg:py-0 lg:text-left text-red-600 font-bold">
                        Noah's Ark Dog
                        and Cat Shelter
                    </h1>
                    <p class ="lg:text-lg text-base py-2 lg:py-0 text-center lg:text-left lg:py-2 lg:pr-20">Noah’s Ark
                        Dog and Cat
                        Shelter is a is a charitable and non-governmental organization (NGO) was
                        established in 2018 based in Mabalacat, Pampanga, Philippines.
                    </p>
                    <div class="lg:py-8 py-4 mx-auto text-center lg:text-left">
                        <a href="{{ route('pets') }}"
                            class="bg-red-500 hover:bg-yellow-500 text-white hover:text-white text-lg text-2xl font-bold py-2 px-6 lg:py-4 lg:px-8 rounded-full">
                            Read More
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class =  "bg-cover mt-20 p-16" style="background-image: url('{{ asset('images/yellowbg.png') }}');">
        <h1 class = "text-7xl font-bold text-white text-center">Our Essence</h1>
        <div class = "flex items-center justify-center  pt-10">
            <div class = "grid-cols-1 lg:grid-cols-3 grid gap-20">
                <div>
                    <img class = "lg:max-w-sm lg:h-72 max-w-xs h-60 object-cover rounded-xl"
                        src="{{ asset('images/rescue.jpg') }}" alt="ark">
                    <h1 class = "text-3xl text-center py-4 text-white font-bold">Rescue</h1>
                </div>
                <div class = "lg:max-w-sm lg:h-72  max-w-xs h-60  ">
                    <img class = "w-full h-full object-cover rounded-xl" src="{{ asset('images/rehome.jpg') }}"
                        alt="ark">
                    <h1 class = "text-3xl text-center py-4 text-white font-bold">Rehabilitate</h1>
                </div>
                <div class = "lg:max-w-sm lg:h-72 max-w-xs h-60 ">
                    <img class = "w-full h-full object-cover rounded-xl" src="{{ asset('images/rehabilitate.jpg') }}"
                        alt="ark">
                    <h1 class = "text-3xl text-center py-4 text-white font-bold">Rehome</h1>
                </div>
            </div>
        </div>
        <div class="text-center py-3">
            <p class="inline-block">
                <span class="bg-white text-yellow-500 px-2 py-1">These three words are our shelter's essence, as we
                    wholeheartedly create a haven for animals in need.</span>
            </p>
        </div>

    </div>
    <div class =  "bg-cover p-16" style="background-image: url('{{ asset('images/redbackground.png') }}');">
        <h1 class = "text-6xl text-center font-bold text-white">Embrace a Furry Friend</h1>
        <p class = "text-center text-xl text-white py-4"> Browse our adorable adoptable pets and open your heart <br> to
            a lifelong companion today.</p>


        <div class="lg:py-4  mx-auto text-center lg:text-center">
            <a href="{{ route('pets') }}"
                class="bg-white hover:bg-yellow-500 text-red-500 hover:text-white font-bold text-lg text-2xl font-bold py-2 px-6 lg:py-4 lg:px-8 rounded-full">
                View All Pets
            </a>
        </div>


        <div class="wrapper mx-auto lg:mt-8">
            <i id="left" class = "flex items-center justify-center text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                  </svg>
                  
            </i>            
            <ul class="carousel">
                @if ($pets->isNotEmpty())
                    @foreach ($pets as $pet)
                        <li class="card rounded-lg">
                            <div class="w-full object-cover"><img class ="w-full object-cover rounded-lg h-72 " src="{{ asset('storage/images/' . $pet->dropzone_file) }}"
                                    alt="img" draggable="false"></div>
                            <h2 class = "pt-2 text-center text-xl font-semibold text-red-500">{{ $pet->pet_name }}</h2>
                            <p class = "text-center text-sm font-normal text-gray-400">{{ $pet->breed }} • {{ $pet->age }}yr/s</p>

                        </li>
                        
                    @endforeach
                @else
                @endif
            </ul>
            <i id="right" class = "flex items-center justify-center text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
                  </svg>                    
            </i>
        </div>




    </div>


    <div class = "grid-cols-1 lg:grid-cols-2 grid p-6 lg:py-20 lg:px-40">
        <div>
            <h1 class = "text-4xl lg:text-5xl py-2 text-center lg:text-left text-red-600 font-bold ">Join the Volunteer
                Program
            </h1>
            <p class = " text-base lg:text-lg lg:text-left text-center lg:pe-10 py-2">Our Volunteer Program is open to
                all who are interested in our mission
                to create
                positive
                change together..</p>
            <div class="lg:py-8 py-4 mx-auto text-center lg:text-left">
                <a href="{{ route('pets') }}"
                    class="bg-red-500 hover:bg-yellow-500 text-white hover:text-white text-lg text-2xl font-bold py-2 px-6 lg:py-4 lg:px-8 rounded-full">
                    Read More
                </a>
            </div>
        </div>

        <div class = "flex justify-end">
            <img class = "lg:max-w-md lg:h-80 max-w-xs h-60 object-cover rounded-xl"
                src="{{ asset('images/volunteerprogram.jpg') }}" alt="ark">
        </div>
    </div>

    <div class = "grid-cols-1 lg:grid-cols-2 grid lg:py-20 lg:px-40">
        <div class = "flex justify-start">
            <img class = "lg:max-w-md lg:h-80 max-w-xs h-60 object-cover rounded-xl"
                src="{{ asset('images/unleash.jpg') }}" alt="ark">
        </div>
        <div class = "flex justify-center items-center ">
            <div>
                <h1 class = "text-5xl py-2  text-red-600 font-bold text-right">Unleash Support for Our Mission Online
                </h1>
                <p class = "text-right text-lg ps-28 py-2">Your donation to our pet shelter helps provide shelter,
                    food,
                    and medical care to homeless pets,
                    giving
                    them
                    a chance for a better life.</p>
                <div class="lg:py-8 py-4 mx-auto text-center lg:text-right">
                    <a href="{{ route('pets') }}"
                        class="bg-red-500 hover:bg-yellow-500 text-white hover:text-white text-lg text-2xl font-bold py-2 px-6 lg:py-4 lg:px-8 rounded-full">
                        Read More
                    </a>
                </div>
            </div>
        </div>

</x-guest-layout>
