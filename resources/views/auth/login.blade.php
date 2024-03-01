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
    <!-- Session Status -->
    <div class="w-full bg-transparent mb-2 mx-auto">
        <img src="{{ asset('images/logo.png') }}" alt="Noah's Ark Logo" class="mx-auto mb-3 w-1/4">
        <h1 class="text-center text-2xl  font-bold">Login to your account</h1>
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <div class="flex items-center justify-center mt-6">
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
            
        </div>

        <div class="flex justify-center items-center  mt-4">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class=" w-full bg-yellow-300  hover:bg-yellow-200 text-center py-2 font-bold rounded-lg">Register</a>
            @endif</p>
        </div>
         
    
       

      
    </form>
</x-guest-layout>
