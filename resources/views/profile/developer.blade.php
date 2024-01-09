<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    @include('sidebars.admin_sidebar')
    @include('admin_top_navbar.admin_top_navbar')


    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="max-w-3xl mx-auto bg-white p-10 rounded-lg shadow-md">
                    <header>
                        <h2 class="text-2xl font-bold text-red-500 dark:text-gray-100">
                            {{ __('Contact the Developers') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Please communicate any concerns or reports pertaining to the system via email in order for us to address them expeditiously.") }}
                        </p>
                    </header>
                
                    <form method="POST" action="https://api.web3forms.com/submit" class="mt-6 space-y-6">
                    

                        <div>
                            <x-input-label class = "hidden" for="access_key" :value="__('Access Key')" />
                            <x-text-input id="access_key" name="access_key" type="hidden" class="mt-1 block w-full" value="de78cfc2-47c8-43a2-81d8-3f3ec832789c"  />
                        </div>
                
                
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name',  Auth::user()->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input disabled  id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email',  Auth::user()->email)" required autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                
                
                        </div>

                        <div>
                            <x-input-label for="message" :value="__('Your Concern')" />
                            <textarea id="message" name="message" type="text" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm" :value="old('message')" required autocomplete="message" ></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        </div>

                        <div>
                            <x-primary-button>
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                
                        
                    </form>
                </div>
            </div>

    </div>
    </section>
</x-app-layout>
