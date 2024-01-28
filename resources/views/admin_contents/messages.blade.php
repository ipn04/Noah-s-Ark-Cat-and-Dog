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
                        @foreach ($ShowAllMessage as $messages)
                            <div class="divide-y divide-black-900 hover:bg-gray-200 px-2">
                                <!-- User -->
                                <a href="{{ route('admin.inbox', ['messageId' => $messages->id]) }}">
                                    <button class="w-full text-left py-2">
                                        <div class="flex items-center">
                                            <img class="rounded-full items-start flex-shrink-0 mr-3" src="{{ asset('storage/' . $messages->user->profile_image) }}" alt='user profile' width="32" height="32" />
                                            <div>
                                                {{-- <h4 class="text-sm font-semibold text-gray-900">{{ $admin->firstname }}</h4> --}}
                                                <div class="text-[13px]">{{ $messages->content }} <span class="text-xs">{{ \Carbon\Carbon::parse($messages->created_at)->format('h:iA') }}</span></div>
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
</x-app-layout>