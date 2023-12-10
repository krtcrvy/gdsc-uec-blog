<section class="bg-white dark:bg-gray-900">
    <div class="mx-auto max-w-6xl px-4 py-8 lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
        <form action="#">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <x-label for="title" value="{{ __('Title') }}" />
                    <x-input :value="old('title')" autofocus id="title" name="title" required type="text" />
                </div>

                <div class="sm:col-span-2">
                    <x-label for="body" value="{{ __('Body') }}" />
                    <livewire:trix>
                </div>
            </div>
            <x-primary-button class="mt-4" wire:click="save">
                {{ __('Create Post') }}
            </x-primary-button>
        </form>
    </div>
</section>
