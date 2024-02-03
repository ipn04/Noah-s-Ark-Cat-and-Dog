
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-3 font-medium">
            <li>
                <a href="https://www.facebook.com/Noahsarkdogandcatshelter" class="flex items-center  mb-6 space-x-3 space-y-2 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo.png') }}" class="h-12 w-12" alt="Noah's Ark Logo">
                <div class="flex flex-col">
                    <span class="text-xl font-semibold text-slate-700 dark:text-white">Noah's Ark</span>
                    <span class="text-sm text-gray-500 dark:text-gray-300 bottom-6">Dogs and Cat Shelter</span>
                </div>
                </a>
            </li>
            <li>
                <a href="{{ route('user.dashboard') }}" class="
                    @if(Route::is('user.dashboard')) 
                    flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @else
                    flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @endif">
                    <svg class="
                        @if(Route::is('user.dashboard')) 
                        flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @else
                        flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @endif" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('chat.index') }}" class="
                
                    @if(Route::is('chat.index')) 
                    flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @else
                    flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @endif">
                    <div class = "flex items-center relative">
                        @if (auth()->user()->isUser())
                            <div class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs pointer-events-none">
                                @if(isset($unreadMessageCount))
                                    {{ $unreadMessageCount }}
                                @else
                                    {{ 'Variable not set' }}
                                @endif
                            </div>
                        @endif
                    <svg class="
                        @if(Route::is('chat.index')) 
                        flex-shrink-0 w-7 h-7 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @else
                        flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @endif" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                    </svg>
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('user.messages') }}" class="
                    @if(Route::is('user.messages')) 
                    flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @else
                    flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @endif">
                
                    <svg class="
                            @if(Route::is('user.messages')) 
                            flex-shrink-0 w-6 h-6 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                            @else
                            flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                            @endif" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                        </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                </a>                      
            </li> --}}
            {{-- <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 @if(Route::is('user.messages')) 
                        flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        @else
                        flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                        @endif" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="
                            @if(Route::is('user.messages')) 
                            flex-shrink-0 w-6 h-6 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                            @else
                            flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                            @endif" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Messages</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2 ml-4">
                      <li>
                        <a href="{{ route('user.messages') }}" class="
                            @if(Route::is('user.messages')) 
                            flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                            @else
                            flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                            @endif">
                        
                            <svg class="@if(Route::is('user.messages')) 
                            flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                            @else
                            flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                            @endif"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="10" y1="14" x2="21" y2="3" />  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Send Message</span>
                        </a>                      
                        </li>
                        <li>
                            <a href="{{ route('view.messages') }}" class="
                                @if(Route::is('view.messages')) 
                                flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                                @else
                                flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                                @endif">
                            
                                <svg class="@if(Route::is('view.messages')) 
                                flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                                @else
                                flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                                @endif"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="10" y1="14" x2="21" y2="3" />  <path d="M21 3L14.5 21a.55 .55 0 0 1 -1 0L10 14L3 10.5a.55 .55 0 0 1 0 -1L21 3" /></svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                            </a>                             
                        </li>
                </ul>
            </li> --}}
            {{-- <li>
                <a href="{{ route('user.messages') }}" class="
                    @if(Route::is('user.messages')) 
                    flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @else
                    flex items-center p-2 text-gray-500 rounded-lg hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @endif">
                    <svg class="
                        @if(Route::is('user.messages')) 
                        flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @else
                        flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @endif" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z" clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Messages</span>
                </a>
            </li> --}}
            
            <li>
                <a href="{{ route('user.applications') }}" class="
                    @if(Route::is('user.applications')) 
                    flex items-center p-2 hover:text-gray-800 text-red-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @else
                    flex items-center p-2 hover:text-gray-800 text-gray-500 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    @endif">
                    <svg class="
                        @if(Route::is('user.applications')) 
                        flex-shrink-0 w-5 h-5 text-red-600 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @else
                        flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-800 dark:group-hover:text-white
                        @endif" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.906 9c.382 0 .749.057 1.094.162V9a3 3 0 00-3-3h-3.879a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H6a3 3 0 00-3 3v3.162A3.756 3.756 0 014.094 9h15.812zM4.094 10.5a2.25 2.25 0 00-2.227 2.568l.857 6A2.25 2.25 0 004.951 21H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-2.227-2.568H4.094z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Applications</span>
                </a>
            </li>
        </ul>
    </div>   
 </aside>
 
 