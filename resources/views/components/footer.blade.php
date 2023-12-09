<footer class="bg-white p-6 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl text-center">
        <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">© {{ __(date('Y')) }} <a
                class="hover:underline"
                href="{{ route('home') }}"
                wire:navigate>{{ __('Google Developer Student Clubs - University of the East Caloocan') }}</a>{{ __('. All Rights Reserved.') }}</span>
    </div>
</footer>
