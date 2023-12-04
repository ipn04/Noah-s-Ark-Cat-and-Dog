<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
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
      </li>
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
       <a href="#" class="flex items-center p-2 my-24  hover:text-gray-800 text-gray-500 rounded-lg  hover:text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
             <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm5.03 4.72a.75.75 0 010 1.06l-1.72 1.72h10.94a.75.75 0 010 1.5H10.81l1.72 1.72a.75.75 0 11-1.06 1.06l-3-3a.75.75 0 010-1.06l3-3a.75.75 0 011.06 0z" clip-rule="evenodd" />
           </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
       </a>
    </div>   
 </aside>
 
 