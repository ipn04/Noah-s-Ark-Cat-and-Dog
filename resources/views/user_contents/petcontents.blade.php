<x-app-layout>
    <x-slot name="title">Pets content Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        
        @if($pets && is_object($pets))
        <div class = "flex justify-between items-center py-4 px-10">
        <div class = "flex gap-2">
            <a href = "{{ route('user.dashboard') }}" class = "text-lg hover:font-bold hover:cursor-pointer hover:text-red-700">Home</a>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg text-red-500">{{ $pets->pet_name }}</h2>
        </div>
        <div>
            <a href = "{{ route('user.adoption', $pets->id) }}"class = "hover:bg-white p-3 hover:text-red-500 font-bold bg-red-500 text-white rounded-lg shadow-md">Adopt {{ $pets->pet_name }} </a>
        </div>
        </div>

        <div class = "grid grid-cols-1 lg:grid-cols-2 lg:gap-10 container lg:py-5 lg:px-10">
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
                        <div class="hello">
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
            
            <div class = " max-h-96 max-w-md ">
                <div class=" overflow-hidden bg-white shadow-xl rounded-3xl">
                    <img src="{{ asset('storage/images/' . $pets->dropzone_file) }}" class=" max-h-96 w-full object-cover" />
                  <div class="flex justify-center -mt-11 ">
                      <div class="rounded-2xl  w-4/5 -mt-3 w-423.355 h-24 rotate-[-0.205deg] p-21.892 flex-col items-center gap-17.513 flex-shrink-0 border-26.27 bg-[rgba(255,255,255,0.40)] shadow-[0px 5.473px 43.784px 0px rgba(0,0,0,0.05)] backdrop-blur-[27.364822387695312px]">
                        <p class = "hidden">Yumi</p>	
                      </div>	
                  </div>
                  <div class=" px-5 pb-6 pt-2">
                      <h3 class="text-sm bold font-sans">About Yumi</h3>
                      <p class="mt-2 font-sans font-light">Hello, i'm from another the other side!</p>
                  </div>
                   
            </div>

        </div>
        @else
            <p>No pet found</p>
        @endif
    </section>
</x-app-layout>
