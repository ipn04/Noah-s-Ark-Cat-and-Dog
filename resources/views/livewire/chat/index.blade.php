<div>
    <x-app-layout>

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
    </x-app-layout>
</div>