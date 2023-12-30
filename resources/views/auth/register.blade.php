<x-guest-layout>
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

    @if (session('account_added'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal(
                    "You successfully created an account!",
                    "Press 'OK' to exit!",
                    "success"
                )
            });
        </script>
    @endif
    <div class="w-full bg-white mb-4">
        <h1 class="text-center text-2xl font-bold">Create your Account</h1>
    </div>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="">
            <div class="items-center justify-center flex relative ">
                <img id='preview_img' class="h-60 w-60 object-cover border-4 rounded-full "
                    src="https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-541.jpg?size=338&ext=jpg&ga=GA1.1.1546980028.1703116800&semt=ais"
                    alt="Current profile photo" />

            </div>
            <div class="items-center justify-center flex mt-4 ">
                <label for="profile_image"
                    class="bg-yellow-300 flex gap-2 font-bold hover:bg-yellow-200 py-2 px-4 rounded-md hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                        <path
                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                    </svg>

                    Upload Profile Picture
                    <input id="profile_image" name="profile_image" type="file" style="visibility:hidden;"
                        onchange="loadFile(event)" class="hidden" />
                </label>
            </div>

        </div>
        <!-- Name -->
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 mt-4">
            <div>
                <x-input-label for="name" :value="__('Last Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autocomplete="name" />
                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
            </div>

            <div>
                <x-input-label for="firstname" :value="__('First Name')" />
                <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')"
                    required autocomplete="firstname" />
                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
            </div>



        </div>

        <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 mt-4">
            <div>
                <x-input-label for="gender" :value="__('Gender')" />

                <select id="gender" name="gender"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                    required autocomplete="gender">
                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                </select>

                {{-- <x-input-error :messages="$errors->get('gender')" class="mt-2" /> --}}
            </div>


            <div>
                <x-input-label for="birthday" :value="__('Birthday')" />

                <div class="relative max-w-sm mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker name="birthday" id="birthday" datepicker-autohide type="text"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select Birthday">
                </div>

                {{-- <x-input-error :messages="$errors->get('selected_date')" class="mt-2" /> --}}
            </div>




            <div>
                <x-input-label for="civil_status" :value="__('Civil Status')" />

                <select id="civil_status" name="civil_status"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                    required autocomplete="civil_status">
                    <option value="single" {{ old('civil_status') === 'single' ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('civil_status') === 'married' ? 'selected' : '' }}>Married</option>
                    <option value="divorced" {{ old('civil_status') === 'divorced' ? 'selected' : '' }}>Divorced
                    </option>
                    <option value="widowed" {{ old('civil_status') === 'widowed' ? 'selected' : '' }}>Widowed</option>
                </select>

                {{-- <x-input-error :messages="$errors->get('civil_status')" class="mt-2" /> --}}
            </div>


        </div>

        <div class="grid grid-cols-1 gap-4 mt-4">

            <div>
                <input type="hidden" id="selected_region" name="selected_region"/>
                <x-input-label for="region" :value="__('Region')" />
                <select id="region"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                    name="region" :value="old('region')" required autocomplete="region">
                </select>
                {{-- <x-input-error :messages="$errors->get('province')" class="mt-2" /> --}}
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-4">

            <div>
                <input type="hidden" id="selected_province" name="selected_province"/>
                <x-input-label for="province" :value="__('Province')" />
                <select id="province"
                    class=" mt-1 w-full  lg:w-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                    name="province" :value="old('province')" required autocomplete="province">
                </select>
                {{-- <x-input-error :messages="$errors->get('province')" class="mt-2" /> --}}
            </div>

            <div>
                <input type="hidden" id="selected_city" name="selected_city"/>
                <x-input-label for="city" :value="__('City')" />
                <select id="city"
                    class="block mt-1 w-full  lg:w-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                    name="city" :value="old('city')" required autocomplete="city"></select>
                {{-- <x-input-error :messages="$errors->get('city')" class="mt-2" /> --}}
            </div>

            <div>
                <input type="hidden" id="selected_barangay" name="selected_barangay"/>
                <x-input-label for="barangay" :value="__('Barangay')" />
                <select id="barangay"
                    class="block mt-1 w-full  lg:w-72 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                    name="barangay" :value="old('barangay')" required autocomplete="barangay"></select>
                {{-- <x-input-error :messages="$errors->get('city')" class="mt-2" /> --}}
            </div>
        </div>


        <div class="mt-4">
            <x-input-label for="street" :value="__('Street')" />
            <textarea id="street"
                class="block mt-1 w-full  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                type="text" name="street" :value="old('street')" required autocomplete="street"></textarea>

            {{-- <x-input-error :messages="$errors->get('street')" class="mt-2" /> --}}
        </div>

        <div class="mt-4">

            <div class = "relative">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path
                            d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                    </svg>
                </div>
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" class="block mt-1 w-full ps-10"
                    aria-describedby="helper-text-explanation" type="number" name="phone_number" :value="old('phone_number')"
                    required autocomplete="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="965-621-6696" />
                {{-- <x-input-error :messages="$errors->get('phone_number')" class="mt-2" /> --}}
                <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Select a phone
                    number that matches the format.</p>

            </div>
        </div>




        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2  mt-4 gap-3">
            <a class=" w-full bg-yellow-300  hover:bg-yellow-200 text-center py-2 font-bold rounded-lg"
                href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
            <x-primary-button class="">
                {{ __('Create Account') }}
            </x-primary-button>

        </div>
        <div class="flex items-center justify-center mt-4">



        </div>

    </form>
</x-guest-layout>

