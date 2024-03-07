<x-app-layout>
    <x-slot name="title">Pets content Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 px-5 py-5 antialiased">

        @if ($pets && is_object($pets))
            <div class="flex justify-between items-center py-4 px-10">
                <div class="flex gap-2">
                    <a href="{{ route('user.dashboard') }}"
                        class="text-lg hover:font-bold hover:cursor-pointer hover:text-red-700">Home</a>
                        <div class = "flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                          </svg>
                        </div>

                    <h2 class="font-bold text-lg text-yellow-500">{{ $pets->pet_name }}</h2>
                </div>
            </div>

            {{-- <div class="grid grid-cols-1 p-5 lg:grid-cols-2 lg:gap-10 ">
                <div class="flex justify-flex lg:justify-end">
                    <div class="overflow-hidden bg-white w-full lg:w-10/12 rounded-t-2xl lg:rounded-3xl ">
                        <img src="{{ asset('storage/images/' . $pets->dropzone_file) }}" class=" w-full object-cover"  style ="max-height: 30em"/>
                        <div class="flex justify-center -mt-11">
                            <div class="rounded-2xl p-5 w-4/5 -mt-3 w-423.355 h-24 rotate-[-0.205deg] p-21.892 flex-col items-center gap-17.513 flex-shrink-0 border-26.27 bg-[rgba(255,255,255,0.40)] shadow-[0px 5.473px 43.784px 0px rgba(0,0,0,0.05)] backdrop-blur-[27.364822387695312px]">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-base lg:text-xl font-bold">{{ $pets->pet_name }}</p>	
                                        <p class="text-base">{{ $pets->breed }} · {{ $pets->age }}yr</p>
                                    </div>
                                    <div class = "bg-green-700 p-3 rounded-lg text-white">
                                        @if ($pets->gender === 'Male')
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
                        <div class="px-12 lg:pb-6 pt-2">
                            <div class = "flex gap-2 py-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold ">About {{ $pets->pet_name }}</h3>
                            </div>
                            <div class = "max-w-40">
                                <p class="text-lg font-light py-3" style="overflow-wrap: break-word;">{{ $pets->description }}</p>
                            </div>
                            <div class = "grid grid-cols-1 md:grid-cols-3 gap-4">
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

                <div class="flex  lg:max-h-96 justify-center lg:justify-start">
                    <div class = "bg-white overflow-hidden   w-full lg:w-8/12 rounded-b-2xl lg:rounded-3xl p-5">
                        <div class = "flex  lg:justify-start justify-center gap-2 p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                            </svg>
                            <h3 class="text-xl font-extrabold ">Adoption Status</h3>
                        </div>
                        <div class ="flex lg:justify-start justify-center">
                        <div class = "bg-green-100 py-2 px-10 rounded-2xl text-center" >
                            <h1 class = "text-xl font-bold text-green-700">{{$pets->adoption_status}}</h1>
                        </div>
                        </div>
                        <div class = "flex  lg:justify-start justify-center gap-2 p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                            </svg>
                            <h3 class="text-xl font-extrabold ">Vaccination Status</h3>
                        </div>
                        <div class ="flex lg:justify-start justify-center">
                        <div class = "bg-green-100 py-2 px-10 rounded-2xl text-center">
                            <h1 class = "text-xl font-bold text-green-700">{{$pets->vaccination_status}}</h1>
                        </div>
                        </div>
                        <div class = "flex lg:justify-start justify-center gap-2 p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                            </svg>
                            <h3 class="text-xl font-extrabold ">{{ $pets->pet_name }}'s Behavior</h3>
                        </div>
                        <div class ="flex lg:justify-start justify-center">
                        <div class = "py-2 px-10 rounded-2xl border-2 border-green-400 text-center">
                            <h1 class = "text-xl font-bold ">{{$pets->behaviour}}</h1>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
             --}}
            <div class="flex h-petContentsheight">
                <div class="grid grid-cols-1 lg:grid-cols-2 max-w-screen-xl mx-auto my-auto">
                    <div class="bg-white rounded-l-2xl pb-8">
                        <img data-modal-target="default-modal" data-modal-toggle="default-modal"
                        src="{{ asset('storage/images/' . $pets->dropzone_file) }}"
                        class="w-full h-screen object-cover cursor-pointer rounded-tl-2xl" style ="max-height: 30em" />

                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen max-h-full">
                        <div class="relative w-full max-h-full">
                            <!-- Modal content -->
                            <div class = "w-full max-w-2xl  mx-auto my-auto px-2 ">
                                <div class = "flex justify-end py-2">
                                    <button type="button"
                                        class="text-gray-400 bg-black hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <img src="{{ asset('storage/images/' . $pets->dropzone_file) }}"
                                    class="w-full h-full object-fill cursor-pointer" style ="max-height: 50em" />
                            </div>
                        </div>
                    </div>
                        <div class="flex justify-center -mt-11">
                            <div
                                class="rounded-2xl p-5 w-4/5 -mt-3 w-423.355 h-24 rotate-[-0.205deg] p-21.892 flex-col items-center gap-17.513 flex-shrink-0 border-26.27 bg-[rgba(255,255,255,0.40)] shadow-[0px 5.473px 43.784px 0px rgba(0,0,0,0.05)] backdrop-blur-[27.364822387695312px]">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-base lg:text-xl font-bold">{{ $pets->pet_name }}</p>
                                        <p class="text-base">{{ $pets->breed }} · {{ $pets->age }}yr</p>
                                    </div>
                                    <div class = "bg-green-700 p-3 rounded-lg text-white">
                                        @if ($pets->gender === 'Male')
                                            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="30"
                                                height="30" fill="currentColor" class="bi bi-gender-male"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z">
                                                </path>
                                            </svg>
                                        @elseif($pets->gender === 'Female')
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30"
                                                viewBox="0 0 384 512">
                                                <path fill ="currentColor"
                                                    d="M80 176a112 112 0 1 1 224 0A112 112 0 1 1 80 176zM224 349.1c81.9-15 144-86.8 144-173.1C368 78.8 289.2 0 192 0S16 78.8 16 176c0 86.3 62.1 158.1 144 173.1V384H128c-17.7 0-32 14.3-32 32s14.3 32 32 32h32v32c0 17.7 14.3 32 32 32s32-14.3 32-32V448h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H224V349.1z" />
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-r-2xl py-8">
                        <div class="mr-4 pb-4 flex justify-end">
                            @if (
                                ($user->adoption && (int) $user->adoption->stage === 9) ||
                                    ($user->adoption && (int) $user->adoption->stage === 10) ||
                                    ($user->adoption && (int) $user->adoption->stage === 11))
                                <!-- User is allowed to adopt again, show the link -->
                                <a href="{{ route('user.adoption', ['petId' => $pets->id]) }}"
                                    class="hover:bg-white p-3 hover:text-red-500 font-bold bg-yellow-500 text-white rounded-lg shadow-md">Adopt
                                    {{ $pets->pet_name }}</a>
                            @else
                                @if ($hasSubmittedForm)
                                    <div class="w-48">
                                        <a href="{{ route('user.applications') }}" class="w-48">
                                            <p
                                                class="text-center hover:bg-white p-3 hover:text-red-500 font-bold bg-yellow-500 text-white rounded-lg shadow-md ">
                                                Pending Application </p>
                                        </a>
                                    </div>
                                @else
                                    <div class="w-32">
                                        <a href="{{ route('user.adoption', ['petId' => $pets->id]) }}"
                                            class="hover:bg-white p-3 hover:text-red-500 font-bold bg-yellow-500 text-white rounded-lg shadow-md">Adopt
                                            {{ $pets->pet_name }}</a>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class = "max-w-40 border-2 mx-4 px-4 mt-4 rounded-2xl h-40 mb-4">
                            <p class="text-lg py-3" style="overflow-wrap: break-word;"><span
                                    class="font-bold">Description: </span>{{ $pets->description }}</p>
                        </div>
                        <div class = "max-w-40 py-4 px-4">
                            <div class = "grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class = "bg-green-100 p-4  rounded-2xl">
                                    <h1>Weight</h1>
                                    <h1 class = " text-md font-extrabold">{{ $pets->weight }}kg</h1>
                                </div>
                                <div class = "bg-green-100 p-4  rounded-2xl">
                                    <h1 class=>Size</h1>
                                    <h1 class = " text-md font-extrabold">{{ $pets->size }}</h1>
                                </div>
                                <div class = "bg-green-100 p-4 rounded-2xl">
                                    <h1>Color</h1>
                                    <h1 class = " text-md font-extrabold">{{ $pets->color }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class = "max-w-40 px-4 py-4">
                            <div class = "grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class = "bg-green-100 p-4  rounded-2xl">
                                    <h1>Adoption Status</h1>
                                    <h1 class = " text-md font-extrabold">{{ $pets->adoption_status }}</h1>
                                </div>
                                <div class = "bg-green-100 p-4  rounded-2xl">
                                    <h1 class=>Vaccination Status</h1>
                                    <h1 class = " text-md font-extrabold">{{ $pets->vaccination_status }}</h1>
                                </div>
                                <div class = "bg-green-100 p-4 rounded-2xl">
                                    <h1>Behaviour</h1>
                                    <h1 class = " text-md font-extrabold">{{ $pets->behaviour }}</h1>
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