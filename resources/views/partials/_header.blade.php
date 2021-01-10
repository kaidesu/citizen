<header x-data="{ open: false }" class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex px-2 lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="bg-gray-800 py-1 px-2 border border-transparent rounded font-bold text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                        Citizen
                    </a>
                </div>

                <nav aria-label="Global" class="hidden lg:ml-6 lg:flex lg:items-center lg:space-x-4">
                    <a href="/" class="px-3 py-2 text-gray-900 text-sm font-medium rounded focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        Dashboard
                    </a>

                    <a href="/users" class="px-3 py-2 text-gray-900 text-sm font-medium rounded focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        Users
                    </a>

                    <a href="/applications" class="px-3 py-2 text-gray-900 text-sm font-medium rounded focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                        Applications
                    </a>
                </nav>
            </div>

            <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <!-- Heroicon name: search -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>

                        <input id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white shadow-sm placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-gray-900 focus:border-gray-900 sm:text-sm" placeholder="Search" type="search">
                    </div>
                </div>
            </div>

            <!-- Profile dropdown -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="relative">
                    <div>
                        <button @click="open = ! open" class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900" id="user-menu" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img src="{{ auth()->user()->avatar() }}" class="h-8 w-8 rounded-full">
                            {{-- <span class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-600">{{ auth()->user()->letter }}</span> --}}
                        </button>
                    </div>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        @click="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                        role="menu"
                        aria-orientation="vertical"
                        aria-labelledby="user-menu">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="event.target.closest('form').submit()" class="block px-4 py-2 text-sm text-red-700 hover:bg-red-50" role="menuitem">Sign out</a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                    <span class="sr-only">Open main menu</span>
                    <!--
                    Heroicon name: menu

                    Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <!--
                    Heroicon name: x

                    Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
