<header x-data="{ isOpen: false }">
    <nav class="border-gray-200 bg-white px-4 py-2.5 dark:bg-gray-800 lg:px-6">
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
                    <x-application-logo class="h-6 w-auto" />
                </a>
            </div>

            <div class="flex items-center justify-center gap-2 lg:order-2">
                @guest()
                    <x-secondary-button :asLink="true" href="{{ route('login') }}"
                        wire:navigate>{{ __('Log in') }}</x-secondary-button>
                    <x-primary-button :asLink="true" href="{{ route('register') }}"
                        wire:navigate>{{ __('Register') }}</x-primary-button>
                @endguest

                @auth()
                    <x-secondary-button :asLink="true" class="inline-flex items-center justify-center gap-2"
                        href="{{ route('filament.admin.resources.posts.create') }}">
                        <svg class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        {{ __('Write') }}</x-secondary-button>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none">
                                    <img alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button
                                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:active:bg-gray-700"
                                        type="button">
                                        {{ Auth::user()->name }}

                                        <svg class="-me-0.5 ms-2 h-4 w-4" fill="none" stroke-width="1.5"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form action="{{ route('logout') }}" method="POST" x-data>
                                @csrf

                                <x-dropdown-link @click.prevent="$root.submit();" href="{{ route('logout') }}">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                <button @click="darkMode=!darkMode"
                    class="rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                    type="button">

                    <span class="sr-only">{{ __('Toggle dark mode') }}</span>

                    <svg class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-cloak x-show="darkMode" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <svg class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        x-cloak x-show="!darkMode" xmlns="http://www.w3.org/2000/svg">
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
                        <x-nav-link :active="request()->routeIs('posts.index')" href="{{ route('posts.index') }}"
                            wire:navigate>{{ __('Blog') }}</x-nav-link>
                    </li>
                    <li>
                        <x-nav-link :active="request()->routeIs('about')" href="{{ route('about') }}"
                            wire:navigate>{{ __('About') }}</x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
