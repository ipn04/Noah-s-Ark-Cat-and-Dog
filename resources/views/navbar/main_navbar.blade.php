<nav class=" shadow-md bg-white dark:bg-gray-900 fixed w-full z-40 top-0 start-0   ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://www.facebook.com/Noahsarkdogandcatshelter" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('images/logo.png') }}" class="h-12 w-12" alt="Noah's Ark Logo">
      <div class="flex flex-col">
        <span class="text-xl font-semibold text-slate-700 dark:text-white">Noah's Ark</span>
        <span class="text-sm text-gray-500 dark:text-gray-300">Dogs and Cat Shelter</span>
      </div>
    </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
    
    <a href="{{ route('login') }}" class="text-white bg-red-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Login
    </a>

      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="{{ route('home')}}" class="
        @if(Route::is('home')) 
        block py-2 px-3 text-white md:text-red-700 rounded bg-red-700 hover:text-white  md:bg-transparent hover:bg-red-600 md:hover:bg-transparent  md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @else 
        block py-2 px-3 text-slate-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @endif" >Home</a>
      </li>
      <li>
        <a href="{{ route('about')}}" class="
        @if(Route::is('about')) 
        block py-2 px-3 text-white md:text-red-700 rounded bg-red-700 hover:text-white  md:bg-transparent hover:bg-red-600 md:hover:bg-transparent  md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @else 
        block py-2 px-3 text-slate-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @endif">About Us</a>
      </li>
      <li>
        <a href="{{ route('pets')}}" class="
        @if(Route::is('pets')) 
        block py-2 px-3 text-white md:text-red-700 rounded bg-red-700 hover:text-white  md:bg-transparent hover:bg-red-600 md:hover:bg-transparent  md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @else 
        block py-2 px-3 text-slate-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @endif">Pets</a>
      </li>
      <li>
        <a href="{{ route('how')}}" class="
        @if(Route::is('how')) 
        block py-2 px-3 text-white md:text-red-700 rounded bg-red-700 hover:text-white  md:bg-transparent hover:bg-red-600 md:hover:bg-transparent  md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @else 
        block py-2 px-3 text-slate-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @endif">How can I Help</a>
        
      </li>
      <li>
        <a href="{{ route('contact')}}" class="
        @if(Route::is('contact')) 
        block py-2 px-3 text-white md:text-red-700 rounded bg-red-700 hover:text-white  md:bg-transparent hover:bg-red-600 md:hover:bg-transparent  md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @else 
        block py-2 px-3 text-slate-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700
        @endif">Contact</a>
        
      </li>
    </ul>
  </div>
  </div>
</nav>