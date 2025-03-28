@aware(['page'])
@props([
    'is_active' => true,
    'heading' => null,
    'content' => null,
    'is_center' => false,
    'heading_text_size' => 'text-3xl',
    'content_text_size' => 'text-xl',
    'image' => null,
])

@if ($is_active)
    <x-core.layout>
        <div class="{{ $is_center ? 'text-center' : 'text-left' }} mx-auto max-w-screen-xl">
            <div id="heading-component">
                <div class="mx-auto grid py-6 lg:grid-cols-12 lg:gap-8">
                    <div class="{{ $image ? 'col-span-7' : 'col-span-full' }}">
                        @if ($heading)
                            <h2 class="heading-module-title {{ $heading_text_size }} mb-8 font-bold tracking-tighter">
                                {!! $heading !!}
                            </h2>
                        @endif
                        @if ($content)
                            <div class="heading-module-subtitle {{ $content_text_size }} mb-4 font-light">
                                {!! $content !!}
                            </div>
                        @endif
                    </div>
                    @if ($image)
                        <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
                            <img src="{{ asset('storage/' . $image) }}" />
                        </div>
                    @endif
                </div>
            </div>
    </x-core.layout>
@endif
