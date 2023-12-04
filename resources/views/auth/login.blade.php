<x-guest-layout>
    <!-- Session Status -->
    <div class="w-full bg-white mb-4">
        <h1 class="text-center text-4xl font-bold">Login</h1>
    </div>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-center items-center block mt-4">
            <p class="text-sm">Don't have an account?@if (Route::has('register'))
                <a href="{{ route('register') }}" class="underline font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
            @endif</p>
        </div>
         
        <div class="flex justify-center items-center block mt-2">
             @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
       

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
            
        </div>
    </form>
</x-guest-layout>
