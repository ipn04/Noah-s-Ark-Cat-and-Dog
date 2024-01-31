<div x-data="{ height: 0, conversationElement: document.getElementById('conversation') }" x-init="height = conversationElement.scrollHeight;
$nextTick(() => conversationElement.scrollTop = height);"
    @scroll-bottom.window="$nextTick(()=>conversationElement.scrollTop= height);">
    <main>
        @if(auth()->user()->isAdmin())
            <header class="flex justify-between items-center w-full bg-gray items-center bg-green-200 px-5 py-4">
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $selectedConversation->user->profile_image) }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                    <div>
                        <span class="flex justify-start font-bold mx-2">{{ $selectedConversation->user->firstname . ' ' . $selectedConversation->user->name}} </span>
                    </div>  
                </div>
                <div>
                    <!-- drawer init and show -->
                    <div class="text-center">
                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-form" data-drawer-show="drawer-form" aria-controls="drawer-form">
                        Details
                        </button>
                    </div>
                    
                    <!-- drawer component -->
                    <div id="drawer-form" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-form-label">
                        <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"><svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
                    </svg>New event</h5>
                        <button type="button" data-drawer-hide="drawer-form" aria-controls="drawer-form" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close menu</span>
                        </button>
                        <form class="mb-6">
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apple Keynote" required>
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write event description..."></textarea>
                        </div>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker="" datepicker-autohide datepicker-buttons="" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                        </div>
                        <div class="mb-4">
                            <label for="guests" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Invite guests</label>
                            <div class="relative">
                                <input type="search" id="guests" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add guest email" required>
                                <button type="button" class="absolute inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-blue-700 rounded-lg end-2 bottom-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-3 h-3 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z"/>
                    </svg>Add</button>
                            </div>
                        </div>
                        <div class="flex mb-4 -space-x-4 rtl:space-x-reverse">
                            <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-5.jpg" alt="">
                            <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-2.jpg" alt="">
                            <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-3.jpg" alt="">
                            <img class="w-8 h-8 border-2 border-white rounded-full dark:border-gray-800" src="/docs/images/people/profile-picture-4.jpg" alt="">
                        </div>
                        <button type="submit" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M18 2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM2 18V7h6.7l.4-.409A4.309 4.309 0 0 1 15.753 7H18v11H2Z"/>
                        <path d="M8.139 10.411 5.289 13.3A1 1 0 0 0 5 14v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .7-.288l2.886-2.851-3.447-3.45ZM14 8a2.463 2.463 0 0 0-3.484 0l-.971.983 3.468 3.468.987-.971A2.463 2.463 0 0 0 14 8Z"/>
                    </svg> Create event</button>
                        </form>
                    </div>  
                </div>                   
            </header>
        @else
            <header class="flex justify-between items-center w-full bg-gray items-center bg-green-200 px-5 py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                    <div>
                        <span class="flex justify-start font-bold mx-2"> Noah's Ark </span>
                    </div>  
                </div>                 
            </header>
        @endif
        <div class="scroll-smooth overflow-auto h-customHeight px-5 mt-4" id="conversation" x-ref="conversation">
            @if ($selectedConversation)
                <div @class([
                    'flex mb-4',
                    'justify-start' => !($selectedConversation->sender_id === auth()->id()),
                    'justify-end' => $selectedConversation->sender_id === auth()->id(),
                ])>
                    <div @class([
                        'flex items-center',
                        'hidden' => $selectedConversation->sender_id === auth()->id(),
                    ])>
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/' . $selectedConversation->user->profile_image) }}" alt='user profile'
                                class="object-cover h-8 w-8 rounded-full" />
                        </div>
                        <div @class([
                            'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white',
                        ])>
                            <div class="grid grid-row">
                                <span class="flex justify-start">{{ $selectedConversation->content }} </span>
                                <span
                                    class="flex justify-start text-xs">{{ $selectedConversation->created_at->format('h:i a') }}</span>
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
                        'flex items-center',
                        'hidden' => !($selectedConversation->sender_id === auth()->id()),
                    ])>
                        <div @class([
                            'mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white admin_reply',
                        ])>
                            <div class="grid grid-row">
                                <span class="flex justify-end">{{ $selectedConversation->content }} </span>
                                <span
                                    class="flex justify-end text-xs">{{ $selectedConversation->created_at->format('h:i a') }}</span>
                            </div>
                        </div>
                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt='user profile'
                            class="object-cover h-8 w-8 rounded-full" />
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
                            'flex items-center',
                            'hidden' => $message->sender_id === auth()->id(),
                        ])>
                            <div class="flex justify-center items-center">
                                <img src="{{ asset('storage/' . $message->user->profile_image) }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                            </div>
                            <div @class([
                                'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white',
                            ])>
                                <div class="grid grid-row">
                                    <span class="flex justify-start">{{ $message->content }} </span>
                                    <span
                                        class="flex justify-start text-xs">{{ $message->created_at->format('h:i a') }}</span>
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
                            'flex items-center',
                            'hidden' => !($message->sender_id === auth()->id()),
                        ])>
                            <div @class([
                                'mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white admin_reply',
                            ])>
                                <div class="grid grid-row">
                                    <span class="flex justify-end">{{ $message->content }} </span>
                                    <span
                                        class="flex justify-end text-xs">{{ $message->created_at->format('h:i a') }}</span>
                                </div>
                            </div>
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt='user profile'
                                class="object-cover h-8 w-8 rounded-full" />
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </main>

    <form x-data="{ body: @entangle('body') }" @submit.prevent="$wire.sendMessage" method="POST">
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
                    <input type="text" x-model="body" required placeholder="Write"
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
                <button type="submit"
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
    @error('body')
        <p>{{ $message }}</p>
    @enderror
</div>
