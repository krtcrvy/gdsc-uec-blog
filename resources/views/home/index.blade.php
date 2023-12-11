<x-app-layout>
    <x-slot name="title">
        {{ __('Home') }}
    </x-slot>

    <x-header/>

    <x-home.hero-section/>

    <livewire:blog-grid/>

    <x-footer/>
</x-app-layout>
