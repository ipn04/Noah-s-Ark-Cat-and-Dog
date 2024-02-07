<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-3 font-medium">
            <li>
                <a href="https://www.facebook.com/Noahsarkdogandcatshelter"
                    class="flex items-center  mb-6 space-x-3 space-y-2 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo.png') }}" class="h-12 w-12" alt="Noah's Ark Logo">
                    <div class="flex flex-col">
                        <span class="text-xl font-semibold text-slate-700 dark:text-white">Noah's Ark</span>
                        <span class="text-sm text-gray-500 dark:text-gray-300 bottom-6">Dogs and Cat Shelter</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="
                @if (Route::is('admin.dashboard')) flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <svg class="
                    @if (Route::is('admin.dashboard')) flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @else
                    flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            {{-- <li>
            <a href="{{ route('admin.messages') }}" class="
            
                @if (Route::is('admin.messages')) 
                flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @endif">
                <div class = "flex items-center relative">
                    <div class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs pointer-events-none">
                        3 <!-- Replace this number with your dynamic notification count -->
                    </div>
                <svg class="
                    @if (Route::is('admin.messages')) 
                    flex-shrink-0 w-7 h-7 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @else
                    flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @endif" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                </svg>
                </div>
                <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
            </a>
        </li> --}}
            <li>
                <a href="{{ route('chat.index') }}"
                    class="
            
                @if (Route::is('chat.index')) flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <div class = "flex items-center relative">
                        @if (auth()->user()->isAdmin())
                            @if (isset($unreadMessageCount))

                                <div class="@if ($unreadMessageCount == 0) hidden
                        @else absolute top-0 right-0 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs pointer-events-none
                        @endif">
                            {{-- @foreach ($unreadMessageCounts as $user)
                                <p>{{ $user->name }}: {{ $user->messages_count }} unread messages</p>
                            @endforeach<!-- Replace this number with your dynamic notification count --> --}}
                                {{ $unreadMessageCount }}
                            @else
                                {{ 'Variable not set' }} @endif
                        </div>
                    @endif
                <svg class="
                                    @if (Route::is('chat.index')) flex-shrink-0 w-7 h-7 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @else
                    flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                        clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pet.management') }}"
                    class="
            @if (Route::is('admin.pet.management')) flex items-center p-2  hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
            @else
            flex items-center p-2  hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <svg class="       
                @if (Route::is('admin.pet.management')) flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                @else
               flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Pets</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reports') }}"
                    class="
                @if (Route::is('admin.reports')) flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <svg class="
                    @if (Route::is('admin.reports')) flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @else
                    flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M19.906 9c.382 0 .749.057 1.094.162V9a3 3 0 00-3-3h-3.879a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H6a3 3 0 00-3 3v3.162A3.756 3.756 0 014.094 9h15.812zM4.094 10.5a2.25 2.25 0 00-2.227 2.568l.857 6A2.25 2.25 0 004.951 21H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-2.227-2.568H4.094z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Reports</span>
                </a>
            </li>
            <li>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            </li>
            <li>
                <a href="{{ route('admin.adoptions') }}"
                    class="
                @if (Route::is('admin.adoptions')) flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <svg class="
                    @if (Route::is('admin.adoptions')) flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @else
                    flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z" />
                        <path fill-rule="evenodd"
                            d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Adoptions</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.volunteers') }}"
                    class="
                @if (Route::is('admin.volunteers')) flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <svg class="
                    @if (Route::is('admin.volunteers')) flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @else
                    flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11.25 3v4.046a3 3 0 00-4.277 4.204H1.5v-6A2.25 2.25 0 013.75 3h7.5zM12.75 3v4.011a3 3 0 014.239 4.239H22.5v-6A2.25 2.25 0 0020.25 3h-7.5zM22.5 12.75h-8.983a4.125 4.125 0 004.108 3.75.75.75 0 010 1.5 5.623 5.623 0 01-4.875-2.817V21h7.5a2.25 2.25 0 002.25-2.25v-6zM11.25 21v-5.817A5.623 5.623 0 016.375 18a.75.75 0 010-1.5 4.126 4.126 0 004.108-3.75H1.5v6A2.25 2.25 0 003.75 21h7.5z" />
                        <path
                            d="M11.085 10.354c.03.297.038.575.036.805a7.484 7.484 0 01-.805-.036c-.833-.084-1.677-.325-2.195-.843a1.5 1.5 0 012.122-2.12c.517.517.759 1.36.842 2.194zM12.877 10.354c-.03.297-.038.575-.036.805.23.002.508-.006.805-.036.833-.084 1.677-.325 2.195-.843A1.5 1.5 0 0013.72 8.16c-.518.518-.76 1.362-.843 2.194z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Volunteers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.schedule') }}"
                    class="
                @if (Route::is('admin.schedule')) flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <svg class="
                    @if (Route::is('admin.schedule')) flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                    @else
                    flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zM6 12a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V12zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 15a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V15zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM6 18a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V18zm2.25 0a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Schedule</span>
                </a>
            </li>

            <li>
                <a href="{{ route('view.users') }}"
                    class="
                @if (Route::is('view.users')) flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                @else
                flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group @endif">
                    <svg class = "@if (Route::is('view.users')) flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                @else
                flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white @endif"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Registered User</span>
                </a>
            </li>

        </ul>

    </div>
</aside>

<script>
    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        var isAdmin = @json(auth()->user()->isAdmin());
        var isChatIndex = @json(Route::is('chat.index'));
        
        if (isAdmin && isChatIndex) {
            $.ajax({
                url: '{{ route('messages.markAsRead') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken 
                },
                success: function(response) {
                    console.log('Messages marked as read');
                },
                error: function(xhr, status, error) {
                    console.error('Error marking messages as read:', error);
                }
            });
        }
    });
 </script>
 
