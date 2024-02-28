<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    @include('sidebars.user_sidebar')
    @include('admin_top_navbar.user_top_navbar')
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

    @if (session('profile_updated'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                swal(
                    "Successfully updated!",
                    "Press 'OK' to exit!",
                    "success"
                )
            });
        </script>
    @endif
    <div class="sm:ml-64">
        <div class="py-4 bg-red-800">
            <div class="container h-28">

            </div>
        </div>
    </div>

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class = "grid lg:grid-cols-2 grid-cols-1 lg:px-16 gap-5">
            <div>
                <div class="p-4 my-3 lg:-mt-10  sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-2xl">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Profile Picture') }}
                        </h2>

                        <p class="mt-1 mb-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile picture") }}
                        </p>
                        <form method="POST" action="{{ route('delete.account') }}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class=" gap-3">
                                <div class="items-center justify-center flex relative ">
                                    <img id='preview_img' class="h-40 w-40 object-cover border-4 rounded-full "
                                        src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                                        alt="Current profile photo" />

                                </div>
                                <div class="items-center justify-center flex mt-4 ">
                                    <label for="profile_image"
                                        class="bg-yellow-300 flex gap-2 font-bold hover:bg-yellow-200 py-2 px-4 rounded-md hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path
                                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>

                                        Upload New Profile Picture
                                        <input id="profile_image" name="profile_image" type="file"
                                            style="visibility:hidden;" onchange="loadFile(event)" class="hidden" />
                                    </label>
                                </div>
                            </div>

                            <div class=" mt-4 gap-3">

                                <x-primary-button class="">
                                    {{ __('Save New Profile Picture') }}
                                </x-primary-button>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-2xl">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Profile Information') }}
                        </h2>

                        <p class="mt-1 mb-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class=" gap-3">


                                <div class="mt-4">
                                    <div>
                                        <x-input-label for="name" :value="__('Last Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                                            name="name" :value="old('name', $user->name)" autocomplete="name" />
                                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                    </div>
                                </div>

                                <div class="mt-4">

                                    <div>
                                        <x-input-label for="firstname" :value="__('First Name')" />
                                        <x-text-input id="firstname" class="block mt-1 w-full" type="text"
                                            name="firstname" :value="old('firstname', $user->firstname)" autocomplete="firstname" />
                                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div>
                                        <x-input-label for="gender" :value="__('Gender')" />

                                        <select id="gender" name="gender"
                                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                                            autocomplete="gender">
                                            <option value="male"
                                                {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="other"
                                                {{ old('gender', $user->gender) === 'other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>

                                        {{-- <x-input-error :messages="$errors->get('gender')" class="mt-2" /> --}}
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div>
                                        <x-input-label for="civil_status" :value="__('Civil Status')" />

                                        <select id="civil_status" name="civil_status"
                                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                                            autocomplete="civil_status">
                                            <option value="single"
                                                {{ old('civil_status') === 'single' ? 'selected' : '' }}>
                                                Single
                                            </option>
                                            <option value="married"
                                                {{ old('civil_status') === 'married' ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="divorced"
                                                {{ old('civil_status') === 'divorced' ? 'selected' : '' }}>
                                                Divorced
                                            </option>
                                            <option value="widowed"
                                                {{ old('civil_status') === 'widowed' ? 'selected' : '' }}>
                                                Widowed</option>
                                        </select>

                                        {{-- <x-input-error :messages="$errors->get('civil_status')" class="mt-2" /> --}}
                                    </div>
                                </div>


                                <div class="mt-4">


                                </div>
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email', $user->email)" autocomplete="username" />
                                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                                </div>
                                <x-primary-button class="my-3" type="submit">
                                    {{ __('Update Profile') }}
                                </x-primary-button>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="p-4 my-3 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-2xl">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Password Information') }}
                        </h2>

                        <p class="mt-1 mb-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ 'Kindly change your password here.' }}

                        </p>

                        <form method="POST" action="{{ route('delete.account') }}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class=" gap-3">
                                <div>
                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />

                                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" autocomplete="new-password" />

                                        {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password" name="password_confirmation"
                                            autocomplete="new-password" />

                                        {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
                                    </div>

                                    {{-- <x-input-error :messages="$errors->get('selected_date')" class="mt-2" /> --}}
                                </div>
                            </div>

                            <div class=" mt-4 gap-3">

                                <x-primary-button class="">
                                    {{ __('Update Your Password') }}
                                </x-primary-button>

                            </div>

                        </form>
                    </div>
                </div>
                <div class="p-4 my-3 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Birthday') }}
                        </h2>

                        <p class="mt-1 mb-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Your current birthday is') }}
                            {{ \Carbon\Carbon::parse($user->birthday)->format('F d, Y') }}
                            {{ '. Kindly change your birthday here.' }}
                        </p>
                        <form method="POST" action="{{ route('delete.account') }}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class=" gap-3">
                                <div>

                                    <div class="relative max-w-full mt-4">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker name="birthday" id="birthday" datepicker-autohide
                                            type="text"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="{{ __('MM-DD-YYYY') }}"
                                            value="{{ optional(\DateTime::createFromFormat('Y-n-d', $user->birthday))->format('m-d-Y') ?? 'no data' }}">
                                    </div>

                                    {{-- <x-input-error :messages="$errors->get('selected_date')" class="mt-2" /> --}}
                                </div>
                            </div>

                            <div class=" mt-4 gap-3">

                                <x-primary-button class="">
                                    {{ __('Update Your Birthhday') }}
                                </x-primary-button>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="p-4 my-5 py-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-2xl">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Current Location') }}
                        </h2>

                        <p class="mt-1 mb-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Your current location is ' . $user->street . ', ' . $user->barangay . ', ' . $user->city . ', ' . $user->province . ', ' . $user->region . '. Kindly change your location here.') }}
                        </p>
                        
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="grid grid-cols-1 gap-4 mt-4">

                                <div>
                                    <x-input-label for="region" :value="__('Region')" />
                                    <select id="region"
                                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                                        name="region" :value="old('region')" autocomplete="region">
                                    </select>
                                    {{-- <x-input-error :messages="$errors->get('province')" class="mt-2" /> --}}
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 mt-4">

                                <div>
                                    <x-input-label for="province" :value="__('Province')" />
                                    <select id="province"
                                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                                        name="province" :value="old('province')" autocomplete="province">
                                    </select>
                                    {{-- <x-input-error :messages="$errors->get('province')" class="mt-2" /> --}}
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 mt-4">

                                <div>
                                    <x-input-label for="city" :value="__('City')" />
                                    <select id="city"
                                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                                        name="city" :value="old('city')" autocomplete="city"></select>
                                    {{-- <x-input-error :messages="$errors->get('city')" class="mt-2" /> --}}
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 mt-4">

                                <div>
                                    <x-input-label for="barangay" :value="__('Barangay')" />
                                    <select id="barangay"
                                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                                        name="barangay" :value="old('barangay')" autocomplete="barangay"></select>
                                    {{-- <x-input-error :messages="$errors->get('city')" class="mt-2" /> --}}
                                </div>
                            </div>


                            <div class="mt-4">
                                <x-input-label for="street" :value="__('Street')" />
                                <x-text-area id="street"
                                    class="block mt-1 w-full  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm"
                                    type="text" name="street" :value="old('firstname', $user->street)"
                                    autocomplete="street"></x-text-area>

                                {{-- <x-input-error :messages="$errors->get('street')" class="mt-2" /> --}}
                            </div>

                            <div class=" my-3">

                                <x-primary-button class="" type="submit">
                                    {{ __('Change Location') }}
                                </x-primary-button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-2xl">
                    <div class="max-w-xl">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Delete Account') }}
                        </h2>

                        <p class="mt-1 mb-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                        </p>
                        <form method="POST" action="{{ route('delete.account') }}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class=" gap-3">

                                <x-primary-button class="" type="submit">
                                    {{ __('Delete Account') }}
                                </x-primary-button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class = "flex justify-center">
                    <div class="bg-white px-5 mt-10 lg:-mt-10 w-4/5  shadow-md rounded-2xl text-gray-900">

                        <div
                            class="mx-auto w-32 h-32  -mt-14 lg:-mt-16 border-4 border-white rounded-full overflow-hidden">
                            <img class="h-32 w-32 object-cover rounded-full "
                                src='{{ asset('storage/' . Auth::user()->profile_image) }}'
                                alt='Woman looking front'>
                        </div>
                        <h1 class = "text-center font-bold text-2xl">
                            {{ Auth::user()->firstname . ' ' . Auth::user()->name }}</h1>
                        <div class = "pb-4">
                            <ul class="space-y-4  mb-4">
                                <div class = "grid-cols-2 grid gap-2  ">
                                    <li>
                                        <label
                                            class=" mt-4 inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Birthday
                                                </div>
                                                <div class="w-full text-base font-nedium">
                                                    {{ \Carbon\Carbon::createFromDate(2003, 2, 17)->format('M d, Y') }}
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label
                                            class=" mt-4 inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Gender
                                                </div>
                                                <div class="w-full capitalize text-base font-medium">
                                                    {{ $user->gender }}</div>
                                            </div>
                                        </label>
                                    </li>
                                </div>
                                <div class = "grid-cols-2 grid gap-2  ">

                                    <li>
                                        <label
                                            class=" my-0.5  inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Phone
                                                </div>
                                                <div class="w-full text-base font-medium">{{ $user->phone_number }}
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label
                                            class=" my-0.5  inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                            <div class="block">
                                                <div class="w-full text-gray-500 text-sm dark:text-gray-400">Civil
                                                    Status</div>
                                                <div class="w-full text-base capitalize font-medium">{{ $user->civil_status }}
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </div>
                                <li>
                                    <label
                                        class=" my-0.5  inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Email</div>
                                            <div class="w-full text-base font-medium">{{ $user->email }}</div>
                                        </div>
                                    </label>
                                </li>

                                <li>
                                    <label
                                        class=" my-0.5  inline-flex items-center justify-between w-full p-4 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500  hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                        <div class="block">
                                            <div class="w-full text-gray-500 text-sm dark:text-gray-400">Address</div>
                                            <div class="w-full text-base font-medium"> {{ Auth::user()->street }},
                                                {{ Auth::user()->barangay }},
                                                {{ Auth::user()->city }},
                                                {{ Auth::user()->province }}</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>

            </div>

    </section>
</x-app-layout>
