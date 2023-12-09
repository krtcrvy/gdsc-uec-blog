@props(['active'])

@php
    $classes = $active ?? false ? 'block rounded bg-primary-700 py-2 pl-3 pr-4 text-white dark:text-white lg:bg-transparent lg:p-0 lg:text-primary-700' : 'block border-b border-gray-100 py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:border-0 lg:p-0 lg:hover:bg-transparent lg:hover:text-primary-700 lg:dark:hover:bg-transparent lg:dark:hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
