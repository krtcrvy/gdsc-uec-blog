<section class="bg-white dark:bg-gray-900" wire:poll>
    <div class="mx-auto max-w-screen-xl px-4 py-32 lg:px-6">
        <div class="mx-auto mb-8 flex max-w-screen-sm flex-col items-center justify-center text-center lg:mb-16">
            <img alt="logo" class="h-32 w-32" src="{{ asset('/images/favicon/logo.svg') }}">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl">
                {{ __('GDSC UE Caloocan Blog') }}
            </h2>
            <p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">
                {{ __('Read our latest articles and tutorials.') }}
            </p>
        </div>
        <div class="grid gap-8 lg:grid-cols-2">
            @foreach ($posts as $post)
                <article
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="mb-5 flex items-center justify-between text-gray-500">
                        @foreach ($post->tags as $tag)
                            <span
                                class="inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 h-3 w-3" fill="none" stroke-width="1.5" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                {{ $tag->name }}
                            </span>
                        @endforeach
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="{{ route('posts.show', $post) }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="prose mb-5 dark:prose-invert">
                        {{ Illuminate\Support\Str::limit(strip_tags($post->body), 200) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <img alt="Jese Leos avatar" class="h-7 w-7 rounded-full"
                                 src="{{ $post->user->profile_photo_url }}"/>
                            <span class="font-medium dark:text-white">
                                {{ $post->user->name }}
                            </span>
                        </div>
                        <a class="inline-flex items-center font-medium text-primary-600 hover:underline dark:text-primary-500"
                           href="{{ route('posts.show', $post) }}" wire:navigate>
                            {{ __('Read more') }}
                            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-16 text-gray-900 dark:text-white">
            {{ $posts->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</section>
