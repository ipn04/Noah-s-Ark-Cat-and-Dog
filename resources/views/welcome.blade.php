<x-guest-layout>
    <div class =  "bg-cover" style="background-image: url('{{ asset('images/redbackground.png') }}');">
        <div class = "grid grid-cols-1 lg:grid-cols-2 ">

            <div class = "flex items-center justify-end py-20 px-5">
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
            <div>
            </div>
        </div>
    </div>

    <div>
        <div class = "grid grid-cols-1 lg:grid-cols-2">

            <div>
            </div>
            <div>
                <h1>Noah's Ark Dog and Cat Shelter</h1>
                <p>Noah’s Ark Dog and Cat Shelter is a is a charitable and non-governmental organization (NGO) was
                    established in 2018 based in Mabalacat, Pampanga, Philippines.
                </p>
                <button>Read More</button>
            </div>
        </div>
    </div>

    <div>
        <h1>Our Essence</h1>
        <div class = "grid-cols-1 grid-cols-3 grid">
            <div>
                <h1>Rescue</h1>
            </div>
            <div>
                <h1>Rehabilitate</h1>
            </div>
            <div>
                <h1>Rehome</h1>
            </div>
        </div>
    </div>
    <div>
        <h1>Embrace a Furry Friend</h1>
        <p> Browse our adorable adoptable pets and open your heart to a lifelong companion today.</p>
        <button>View More Pets</button>
        <div>
        </div>
    </div>

    <div>
        <h1>Join the Volunteer Program</h1>
        <p> Our Volunteer Program is open to all who are interested in our mission to create positive change together.
        </p>
        <a href="">Join Now</a>
    </div>

    <div>
        <h1>Unleash Support for Our Mission Online</h1>
        <p>Your donation to our pet shelter helps provide shelter, food, and medical care to homeless pets, giving them
            a chance for a better life.</p>
        <a href="">Support Now</a>
    </div>
</x-guest-layout>
