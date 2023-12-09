@props(['asLink' => false])

@if ($asLink)
    <a
        {{ $attributes->merge(['class' => 'rounded-lg bg-primary-700 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 lg:px-5 lg:py-2.5']) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-lg bg-primary-700 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 lg:px-5 lg:py-2.5']) }}>
        {{ $slot }}
    </button>
@endif
