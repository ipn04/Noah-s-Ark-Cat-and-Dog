<div x-data="{ height: 0, conversationElement: document.getElementById('conversation') }" x-init="height = conversationElement.scrollHeight;
$nextTick(() => conversationElement.scrollTop = height);"
    @scroll-bottom.window="$nextTick(()=>conversationElement.scrollTop= height);">
    <main class = "bg-white">
        @if (auth()->user()->isAdmin())
            <header class="flex justify-between items-center w-full bg-white items-center bg-white shadow-md px-5 py-4">
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $selectedConversation->user->profile_image) }}" alt='user profile'
                        class="object-cover h-8 w-8 rounded-full" />
                    <div>
                        <span
                            class="flex justify-start font-bold mx-2">{{ $selectedConversation->user->firstname . ' ' . $selectedConversation->user->name }}
                        </span>
                    </div>
                </div>
                <div>
                    <!-- drawer init and show -->
                    <div class="text-center flex justify-center items-center">
                        <button type="button" data-drawer-target="drawer-form" data-drawer-show="drawer-form"
                            aria-controls="drawer-form">
                            <svg class="h-6 w-6 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </button>
                    </div>

                    <!-- drawer component -->
                    <div id="drawer-form"
                        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
                        tabindex="-1" aria-labelledby="drawer-form-label">
                        <h5 id="drawer-label"
                            class="inline-flex items-center text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                            User Details
                        </h5>
                        <button type="button" data-drawer-hide="drawer-form" aria-controls="drawer-form"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close menu</span>
                        </button>
                        <div class="flex justify-center items-center my-4">
                            <img src="{{ asset('storage/' . $selectedConversation->user->profile_image) }}" alt='user profile'
                        class="object-cover h-24 w-24 rounded-full" />
                        </div>
                        <div class="">
                            <p class="text-center font-bold">{{ $selectedConversation->user->firstname . ' ' . $selectedConversation->user->name }}</p>
                        </div>

                    </div>
                </div>
            </header>
        @else
            <header class="flex justify-between items-center w-full bg-gray items-center bg-white shadow-md px-5 py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt='user profile'
                        class="object-cover h-8 w-8 rounded-full" />
                    <div>
                        <span class="flex justify-start font-bold mx-2"> Noah's Ark </span>
                    </div>
                </div>
            </header>
        @endif
        <div class="scroll-smooth overflow-auto bg-gray-50 h-customHeight lg:h-largeScreen px-5 py-4 mt-1"
            id="conversation" x-ref="conversation">
            @if ($selectedConversation)
                <div @class([
                    'flex mb-4',
                    'justify-start' => !($selectedConversation->sender_id === auth()->id()),
                    'justify-end' => $selectedConversation->sender_id === auth()->id(),
                ])>
                    <div @class([
                        'flex items-end',
                        'hidden' => $selectedConversation->sender_id === auth()->id(),
                    ])>
                        <div class="flex items-end">
                            @if (auth()->user()->isAdmin())
                                <img src="{{ asset('storage/' . $selectedConversation->user->profile_image) }}"
                                    alt='user profile' class="object-cover h-8 w-8 rounded-full">
                            @else
                                <img src="{{ asset('images/logo.png') }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                            @endif
                        </div>
                        <div @class([
                            'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white max-w-md',
                        ])>
                            <div>
                                <p class=" whitespace-normal break-words pb-2">{{ $selectedConversation->content }} </p>
                                <p
                                    class="flex justify-start text-xs">{{ $selectedConversation->created_at->format('h:i a') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div @class([
                    'flex mb-4',
                    'justify-start' => !($selectedConversation->sender_id === auth()->id()),
                    'justify-end' => $selectedConversation->sender_id === auth()->id(),
                ])>
                    <div @class([
                        'flex items-end',
                        'hidden' => !($selectedConversation->sender_id === auth()->id()),
                    ])>
                        <div @class([
                            'mr-2 py-3 px-4 bg-red-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white max-w-md admin_reply',
                        ])>
                            <div>
                                <p class="whitespace-normal break-words pb-2">{{ $selectedConversation->content }} </p>
                                <p
                                    class="flex justify-end text-xs">{{ $selectedConversation->created_at->format('h:i a') }}</p>
                            </div>
                        </div>

                        @if (auth()->user()->isAdmin())
                            <img src="{{ asset('images/logo') }}" alt='user profile'
                                class="object-cover h-8 w-8 rounded-full" />
                        @else
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt='user profile'
                                class="object-cover h-8 w-8 rounded-full" />
                        @endif
                    </div>
                </div>
            @endif

            @if ($loadedMessages)

                @foreach ($loadedMessages as $message)
                    <div @class([
                        'flex mb-4',
                        'justify-start' => !($message->sender_id === auth()->id()),
                        'justify-end' => $message->sender_id === auth()->id(),
                    ])>
                        <div @class([
                            'flex items-end',
                            'hidden' => $message->sender_id === auth()->id(),
                        ])>
                            <div class="flex items-end">
                                @if (auth()->user()->isAdmin())
                                    <img src="{{ asset('storage/' . $selectedConversation->user->profile_image) }}"
                                        alt='user profile' class="object-cover h-8 w-8 rounded-full" />
                                @else
                                    <img src="{{ asset('images/logo.png') }}" alt='user profile'
                                        class="object-cover h-8 w-8 rounded-full" />
                                @endif
                            </div>
                            <div @class([
                                'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white max-w-md',
                            ])>
                                <div>
                                    <p class=" whitespace-normal break-words pb-2">{{ $message->content }} </p>
                                    <p
                                        class="flex justify-start text-xs">{{ $message->created_at->format('h:i a') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div @class([
                        'flex mb-4',
                        'justify-start' => !($message->sender_id === auth()->id()),
                        'justify-end' => $message->sender_id === auth()->id(),
                    ])>
                        <div @class([
                            'flex items-end',
                            'hidden' => !($message->sender_id === auth()->id()),
                        ])>
                            <div @class([
                                'mr-2 py-3 px-4 bg-red-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white max-w-md admin_reply',
                            ])>
                                <div>
                                    <p class="whitespace-normal break-words pb-2">{{ $message->content }} </p>
                                    <p
                                        class="flex justify-end text-xs">{{ $message->created_at->format('h:i a') }}</p>
                                </div>
                            </div>
                            @if (auth()->user()->isAdmin())

                                <img src="{{ asset('images/logo.png') }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                            @endif
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </main>
    <div class = "bg-white  px-10">
        <form x-data="{ body: @entangle('body') }" @submit.prevent="$wire.sendMessage" method="POST">
            @csrf
            <div class="flex flex-row items-center  h-16 rounded-xl w-full">
                
                <div class="flex-grow ml-4">
                    <div class="relative w-full">
                        <input type="text" x-model="body"  placeholder="Write"
                            class="flex w-full border rounded-xl focus:outline-none focus:border-red-300 pl-4 h-10" />
                        
                    </div>
                </div>
                <div class="ml-4">
                    <button type="submit"
                        class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
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
        @error('body')
            <p>{{ $message }}</p>
        @enderror
    </div>

</div>
