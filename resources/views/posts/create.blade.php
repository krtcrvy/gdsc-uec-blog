<x-app-layout>
    <x-header/>
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-3xl px-4 py-8 lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('Tell your story') }}</h2>
            <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <x-label for="title" value="{{ __('Title') }}"/>
                        <x-input :value="old('title')" autofocus id="title" name="title" required type="text"/>
                        <x-input-error class="mt-2" for="title"/>
                    </div>
                    
                    <div class="sm:col-span-2">

                        <div class="flex w-full items-center justify-center">
                            <label
                                class="dark:hover:bg-bray-800 flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                for="dropzone-file">
                                <div class="flex flex-col items-center justify-center pb-6 pt-5">

                                    <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" fill="none"
                                         stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">{{ __('Click to upload') }}</span>
                                        {{ __('or drag and drop') }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ __('SVG, PNG, JPG or GIF (MAX FILE SIZE: 5MB)') }}
                                    </p>
                                </div>
                                <input class="hidden" id="dropzone-file" name="post_image_path" type="file"/>
                            </label>
                        </div>

                    </div>
                    <div class="sm:col-span-2">
                        <x-label for="body" value="{{ __('Body') }}"/>
                        <textarea id="markdown-editor" name="body"></textarea>
                        <x-input-error class="mt-2" for="body"/>
                    </div>
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Create Post') }}
                </x-primary-button>
            </form>
        </div>
    </section>

    <x-footer/>
</x-app-layout>
