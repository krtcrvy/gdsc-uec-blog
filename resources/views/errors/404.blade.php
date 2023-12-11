<x-app-layout>
    <x-header/>
    <section class="flex h-screen flex-col items-center justify-center bg-white text-center dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto max-w-screen-sm">
                <h1
                    class="mb-4 text-7xl font-extrabold tracking-tight text-primary-600 dark:text-primary-500 lg:text-9xl">
                    {{ __('404') }}</h1>
                <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">{{ __('Something\'s
                    missing.') }}</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">{{ __('Sorry, we can\'t find that page.
                    You\'ll find lots to explore on the home page.') }} </p>
                <x-primary-button :asLink="true" href="{{ route('home') }}" wire:navigate>{{ __('Back
                    to Homepage') }}</x-primary-button>
            </div>
        </div>
    </section>
    <x-footer/>
</x-app-layout>
