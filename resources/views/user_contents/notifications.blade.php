<x-app-layout>
    <x-slot name="Notification Page"></x-slot>
    @include('admin_top_navbar.user_top_navbar')
    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="py-3">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <header>
                        <h1 class = "text-2xl font-bold">Notifications</h1>
                    </header>


                    {{-- <ul class="flex py-2 flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="me-2">
                            <a href="#" class="inline-block px-4 py-3 text-red-700 font-bold bg-red-100 rounded-full active" aria-current="page">All</a>
                        </li>
                        <li class="me-2">
                            <a href="#"  class="inline-block px-4 py-3 rounded-full hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">Unread</a>
                        </li>
                       
                    </ul>
                    
                    <p class = "text-lg py-2 font-semibold">Earlier</p>
                    <x-dropdownmessage-link :href="route('profile.edit', ['id' => auth()->id()])" :currentDate="'3 hdsoddurs ago'" :image-source="asset('images/logo.png')" :name="'Noahs Ark'">
                        {{ __('sent you a message.') }}
                    </x-dropdownmessage-link>
                    <x-dropdownapply-link :href="route('profile.edit', ['id' => auth()->id()])" :currentDate="'3 hdsoddurs ago'" :image-source="asset('images/logo.png')" :name="'Noahs Ark'">
                        {{ __('sent an adoption application.') }}
                    </x-dropdownapply-link>
                    <x-dropdownvapply-link :href="route('profile.edit', ['id' => auth()->id()])" :currentDate="'3 hdsoddurs ago'" :image-source="asset('images/logo.png')" :name="'Noahs Ark'">
                        {{ __('sent a volunteer application.') }}
                    </x-dropdownvapply-link> --}}
                    @if($userAllNotifications)
                        @foreach($userAllNotifications as $notification)
                            @if ($notification->concern == 'Adoption Application')
                                <x-dropdownapply-link :href="route('user.adoptionprogress', ['userId' => auth()->id(), 'applicationId' => $notification->application->id])" :image-source="'/images/logo.png'" :name="$notification->user->firstname . ' ' .$notification->user->name"  :currentDate="$notification->created_at->diffForHumans()" :markAsRead="$notification->mark_as_read" :notificationId="$notification->id">
                                    {{ $notification->message }}
                                </x-dropdownapply-link>
                            @elseif ($notification->concern == 'Volunteer Application')
                                <x-dropdownvapply-link :href="route('user.volunteerprogress', ['userId' => auth()->user()->id, 'applicationId' => $notification->application->id])" :image-source="'/images/logo.png'" :name="$notification->user->firstname . ' ' .$notification->user->name"  :currentDate="$notification->created_at->diffForHumans()" :markAsRead="$notification->mark_as_read" :notificationId="$notification->id">
                                    {{ $notification->message }}
                                </x-dropdownvapply-link>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
