<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="{{ csrf_token() }}" name="csrf-token">

        <title>{{ isset($title) ? $title . ' - ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body :class="{ 'dark': darkMode === true }" class="font-sans antialiased" x-data="{ darkMode: $persist(false) }">

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        {{-- @stack('modals') --}}

        @livewireScripts
    </body>
</html>
