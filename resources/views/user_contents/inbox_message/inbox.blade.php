<x-app-layout>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <div class="sm:ml-64">
        <div class="w-full px-5 flex flex-col justify-between h-customHeight">
            <div class="flex flex-col mt-5 scroll-smooth overflow-scroll">
                <div class="flex justify-end mb-4">
                    <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                        {{ $initialMessage->content }}
                    </div>
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('storage/' . $initialMessage->user->profile_image) }}" alt='user profile'
                            class="object-cover h-8 w-8 rounded-full" alt="" />
                    </div>
                </div>
                @foreach ($threads as $thread)
                    <div class="flex justify-{{ $thread->sender_id == auth()->id() ? 'end' : 'start' }} mb-4">
                        @if ($thread->sender_id == auth()->id())
                            {{-- user reply --}}
                            <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                                {{ $thread->content ?? null }}
                            </div>
                            <div class="flex justify-center items-center">
                                <img src="{{ asset('storage/' . $thread->user->profile_image) }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                            </div>
                        @else 
                            {{-- admin reply --}}
                            <div class="flex justify-center items-center" id="messagesContainer">
                                <img src="{{ asset('storage/' . $thread->user->profile_image) }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                            </div>
                            <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tl-3xl rounded-tr-xl text-white">
                                {{ $thread->content ?? null }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <form
                action="{{ route('send.reply', ['messageId' => $initialMessage->id, 'receiverId' => $initialMessage->receiver_id]) }}"
                method="POST">
                @csrf
                <div class="flex flex-row items-center h-16 rounded-xl w-full">
                    <div>
                        <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-grow ml-4">
                        <div class="relative w-full">
                            <input type="text" id="content" name="content"
                                class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                            <button
                                class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="ml-4">
                        <button
                            class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                            <span>Send</span>
                            <span class="ml-2">
                                <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script>

</script>