<div>
    <x-slot name="title">Noah's Ark</x-slot>
    <x-app-layout>
        @if(auth()->user()->isAdmin())
            @include('admin_top_navbar.admin_top_navbar')
        
            @include('sidebars.admin_sidebar')
        @else
            @include('admin_top_navbar.user_top_navbar')

            @include('sidebars.user_sidebar')
        @endif

        <div class="sm:ml-64 ">
            <div class="w-full flex flex-col justify-between">

                <livewire:chat.chat-box  :messageId="$messageId">

            </div>
        </div>
    </x-app-layout>
</div>
