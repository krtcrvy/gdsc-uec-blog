@props(['asLink' => false])

@if ($asLink)
    <a
        {{ $attributes->merge(['class' => 'rounded-lg px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 lg:px-5 lg:py-2.5']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge(['type' => 'button', 'class' => 'rounded-lg px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800 lg:px-5 lg:py-2.5']) }}>
        {{ $slot }}
    </button>
@endif
