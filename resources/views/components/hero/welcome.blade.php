@props([
    'profile'       => '',
    'welcomeText'   => "'building the what's next with laravel + filament'", // default message
    'subTitleText'  => "'Open Source Portfolio Landing Page System'" // default message
 ])

{{-- Hero Section --}}
<div class="w-full grid justify-center text-center">

{{--Welcome Text--}}
    <div class="text-center lowercase font-bold text-2xl mt-16 leading-tight tracking-tight md:tracking-tighter md:text-4xl md:mt-24 lg:text-6xl lg:mt-36">
        {!! html_entity_decode($welcomeText)  !!}
    </div>

{{--Sub-title Text--}}
    <div class="mt-3 md:mt-8 lowercase">
        {{ $subTitleText  }}
    </div>

{{--Hero Button --}}
    <div class="mt-10 flex items-center justify-center gap-4 lowercase">
        <a href="#contact" class="bg-orange-500 rounded-sm text-white py-2 px-4 hover:shadow-lg hover:bg-orange-400 transition-all duration-200">
            get in touch
        </a>

    {{-- Visit me on linkedin --}}
    @if ($profile->linkedin_link !== null)
    <div>
        <a href="{{ $profile->linkedin_link }}" target="_blank" class="text-zinc-300 hover:text-orange-400 transition-all duration-200">
            or visit me on linkedin
        </a>
    </div>
    @endif

</div>
