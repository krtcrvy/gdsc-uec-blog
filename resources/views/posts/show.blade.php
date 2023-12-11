<x-app-layout>
    <x-header/>
    <main class="bg-white pb-16 pt-8 antialiased dark:bg-gray-900 lg:pb-24 lg:pt-16">
        @if(session()->has('success'))
            <div class="max-w-2xl mx-auto mb-6">
                <x-success-alert/>
            </div>
        @endif
        <div class="mx-auto flex max-w-screen-xl justify-between px-4">
            <article
                class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-2xl">
                <header class="not-format mb-4 lg:mb-6">
                    <address class="mb-6 flex items-center not-italic">
                        <div class="mr-3 inline-flex items-center text-sm text-gray-900 dark:text-white">
                            <img alt="{{ Auth::user()->profile_name }}" class="mr-4 h-16 w-16 rounded-full"
                                 src="{{ Auth::user()->profile_photo_url }}">
                            <div>
                                <a class="text-xl font-bold text-gray-900 dark:text-white" href="#" rel="author">
                                    {{ Auth::user()->name }}
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ Auth::user()->email }}
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

                <div
                    class="prose dark:prose-invert sm:prose-sm md:prose-base lg:prose-lg prose-img:rounded-lg">
                    {!! $post_content !!}
                </div>
            </article>
        </div>
    </main>

    <x-footer/>
</x-app-layout>
