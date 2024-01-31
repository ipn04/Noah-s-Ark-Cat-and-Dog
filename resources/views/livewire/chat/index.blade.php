<div>
    <x-app-layout>
        @if(auth()->user()->isAdmin())

            @include('admin_top_navbar.admin_top_navbar')

            @include('sidebars.admin_sidebar')

            <div class="sm:ml-64">
                <section class="flex flex-col antialiased bg-gray-50 text-gray-600 min-h-screen p-4">
                    <div class="h-full">
                        <!-- Card -->
                        <div class="relative max-w-[340px] bg-white shadow-lg rounded-lg">
                            <!-- Card body -->
                            <div class="py-3 px-5">
                                <h3 class="text-xs font-semibold uppercase text-gray-400 mb-1">Chats</h3>
                                <!-- Chat list -->
        
                                <ul
                                    class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="allTab"
                                            class="border-b-2 border-red-600 text-red-500 inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="all">All</a>
                                    </li>
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}"  id="adoptionTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Adoption">Adoption</a>
                                    </li>
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}"  id="donationTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Donation">Donation</a>
                                    </li>
                                </ul>
    
                                @foreach ($threads as $thread)
                                    <div class="message-item divide-y divide-black-900 hover:bg-gray-200 px-2"
                                        data-concern="{{ $thread->concern }}">
                                        <!-- User -->
                                        <a href="{{ route('chat', ['messageId' => $thread->id]) }}">
                                            <h3>{{ $thread->concern }}</h3>
                                            <button class="w-full text-left py-2">
                                                <div class="flex items-center">
                                                    <img class="rounded-full items-start flex-shrink-0 mr-3"
                                                        src="{{ asset('storage/' . $thread->user->profile_image) }}"
                                                        alt='user profile' width="32" height="32" />
                                                    <div>
                                                        <h4 class="text-sm font-semibold text-gray-900">
                                                            {{ $thread->user->firstname . ' ' . $thread->user->name }}
                                                        </h4>
                                                        <div class="text-[13px]">{{ $thread->content }} <span
                                                                class="text-xs">{{ \Carbon\Carbon::parse($thread->created_at)->format('h:iA') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
        @else
            @include('admin_top_navbar.user_top_navbar')

            @include('sidebars.user_sidebar')
            <div class="sm:ml-64">

                <!-- Modal toggle -->
                <div class="mx-4 my-4">
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-base" type="button">
                        <svg class="h-4 w-4 text-white mx-0.5"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Compose Message
                    </button>
                </div>
        
                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Send Message
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form method="POST" action="{{ route('messages.send') }}" class="px-5 py-4">
                                @csrf
                                <div class="col-span-2 sm:col-span-1 py-2">
                                    <label for="admin_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Send to:</label>
                                    <input type="text" id="admin_id" name="admin_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " value="Noah's Ark" readonly>
                                </div>
                                <div class="col-span-2 sm:col-span-1 py-2">
                                    <label for="concern" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Concern</label>
                                    <select id="concern" name="concern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Adoption</option>
                                        <option value="Donation">Donation</option>
                                    </select>
                                </div>
                                <div class="col-span-2 py-2">
                                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                                    <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here" required></textarea>                    
                                </div>
                                
                                <button type="submit" class="flex my-2 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div> 
                <section class="flex flex-col antialiased bg-gray-50 text-gray-600 min-h-screen p-4">
                    <div class="h-full">
                        <!-- Card -->
                        <div class="relative max-w-[340px] bg-white shadow-lg rounded-lg">                    
                            <!-- Card body -->
                            <div class="py-3 px-5">
                                <h3 class="text-xs font-semibold uppercase text-gray-400 mb-1">Chats</h3>
                                <!-- Chat list -->
                                @foreach ($threads as $thread)
                                    <div class="divide-y divide-black-900 hover:bg-gray-200 px-2">
                                        <!-- User -->
                                        <a href="{{ route('chat', ['messageId' => $thread->id]) }}">
                                            <button class="w-full text-left py-2">
                                                <div class="flex items-center">
                                                    <img class="rounded-full items-start flex-shrink-0 mr-3" src="{{ asset('storage/' . $thread->user->profile_image) }}" alt='user profile' width="32" height="32" />
                                                    <div>
                                                        {{-- <h4 class="text-sm font-semibold text-gray-900">{{ $admin->firstname }}</h4> --}}
                                                        <div class="text-[13px]">You: {{ $thread->content }} <span class="text-xs">{{ \Carbon\Carbon::parse($thread->created_at)->format('h:i a') }}</span></div>
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Bottom right button -->
                            {{-- <button class="absolute bottom-5 right-5 inline-flex items-center text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 rounded-full text-center px-3 py-2 shadow-lg focus:outline-none focus-visible:ring-2">
                                <svg class="w-3 h-3 fill-current text-indigo-300 flex-shrink-0 mr-2" viewBox="0 0 12 12">
                                    <path d="M11.866.146a.5.5 0 0 0-.437-.139c-.26.044-6.393 1.1-8.2 2.913a4.145 4.145 0 0 0-.617 5.062L.305 10.293a1 1 0 1 0 1.414 1.414L7.426 6l-2 3.923c.242.048.487.074.733.077a4.122 4.122 0 0 0 2.933-1.215c1.81-1.809 2.87-7.94 2.913-8.2a.5.5 0 0 0-.139-.439Z" />
                                </svg>
                                <span>Reply</span>
                            </button> --}}
                        </div>
                    </div>
                </section>
            </div>
        @endif
                
    </x-app-layout>
    {{-- lagay ko muna dito js, ako na mag transfer sa crud.js next time --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const messageTabs = document.querySelectorAll('.flex-wrap a');

            const messageContainer = document.getElementById('messageContainer');


            messageTabs.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    const concern = this.getAttribute('data-concern');
                
                    filterMessages(concern, this);
                });
            });

            function filterMessages(concern, selectedTab) {
                const messageItems = document.querySelectorAll('.message-item');

                messageTabs.forEach(link => {
                    link.classList.remove('border-b-2', 'border-red-600', 'text-red-500');
                });

                // Add styles to the selected tab
                selectedTab.classList.add('border-b-2', 'border-red-600', 'text-red-500');

                if (concern === 'all') {
                    messageItems.forEach(item => {
                        item.style.display = 'block';
                    });
                } else {
                    messageItems.forEach(item => {
                        item.style.display = 'none';
                    });

                    const filteredMessages = document.querySelectorAll(`.message-item[data-concern="${concern}"]`);
                    filteredMessages.forEach(item => {
                        item.style.display = 'block';
                    });
                }
            }
        });
    </script>
</div>