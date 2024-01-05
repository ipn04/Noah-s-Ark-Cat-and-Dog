<x-app-layout>
    <x-slot name="title">Adoption Form Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')
    @if ($errors->any())
        <script>
            var errorMessages = [];
            @foreach ($errors->all() as $error)
                errorMessages.push("{{ $error }}");
            @endforeach
    
            // Check if there are error messages before showing the alert
            if (errorMessages.length > 0) {
                swal({
                    title: "Error!",
                    text: errorMessages.join('\n'), // Join error messages with line breaks
                    type: "error",
                    confirmButtonText: "Cool"
                });
            }
        </script>
    @endif

    @if(session('adoption_answer'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal(
                    "Success!", 
                    "Press 'OK' to exit!", 
                    "success"
                )
            });
        </script>
    @endif
    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        @if($pets && is_object($pets))

        <div class = "flex gap-2  py-4 px-10">

            <a href = "{{ route('user.dashboard') }}" class = "text-lg hover:font-bold hover:cursor-pointer hover:text-red-500">Home</a>
            <p class = "text-lg">>></p>
            <a href = "{{ route('user.pet', $pets->id) }}"class=" hover:text-red-500 font-bold text-lg">{{$pets->pet_name}}</a>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg text-red-500">Adoption Form</h2>
        </div>

        <div class="flex justify-center items-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 px-4 py-4">
            <div class = "bg-white p-10 max-w-2xl shadow-lg rounded-2xl items-center justify-center flex">
                <form method="POST" action="{{ route('send.form', ['petId' => $petId]) }}" class="max-w-lg">
                @csrf
                <div id="section1" class="block">
                    <h1 class="text-xl font-bold text-left">Fill out your answers down below</h1>
                    <p class = "font-bold">Part 1 </p>  
                    <div class = "mt-2">
                        <x-input-label for="first_question" :value="__('Social Media (FB/IG/Twitter)')" />
                        <x-text-input id="first_question" class="block mt-1 w-full" type="text" name="first_question" :value="old('first_question')" required autocomplete="first_question" />
                        
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="second_question" :value="__('What prompted you to adopt from us?')" />
                        <x-select id="second_question" name="second_question" :value="old('second_question')" required autocomplete="second_question">
                            <option value="Friends">Friends</option>
                            <option value="Website">Website</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Other">Other</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="third_question" :value="__('Have you adopted from us before?')" />
                        <x-select id="third_question" name="third_question" :value="old('third_question')" required autocomplete="third_question">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    </div>
                    <div class = "mt-2 ">
                        <x-input-label for="fourth_question" :value="__('For whom are you adopting a pet?')" />
                        <x-select id="fourth_question" name="fourth_question" :value="old('fourth_question')" required autocomplete="fourth_question">
                            <option value="For Myself">For Myself</option>
                            <option value="For Someone Else">For Someone Else</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="fifth_question" :value="__('Are there children below 18 in your house?')" />
                        <x-select id="fifth_question" name="fifth_question" :value="old('fifth_question')" required autocomplete="fifth_question">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    </div>
                      
                    <div class = "mt-2">
                        <x-input-label for="sixth_question" :value="__('Do you have other pets?')" />
                        <x-select id="sixth_question" name="sixth_question" :value="old('sixth_question')" required autocomplete="sixth_question">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="sevent_question" :value="__('Have you had pets in the past?')" />
                        <x-select id="sevent_question" name="sevent_question" :value="old('sevent_question')" required autocomplete="sevent_question">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                       
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="eight_question" :value="__('Who else do you live with?')" />
                        <x-select id="eight_question" name="eight_question" :value="old('eight_question')" required autocomplete="eight_question">
                            <option value="Spouse">Spouse</option>
                            <option value="Parents">Parents</option>
                            <option value="Roommates">Roommates</option>
                            <option value="Others">Others</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        
                        <x-input-label for="ninth_question" :value="__('Are any members of your house hold allergic to animals?')" />
                        <x-select id="ninth_question" name="ninth_question" :value="old('ninth_question')" required autocomplete="ninth_question">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="tenth_question" :value="__('Who will be responsible for feeding, grooming, and generally caring of your pet?')" />
                        <x-text-input id="tenth_question" class="block mt-1 w-full" type="text" name="tenth_question" :value="old('tenth_question')" required autocomplete="tenth_question" />
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="eleventh_question" :value="__('Who will be financially responsible for your pets needs (i.e food,vet,bills,etc)?')" />
                        <x-text-input id="eleventh_question" class="block mt-1 w-full" type="text" name="eleventh_question" :value="old('eleventh_question')" required autocomplete="eleventh_question" />
                    </div>
                
                    <div class = "mt-3">
                    <x-primary-button type="button" onclick="showSection(1, 2)">Next</x-primary-button>
                    </div>
                </div>


                <div id="section2" class="hidden">
                    <h1 class="text-xl font-bold text-left">Fill out your answers down below</h1>
                    <p class = "font-bold">Part 2</p>
                   
                    <div class = "mt-2">
                        <x-input-label for="twelfth_question" :value="__('Who will look after your pet if you go on vacation or in case of emergency?
                        ')" />
                        <x-text-input id="twelfth_question" class="block mt-1 w-full" type="text" name="twelfth_question" :value="old('twelfth_question')" required autocomplete="twelfth_question" />
                    </div>

                    <div class = "mt-2">
                        <x-input-label for="thirteenth_question" :value="__('How many hours in an average work day will your pet be left alone?
                        ')" />
                        <x-text-input id="thirteenth_question" class="block mt-1 w-full" type="text" name="thirteenth_question" :value="old('thirteenth_question')" required autocomplete="thirteenth_question" />

                    </div>
                    <div class = "mt-2">
                        <x-input-label for="fourteenth_question" :value="__('Does everyone in the family support your decision to adopt a pet?
                        ')" />
                        <x-text-input id="fourteenth_question" class="block mt-1 w-full" type="text" name="fourteenth_question" :value="old('fourteenth_question')" required autocomplete="fourteenth_question" />
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="fifteenth_question" :value="__('What steps will you take to familiarize your new pet with his/her new surrounding?
                        ')" />
                        <x-text-input id="fifteenth_question" class="block mt-1 w-full" type="text" name="fifteenth_question" :value="old('fifteenth_question')" required autocomplete="fifteenth_question" />
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="seventeenth_question" :value="__('What type of building do you live in?
                        ')" />
                        <x-select id="seventeenth_question" name="seventeenth_question" :value="old('seventeenth_question')" required autocomplete="seventeenth_question">
                            <option value="House">House</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Condo">Condo</option>
                            <option value="House">House</option>
                            <option value="Other">Other</option>
                        </x-select>
                        
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="eighteenth_question" :value="__('Do you rent?
                        ')" />
                        <x-select id="eighteenth_question" name="eighteenth_question" :value="old('eighteenth_question')" required autocomplete="eighteenth_question">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                     
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="nineteenth_question" :value="__('What happens to your pet if or when you move?
                        ')" />
                        <x-text-input id="nineteenth_question" class="block mt-1 w-full" type="text" name="nineteenth_question" :value="old('nineteenth_question')" required autocomplete="nineteenth_question" />
                       
                    </div>
                        @if($pets->pet_type === 'Dog')
                            <div class = "mt-2">
                                
                                <x-input-label for="twentieth_question" :value="__('Do you have a fenced yard?                            ')" />
                                <x-select id="twentieth_question" name="twentieth_question" :value="old('twentieth_question')" required autocomplete="twentieth_question">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="twentyfirst_question" :value="__('How much time will your dog spend in the yard?
                                ')" />
                                <x-text-input id="twentyfirst_question" class="block mt-1 w-full" type="text" name="twentyfirst_question" :value="old('twentyfirst_question')" required autocomplete="twentyfirst_question" />
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="twentysecond_question" :value="__('Are you prepared to walk and potty train your dog?                            ')" />
                                <x-select id="twentysecond_question" name="twentysecond_question" :value="old('twentysecond_question')" required autocomplete="twentysecond_question">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="twentythird_question" :value="__('Are you prepared to manage chewing, marking, excessive barking, etc?
                                ')" />
                                <x-select id="twentythird_question" name="twentythird_question" :value="old('twentythird_question')" required autocomplete="twentythird_question">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            </div>
                        @elseif($pets->pet_type === 'Cat')
                            <div class = "mt-2">
                                    
                                <x-input-label for="twentieth_question" :value="__('Can your cat get out of the house?                        ')" />
                                <x-select id="twentieth_question" name="twentieth_question" :value="old('twentieth_question')" required autocomplete="twentieth_question ">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="twentyfirst_question" :value="__('Where will the litter box be located?
                                ')" />
                                <x-text-input id="twentyfirst_question" class="block mt-1 w-full" type="text" name="twentyfirst_question" :value="old('twentyfirst_question')" required autocomplete="twentyfirst_question" />
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="twentysecond_question" :value="__('Are you prepared for the unpleasant odor of cat feces?                            ')" />
                                <x-select id="twentysecond_question" name="twentysecond_question" :value="old('twentysecond_question')" required autocomplete="twentysecond_question">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="twentythird_question" :value="__('Are you prepared to manage furniture sratching, climbing, and shedding?
                                ')" />
                                <x-select id="twentythird_question" name="twentythird_question" :value="old('twentythird_question')" required autocomplete="twentythird_question">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            </div>
                        @endif
                    <div class = "flex gap-2 mt-3">
                        <x-primary-button type="button" onclick="showSection(2, 1)" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Previous</x-primary-button>
                        <x-primary-button type="button" onclick="showSection(2, 3)" class="bg-blue-500 text-white px-4 py-2 rounded">Next</x-primary-button>
                    </div>
                   
            
                </div>
                <div id="section3" class="hidden">
                    <h1 class="text-xl font-bold text-left">Fill out your answers down below</h1>
                    <p class = "font-bold">Part 3</p>
                        <div class="px-4 py-3">
                            <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input id="upload" name="upload" type="file" class="hidden" accept="image/*" />
                                <label for="upload" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload your Valid ID</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                        </div>

                        <div class="px-4 py-3">
                            <div id="image-preview2" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input id="upload2" name="upload2" type="file" class="hidden" accept="image/*" />
                                <label for="upload2" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload your Signature</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                <span id="filename2" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                        </div>
                        
                    <div class = "flex gap-2 mt-3">
                        <x-primary-button type="button" onclick="showSection(3, 2)" >Previous</x-primary-button>
                        <x-primary-button type="submit" >Submit</x-primary-button>
                    </div>
                </div>
                {{-- <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> --}}
            </form>
            </div>

            <div>
                <div class="grid grid-cols-1 p-5   ">
                    <div class="flex justify-center">
                        <div class="overflow-hidden bg-white w-full lg:w-10/12 rounded-t-2xl">
                            <img src="{{ asset('storage/images/' . $pets->dropzone_file) }}" class=" w-full object-cover"  style ="max-height: 30em"/>
                            <div class="flex justify-center -mt-11">
                                <div class="rounded-2xl p-5 w-4/5 -mt-3 w-423.355 h-24 rotate-[-0.205deg] p-21.892 flex-col items-center gap-17.513 flex-shrink-0 border-26.27 bg-[rgba(255,255,255,0.40)] shadow-[0px 5.473px 43.784px 0px rgba(0,0,0,0.05)] backdrop-blur-[27.364822387695312px]">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-base lg:text-xl font-bold">{{ $pets->pet_name }}</p>	
                                            <p class="text-base">{{ $pets->breed }} · {{ $pets->age }}yr</p>
                                        </div>
                                        <div class = "bg-green-700 p-3 rounded-lg text-white">
                                            @if($pets->gender === 'Male')
                                                <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"></path> </svg>
                                            @elseif($pets->gender === 'Female')
                                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512">
                                                    <path fill ="currentColor" d="M80 176a112 112 0 1 1 224 0A112 112 0 1 1 80 176zM224 349.1c81.9-15 144-86.8 144-173.1C368 78.8 289.2 0 192 0S16 78.8 16 176c0 86.3 62.1 158.1 144 173.1V384H128c-17.7 0-32 14.3-32 32s14.3 32 32 32h32v32c0 17.7 14.3 32 32 32s32-14.3 32-32V448h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H224V349.1z"/>
                                                </svg>
                                            @endif
                                        </div>	
                                    </div>
                                </div>
                            </div>
                            <div class="px-12  pt-2">
                                <div class = "flex gap-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                    </svg>
                                    <h3 class="text-xl font-extrabold ">About {{ $pets->pet_name }}</h3>
                                </div>
                                <div class = "max-w-40">
                                    <p class="text-lg font-light py-3" style="overflow-wrap: break-word;">{{ $pets->description }}</p>
                                </div>
                                <div class = "grid grid-cols-1 lg:grid-cols-3 gap-4">
                                    <div class = "bg-green-100 p-4  rounded-2xl">
                                        <h1>Weight</h1>
                                        <h1 class = " text-xl font-extrabold">{{ $pets->weight }}kg</h1>
                                    </div>
                                    <div class = "bg-green-100 p-4  rounded-2xl">
                                        <h1 class =>Size</h1>
                                        <h1 class = " text-xl font-extrabold">{{ $pets->size }}</h1>
                                    </div>
                                    <div class = "bg-green-100 p-4 rounded-2xl">
                                        <h1>Color</h1>
                                        <h1 class = " text-xl font-extrabold">{{ $pets->color }}</h1>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
    
                    <div class="flex  justify-center">
                        <div class = "bg-white overflow-hidden w-full pt-3 lg:w-10/12 rounded-b-2xl ">
                            <div class = "flex  lg:justify-start justify-center gap-2 lg:pl-12  p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold ">Adoption Status</h3>
                            </div>
                            <div class ="flex lg:pl-12   lg:justify-start justify-center">
                            <div class = "bg-green-100 py-2 px-10 rounded-2xl text-center" >
                                <h1 class = "text-xl font-bold text-green-700">{{$pets->adoption_status}}</h1>
                            </div>
                            </div>
                            <div class = "flex lg:pl-12 lg:justify-start justify-center gap-2 p-5">
                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold ">Vaccination Status</h3>
                            </div>
                            <div class ="flex lg:pl-12  lg:justify-start justify-center">
                            <div class = "bg-green-100 py-2 px-10 rounded-2xl text-center">
                                <h1 class = "text-xl font-bold text-green-700">{{$pets->vaccination_status}}</h1>
                            </div>
                            </div>
                            <div class = "flex lg:pl-12  lg:justify-start justify-center gap-2 p-5">
                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold ">{{ $pets->pet_name }}'s Behavior</h3>
                            </div>
                            <div class ="flex lg:pl-12 pb-5  lg:justify-start justify-center">
                            <div class = "py-2 px-10  rounded-2xl border-2 border-green-400 text-center">
                                <h1 class = "text-xl font-bold ">{{$pets->behaviour}}</h1>
                            </div>
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
