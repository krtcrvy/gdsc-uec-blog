<x-app-layout>
    <x-slot name="title">
        {{ __('Blog') }}
    </x-slot>
    <x-header/>
    <livewire:blog-grid/>
    <x-footer/>
</x-app-layout>
