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

    @if (session('send_volunteer_form'))
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
        <div class = "flex gap-2  py-4 px-10">

            <a href = "{{ route('user.dashboard') }}"
                class = "text-lg hover:font-bold hover:cursor-pointer hover:text-red-500">Home</a>
            <p class = "text-lg">>></p>
            <a href = ""class=" hover:text-red-500 font-bold text-lg"></a>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg text-red-500">Adoption Form</h2>
        </div>

        <div class="max-w-xl mx-auto">
            <div class="grid grid-cols-1">
                <div class = "bg-white p-10  shadow-lg rounded-2xl items-center ">
                    <form method="POST" action="{{ route('volunteer.form')}} " class="max-w-lg" enctype="multipart/form-data">
                        @csrf
                        <div id="section1" class="block">
                            <h1 class="text-xl font-bold text-left">Fill out your answers down below</h1>
                            <div class = "mt-2">
                                <x-input-label for="first_question" :value="__('Social Media (FB/IG/Twitter)')" />
                                <x-text-input id="first_question" class="block mt-1 w-full" type="text"
                                    name="first_question" :value="old('first_question')" required autocomplete="first_question" />

                            </div>
                            <div class = "mt-2">
                                <x-input-label for="second_question" :value="__('What prompted you to volunteer from us?')" />
                                <x-select id="second_question" name="second_question" :value="old('second_question')" required
                                    autocomplete="second_question">
                                    <option value="Friends">Friends</option>
                                    <option value="Website">Website</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Other">Other</option>
                                </x-select>
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="third_question" :value="__('Have you volunteered from other shelters before?')" />
                                <x-select id="third_question" name="third_question" :value="old('third_question')" required
                                    autocomplete="third_question">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            </div>
                            <div class = "mt-2 ">
                                <x-input-label for="fourth_question" :value="__('Select your weekly availability (in hours)')" />
                                <x-select id="fourth_question" name="fourth_question" :value="old('fourth_question')" required
                                    autocomplete="fourth_question">
                                    <option value="Less than 5 hours a week">Less than 5 hours a week</option>
                                </x-select>
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="fifth_question" :value="__('Select your areas of interest in volunteering:')" />
                                <x-select id="fifth_question" name="fifth_question" :value="old('fifth_question')" required
                                    autocomplete="fifth_question">
                                    <option value="Less than 5 hours a week">Less than 5 hours a week</option>

                                </x-select>
                            </div>



                            <div class = "mt-2">
                                <x-input-label for="sixth_question" :value="__('Reasons for wanting to volunteer with Noah’s Ark.')" />
                                <x-text-input id="sixth_question" class="block mt-1 w-full" type="text"
                                    name="sixth_question" :value="old('sixth_question')" required autocomplete="sixth_question" />
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="seventh_question" :value="__('Expectations and goals for volunteering.')" />
                                <x-text-input id="seventh_question" class="block mt-1 w-full" type="text"
                                    name="seventh_question" :value="old('seventh_question')" required
                                    autocomplete="seventh_question" />
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="eight_question" :value="__('Select your preferred method of communication:')" />
                                <x-select id="eight_question" name="eight_question" :value="old('eight_question')" required
                                    autocomplete="eight_question">
                                    <option value="Friends">Friends</option>
                                  
                                </x-select>
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="ninth_question" :value="__('Select your availability for meetings or events:')" />
                                <x-select id="ninth_question" name="ninth_question" :value="old('ninth_question')" required
                                    autocomplete="ninth_question">
                                    <option value="Friends">Friends</option>
                                  
                                </x-select>
                            </div>

                            <div class = "mt-3">
                                <x-primary-button type="submit">Submit</x-primary-button>
                            </div>
                        </div>                   
                    </form>
                </div>
            </div>

        </div>


    </section>



</x-app-layout>
