<div>
    <x-slot name="title">Noah's Ark</x-slot>
    <x-app-layout>
        @if (auth()->user()->isAdmin())

            @include('admin_top_navbar.admin_top_navbar')

            @include('sidebars.admin_sidebar')
            
            <div class="sm:ml-64">
                <section class="flex flex-col antialiased text-gray-600 min-h-screen p-4">
                    <div class="h-full">
                        <!-- Card -->
                        <div class="relative  max-w-6xl mx-auto bg-white shadow-lg rounded-lg">
                            <!-- Card body -->
                            <div class="py-3 px-5">

                                <div class = "flex justify-between">
                                    <h3 class="text-lg font-semibold py-3 text-gray-600 mb-1">Chats</h3>
                                    <div class = "flex mx-4 my-4 justify-center items-center">

                                        <!-- Instructions -->

                                        <a data-modal-target="default-modal" data-modal-toggle="default-modal"
                                            class = "ml-2 text-gray-500 hover:text-red-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Main modal -->
                                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-600 dark:text-white">
                                                        Noah's Ark Messaging Guide!
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="default-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <p
                                                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        With less than a month to go before the European Union enacts
                                                        new consumer privacy laws for its citizens, companies around the
                                                        world are updating their terms of service agreements to comply.
                                                    </p>
                                                    <p
                                                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        The European Union’s General Data Protection Regulation
                                                        (G.D.P.R.) goes into effect on May 25 and is meant to ensure a
                                                        common set of data rights in the European Union. It requires
                                                        organizations to notify users as soon as possible of high-risk
                                                        data breaches that could personally affect them.
                                                    </p>
                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chat list -->

                                <ul
                                    class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="allTab"
                                            class="border-b-2 border-red-600 text-red-500 inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="all">All</a>
                                    </li>
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="donationTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Donation">Partnerships</a>
                                    </li>
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="donationTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Donation">Collaborations</a>
                                    </li>
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="donationTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Donation">Donation</a>
                                    </li>
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="adoptionTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Adoption">Adoption</a>
                                    </li>

                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="donationTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Donation">Volunteer</a>
                                    </li>
                                    <li class="me-2">
                                        <a href="{{ route('chat.index') }}" id="donationTab"
                                            class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                            data-concern="Donation">Others</a>
                                    </li>
                                </ul>
                                @if($threads)
                                    @foreach ($threads as $thread)
                                        <div wire:click="markAsReadAndNavigate({{ $thread->id }})" class="message-item divide-y divide-black-900 hover:bg-gray-100 hover:rounded-lg mt-2 px-2"
                                            data-concern="{{ $thread->concern }}">
                                            <!-- User -->
                                            {{-- <a href="{{ route('chat', ['messageId' => $thread->id]) }}"> --}}
                                                <button class="text-left py-2">

                                                    <div class="flex items-center">
                                                        <div class = "flex items-center relative">
                                                            
                                                            <div
                                                                class="absolute bottom-0 right-0 text-white rounded-full w-8 h-8 flex items-center justify-center text-xs pointer-events-none
                                                                @if($thread->concern == "Adoption")
                                                                bg-red-500
                                                                @elseif ($thread->concern == "Donation")
                                                                bg-emerald-500

                                                                @elseif ($thread->concern == "Partnerships")
                                                                bg-teal-500

                                                                @elseif ($thread->concern == "Collaborations")
                                                                bg-amber-500

                                                                @elseif ($thread->concern == "Others")
                                                                bg-cyan-500

                                                                @elseif ($thread->concern == "Volunteer")
                                                                bg-orange-950

                                                                @endif
                                                                ">
                                                                <div class="flex items-center justify-center">
                                                                    @if($thread->concern == "Adoption")
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="currentColor"
                                                                        class="w-5 h-5">
                                                                        <path
                                                                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                                                        <path
                                                                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                                                                    </svg>
                                                                    @elseif ($thread->concern == "Donation")
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                                        <path d="M11.25 3v4.046a3 3 0 0 0-4.277 4.204H1.5v-6A2.25 2.25 0 0 1 3.75 3h7.5ZM12.75 3v4.011a3 3 0 0 1 4.239 4.239H22.5v-6A2.25 2.25 0 0 0 20.25 3h-7.5ZM22.5 12.75h-8.983a4.125 4.125 0 0 0 4.108 3.75.75.75 0 0 1 0 1.5 5.623 5.623 0 0 1-4.875-2.817V21h7.5a2.25 2.25 0 0 0 2.25-2.25v-6ZM11.25 21v-5.817A5.623 5.623 0 0 1 6.375 18a.75.75 0 0 1 0-1.5 4.126 4.126 0 0 0 4.108-3.75H1.5v6A2.25 2.25 0 0 0 3.75 21h7.5Z" />
                                                                        <path d="M11.085 10.354c.03.297.038.575.036.805a7.484 7.484 0 0 1-.805-.036c-.833-.084-1.677-.325-2.195-.843a1.5 1.5 0 0 1 2.122-2.12c.517.517.759 1.36.842 2.194ZM12.877 10.354c-.03.297-.038.575-.036.805.23.002.508-.006.805-.036.833-.084 1.677-.325 2.195-.843A1.5 1.5 0 0 0 13.72 8.16c-.518.518-.76 1.362-.843 2.194Z" />
                                                                    </svg>
                                                                    
                                                                    @elseif ($thread->concern == "Partnerships")
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                                        <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                                                                        <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    
                                                                    @elseif ($thread->concern == "Collaborations")
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                                        <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                                                                        <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    
                                                                    @elseif ($thread->concern == "Others")
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm0 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM15.375 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    
                                                                    @elseif ($thread->concern == "Volunteer")
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                                                    </svg>
                                                                    
                                                                    @endif

                                                                </div>

                                                            </div>
                                                            <img class="rounded-full h-14 w-14 items-start flex-shrink-0 mr-3"
                                                                src="{{ asset('storage/' . $thread->user->profile_image) }}"
                                                                alt='user profile' width="32" height="32" />
                                                        </div>

                                                        <div class = "ps-3 max-w-md">
                                                            <h4 class="text-base font-semibold text-gray-600">
                                                                {{ $thread->user->firstname . ' ' . $thread->user->name }}
                                                            </h4>
                                                            <div class="flex items-center text-base truncate">
                                                                <p class="text-sm">{{ $thread->isCurrentUser ? 'You: ' : $thread->user->firstname . ': '}} </p>
                                                                <p class="text-sm">{{$thread->content}}</p>
                                                            </div>
                                                            <span
                                                                    class="text-xs">{{ \Carbon\Carbon::parse($thread->created_at)->format('h:iA') }}</span>
                                                            @if ($thread->unreadCount > 0)
                                                                <div class="text-xs text-red-500">{{ $thread->unreadCount }} unread messages</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </button>
                                            {{-- </a> --}}
                                        </div>
                                    @endforeach
                                @else
                                
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @else
            @include('admin_top_navbar.user_top_navbar')

            @include('sidebars.user_sidebar')
            <div class="sm:ml-64">


                <section class="flex flex-col antialiased  text-gray-600 min-h-screen p-4">
                    <div class="max-h-full">
                        <!-- Card -->
                        <div class="relative max-w-6xl bg-white mx-auto shadow-md rounded-xl">
                            <!-- Card body -->
                            <div class="py-5 px-5">
                                <div class = "flex justify-between">

                                    <h3 class="text-lg font-semibold py-3 text-gray-600 mb-1">Your Messages to the
                                        Shelter</h3>

                                    <div class = "flex mx-4 my-4 justify-center items-center">
                                        <!-- Modal toggle -->
                                        <div class="">
                                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                                class="flex items-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 text-base"
                                                type="button">
                                                <svg class="h-4 w-4 text-white mx-0.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Compose Message
                                            </button>

                                        </div>
                                        <!-- Instructions -->

                                        <a data-modal-target="default-modal" data-modal-toggle="default-modal"
                                            class = "ml-2 text-gray-500 hover:text-red-500 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Main modal -->
                                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-600 dark:text-white">
                                                        Welcome to Noah's Ark Messaging!
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="default-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <p
                                                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        With less than a month to go before the European Union enacts
                                                        new consumer privacy laws for its citizens, companies around the
                                                        world are updating their terms of service agreements to comply.
                                                    </p>
                                                    <p
                                                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        The European Union’s General Data Protection Regulation
                                                        (G.D.P.R.) goes into effect on May 25 and is meant to ensure a
                                                        common set of data rights in the European Union. It requires
                                                        organizations to notify users as soon as possible of high-risk
                                                        data breaches that could personally affect them.
                                                    </p>
                                                </div>
                                                <!-- Modal footer -->
                                                <div
                                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Main modal -->
                                    <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-600 dark:text-white">
                                                        Send Message
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="crud-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method="POST" action="{{ route('messages.send') }}"
                                                    class="px-5 py-4">
                                                    @csrf
                                                    <div class="col-span-2 sm:col-span-1 py-2">
                                                        <label for="admin_id"
                                                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Send
                                                            to:</label>
                                                        <input type="text" id="admin_id" name="admin_id"
                                                            class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500 "
                                                            value="Noah's Ark" readonly>
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1 py-2">
                                                        <label for="concern"
                                                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Concern</label>
                                                        <select id="concern" name="concern"
                                                            class="bg-gray-50 border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                                                            <option selected="">Adoption</option>
                                                            <option value="Donation">Donation</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-span-2 py-2">
                                                        <label for="content"
                                                            class="block mb-2 text-sm font-medium text-gray-600 dark:text-white">Message</label>
                                                        <textarea id="content" name="content" rows="4"
                                                            class="block p-2.5 w-full text-sm text-gray-600 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                                                            placeholder="Write product description here" required></textarea>
                                                    </div>

                                                    <button type="submit"
                                                        class="flex my-2 text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Send Message
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chat list -->
                                @foreach ($threads as $thread)
                                    <div wire:click="markAsReadAndNavigate({{ $thread->id }})" class="divide-y p-3 divide-black-900 hover:bg-gray-100 hover:rounded-lg px-2">
                                        <!-- User -->
                                        {{-- <a href="{{ route('chat', ['messageId' => $thread->id]) }}"> --}}
                                            <button class="w-full text-left py-2">
                                                <div class="flex items-center">
                                                    <div class = "flex items-center relative">
                                                        <div
                                                            class="absolute bottom-0 right-0 bg-amber-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-xs pointer-events-none">
                                                            <div class="flex items-center justify-center">

                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                    class="w-5 h-5">
                                                                    <path
                                                                        d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                                                                    <path
                                                                        d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                                                                </svg>

                                                            </div>

                                                        </div>
                                                        <img class="rounded-full items-start w-14 h-14 flex-shrink-0 mr-3"
                                                            src="{{ asset('images/logo.png') }}" alt='user profile'
                                                            width="32" height="32" />
                                                    </div>
                                                    <div class = "ps-3 max-w-md">
                                                        <h4 class="text-base font-semibold text-gray-600">
                                                            Noah's Ark Cat & Shelter
                                                        </h4>
                                                        <div class="text-base truncate">
                                                            <div class="flex items-center text-base truncate">
                                                            <p class="text-sm">{{ $thread->isCurrentUser ? 'You: ' : 'Noah\'s Ark :'}} </p>
                                                            <p class="text-sm">{{$thread->content}}</p>
                                                        </div>
                                                        </div>
                                                        <span
                                                            class="text-xs">{{ \Carbon\Carbon::parse($thread->created_at)->format('h:iA') }}</span>
                                                            @if ($thread->unreadCount > 0)
                                                                <div class="text-xs text-red-500">{{ $thread->unreadCount }} unread messages</div>
                                                            @endif
                                                    </div>
                                                </div>
                                            </button>
                                        {{-- </a> --}}
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
