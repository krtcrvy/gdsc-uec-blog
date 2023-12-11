<x-app-layout>
    <x-header />
    <main class="bg-white pb-16 pt-8 antialiased dark:bg-gray-900 lg:pb-24 lg:pt-16">
        @if (session()->has('success'))
            <div class="mx-auto mb-6 max-w-2xl">
                <x-success-alert />
            </div>
        @endif
        <div class="mx-auto flex max-w-screen-xl justify-between px-4">
            <article
                class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-2xl">
                <header class="not-format mb-4 lg:mb-6">
                    <address class="mb-6 flex items-center not-italic">
                        <div class="mr-3 inline-flex items-center text-sm text-gray-900 dark:text-white">
                            <img alt="{{ $post->user->name }}" class="mr-4 h-16 w-16 rounded-full"
                                src="{{ $post->user->profile_photo_url }}">
                            <div>
                                <a class="text-xl font-bold text-gray-900 dark:text-white" href="#"
                                    rel="author">
                                    {{ $post->user->name }}
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ $post->user->email }}
                                </p>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 dark:text-white lg:mb-6 lg:text-4xl">
                        {{ $post->title }}
                    </h1>


                    <img alt="{{ $post->title }}" class="mb-4 rounded-lg" src="{{ $post->post_image_path }}">

                </header>

                <div class="prose dark:prose-invert sm:prose-sm md:prose-base lg:prose-lg prose-img:rounded-lg">
                    {!! $post->body !!}
                </div>
            </article>
        </div>
    </main>

    <x-footer />
</x-app-layout>
