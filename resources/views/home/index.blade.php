<x-app-layout>
    <x-slot name="title">
        {{ __('Home') }}
    </x-slot>

    <x-header />

    <x-home.hero-section />

    <x-home.blog-section />

    <x-footer />
</x-app-layout>
