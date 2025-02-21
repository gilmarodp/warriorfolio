@aware(['page'])
@props(['title' => $page->title])

@if ($page->is_active)
    <main class="p-8 antialiased">
        <div class="mx-auto flex max-w-screen-xl justify-between">
            <article
                class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-3xl">
                <x-blog.header.breadcrumb :$title />
                <section class="not-format">
                    <p class="py-2 font-mono uppercase">
                        {{ \Carbon\Carbon::parse($page->created_at)->format('F d, Y ') . __('in ') . $page->category->name }}
                    </p>
                    {{-- Title --}}
                    <h1 class="mt-2 text-3xl font-black tracking-tight dark:text-white/90 lg:mb-4 lg:text-4xl">
                        {{ $page->title }}
                    </h1>
                    {{-- Subtitle --}}
                    <h2 class="text-md pb-4 leading-tight tracking-tight">
                        {{ $page->resume }}
                    </h2>
                    {{-- Info --}}
                </section>
                {{-- Profile --}}
                <x-blog.profile :$page />
                <div class="content py-4 font-serif text-xl leading-normal">
                    {!! $page->content !!}
                </div>
                {{-- Article --}}
                <x-blog.post.articles :page="$page" />
            </article>
        </div>
    </main>
    {{-- Not Found --}}
@else
    <x-blog.post.not-found />
@endif
