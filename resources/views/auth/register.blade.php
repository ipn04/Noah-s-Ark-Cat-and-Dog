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

    @if(session('account_added'))
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
        <h1 class="text-center text-4xl font-bold">Register</h1>
    </div>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex items-center space-x-6">
            <div class="shrink-0">
              <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="Current profile photo" />
            </div>
            <label for="profile_image" class="block">
              <span class="sr-only">Choose profile photo</span>
              <input id="profile_image" name="profile_image" type="file" onchange="loadFile(event)" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
              "/>
            </label>
        </div>
        <!-- Name -->
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
                {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
            </div>
    
            <div>
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="number" name="phone_number" :value="old('phone_number')" required autocomplete="number" />
                {{-- <x-input-error :messages="$errors->get('phone_number')" class="mt-2" /> --}}
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="province" :value="__('Province')" />
                <x-text-input id="province" class="block mt-1 w-full" type="text" name="province" :value="old('province')" required autocomplete="province" />
                {{-- <x-input-error :messages="$errors->get('province')" class="mt-2" /> --}}
            </div>

            <div>
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="city" />
                {{-- <x-input-error :messages="$errors->get('city')" class="mt-2" /> --}}
            </div>
        </div>


        <div class="mt-4">
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autocomplete="street" />
            {{-- <x-input-error :messages="$errors->get('street')" class="mt-2" /> --}}
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
        </div>

        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

        
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
