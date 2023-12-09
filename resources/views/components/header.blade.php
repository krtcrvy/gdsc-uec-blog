<header x-data="{ isOpen: false }">
    <nav class="fixed w-full border-gray-200 bg-white px-4 py-2.5 dark:bg-gray-800 lg:px-6" id="main-nav">
        <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between">
            <div class="mr-8 flex items-center justify-center gap-2">
                <button @click="isOpen = !isOpen"
                    class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 lg:hidden"
                    type="button">

                    <span class="sr-only">{{ __('Open main menu') }}</span>
                    <svg class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <a class="flex items-center gap-2" href="{{ route('home') }}" wire:navigate>
                    <x-application-logo />
                </a>
            </div>

            <div class="flex items-center justify-center gap-2 lg:order-2">
                <x-secondary-button :asLink="true" href="{{ route('login') }}"
                    wire:navigate>{{ __('Log in') }}</x-secondary-button>
                <x-primary-button :asLink="true" href="{{ route('register') }}"
                    wire:navigate>{{ __('Register') }}</x-primary-button>
                <button @click="darkMode=!darkMode"
                    class="rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                    type="button">

                    <span class="sr-only">{{ __('Toggle dark mode') }}</span>

                    <svg class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="darkMode" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <svg class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-show="!darkMode" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
            </div>
            <div :class="isOpen ? 'show' : 'hidden'"
                class="mr-auto w-full items-center justify-between lg:order-1 lg:flex lg:w-auto" x-cloak>
                <ul class="mt-4 flex flex-col font-medium lg:mt-0 lg:flex-row lg:space-x-8">
                    <li>
                        <x-nav-link :active="request()->routeIs('home')" href="{{ route('home') }}"
                            wire:navigate>{{ __('Home') }}</x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :active="request()->routeIs('about')" href="#">{{ __('About') }}</x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
