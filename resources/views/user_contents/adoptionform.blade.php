<x-app-layout>
    <x-slot name="title">Adoption Form Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        @if($pets && is_object($pets))

        <div class = "flex gap-2  py-4 px-10">

            <a href = "{{ route('user.dashboard') }}" class = "text-lg hover:font-bold hover:cursor-pointer hover:text-red-500">Home</a>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg">{{$pets->pet_name}}</h2>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg text-red-500">Adoption Form</h2>
        </div>
        <div class="grid grid-cols-2">
            <form method="POST" action="{{ route('send.form') }}" class="max-w-lg px-10">
                @csrf
                <div id="section1" class="block">
                    <div>
                        <label for="social_media" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Social Media (FB/IG/Twitter)</label>
                        <input type="text" id="social_media" name="social_media" placeholder="Social Media" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="prompted" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What promted you to adopt from us?</label>
                        <select id="prompted" name="prompted" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Friends</option>
                            <option value="Website">Website</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="prefer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What are you looking to adopt?</label>
                        <select id="prefer" name="prefer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="adopted_before" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Have you adopted from us before?</label>
                        <select id="adopted_before" name="adopted_before" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="lists" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Do you know the name of the animal you want to adopt? List up to 3:</label>
                        <input type="text" id="lists" name="lists" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="ideal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Describe your ideal pet, including it's sex, age, appearance, temperature, etc</label>
                        <input type="text" id="ideal" name="ideal" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="for_whom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">For whom are you adopting a pet?</label>
                        <select id="for_whom" name="for_whom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>For Myself</option>
                            <option value="For Someone Else">For Someone Else</option>
                        </select>
                    </div>
                    <div>
                        <label for="children" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are there children below 18 in your house?</label>
                        <select id="children" name="children" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="other_pets" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Do you have other pets?</label>
                        <select id="other_pets" name="other_pets" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="pets_past" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Have you had pets in the past?</label>
                        <select id="pets_past" name="pets_past" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <button type="button" onclick="showSection(1, 2)" class="bg-blue-500 text-white px-4 py-2 rounded">Next</button>

                </div>
                <div id="section2" class="hidden">
                    <div>
                        <label for="live_with" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Who else do you live with?</label>
                        <select id="live_with" name="live_with" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Spouse</option>
                            <option value="Parents">Parents</option>
                            <option value="Roommates">Roommates</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div>
                        <label for="allergic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are any members of your house hold allergic to animals?</label>
                        <select id="allergic" name="allergic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="responsible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Who will be responsible for feeding, grooming, and generally caring for your pet?</label>
                        <input type="text" id="responsible" name="responsible" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="financially" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Who will be financially responsible for your pet's needs (i.e, food, vet bills, etc)?</label>
                        <input type="text" id="financially" name="financially" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="look_after" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Who will look after your pet if you go on vacation or in case of emergency?</label>
                        <input type="text" id="look_after" name="look_after" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="many_hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How many hours in an average work day will your pet be left alone?</label>
                        <input type="text" id="many_hours" name="many_hours" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="support_decision" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Does everyone in the family support your decision to adopt a pet?</label>
                        <input type="text" id="support_decision" name="support_decision" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="steps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What steps will you take to familiarize your new pet with his/her new surrounding?</label>
                        <input type="text" id="steps" name="steps" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="home" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What type of building do you live in?</label>
                        <select id="home" name="home" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>House</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Condo">Condo</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="rent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Do you rent?</label>
                        <select id="rent" name="rent" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <button type="button" onclick="showSection(2, 1)" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Previous</button>
                    <button type="button" onclick="showSection(2, 3)" class="bg-blue-500 text-white px-4 py-2 rounded">Next</button>
            
                </div>
                <div id="section3" class="hidden">
                    <div>
                        <label for="happens" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What happens to your pet if or when you move?</label>
                        <input type="text" id="happens" name="happens" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @if($pets->pet_type === 'Cat')
                        <p>wala pa sa cat</p>
                    @elseif($pets->pet_type === 'Dog')
                        <div>
                            <label for="fenced_yard" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Do you have fenced yard?</label>
                            <select id="fenced_yard" name="fenced_yard" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div>
                            <label for="spend" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How much time will your dog spend in the yard?</label>
                            <input type="text" id="spend" name="spend" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="train" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you prepared to walk and potty train your dog?</label>
                            <select id="train" name="train" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div>
                            <label for="chewing" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Are you prepared to manage chewing, marking, excessive barking, etc?</label>
                            <select id="chewing" name="chewing" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    @endif
                    <div>
                        <button type="button" onclick="showSection(3, 2)" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Previous</button>
                        <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </div>
                {{-- <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> --}}
            </form>
            <div>
                <div class = "lg:gap-10 container lg:py-5 lg:px-10">
                    <div class = "bg-white shadow-md rounded-lg">
                        <div>
                            <img class="object-cover h-96 w-full" src="{{ asset('storage/images/' . $pets->dropzone_file) }}" alt="Pet Image">
                        </div>
                        <div class="mx-auto w-3/4">
                            <div class="bg-neutral-300 px-8 py-4">
                                <div class="flex justify-between">
                                    <h1 class="text-gray-900 font-black text-xl">{{$pets->pet_name}}</h1>
                                    <div class="bg-green-400 p-1">
                                        @if($pets->gender === 'Male')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8M3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5"/>
                                            </svg>
                                        @elseif($pets->gender === 'Female')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex">
                                    <h5 class="text-gray-500 font-extrabold">{{$pets->breed}}</h5> ⚬ <h5 class="text-gray-500 font-extrabold">{{$pets->age}}</h5>
                                </div>
                            </div>
                            <div class="py-8">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg"  width="22" height="22" viewBox="0 0 256 256">    
                                        <path d="M240,108a28,28,0,1,1-28-28A28.1,28.1,0,0,1,240,108ZM72,108a28,28,0,1,0-28,28A28.1,28.1,0,0,0,72,108ZM92,88A28,28,0,1,0,64,60,28.1,28.1,0,0,0,92,88Zm72,0a28,28,0,1,0-28-28A28.1,28.1,0,0,0,164,88Zm23.1,60.8a35.3,35.3,0,0,1-16.9-21.1,43.9,43.9,0,0,0-84.4,0A35.5,35.5,0,0,1,69,148.8,40,40,0,0,0,88,224a40.5,40.5,0,0,0,15.5-3.1,64.2,64.2,0,0,1,48.9-.1A39.6,39.6,0,0,0,168,224a40,40,0,0,0,19.1-75.2Z"/>
                                    </svg> 
                                    <h1 class="font-extrabold pl-2">About {{$pets->pet_name}}</h1>
                                </div>
                                <div class="grid grid-cols-3 gap-4 py-2">
                                    <div class="bg-pink-300 p-4">
                                        <h3>Weight</h3>
                                        <h3 class="font-extrabold">{{$pets->weight}}</h3>
                                    </div>
                                    <div class="bg-pink-300 p-4">
                                        <h3>Size</h3>
                                        <h3 class="font-extrabold">{{$pets->size}}</h3>
                                    </div>
                                    <div class="bg-pink-300 p-4">
                                        <h3>Color</h3>
                                        <h3 class="font-extrabold">{{$pets->color}}</h3>
                                    </div>
                                </div>
                                <div>
                                    <p>{{$pets->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
       
        </div>
        @else
            <p>No pet found</p>
        @endif
    </section>


    
</x-app-layout>
