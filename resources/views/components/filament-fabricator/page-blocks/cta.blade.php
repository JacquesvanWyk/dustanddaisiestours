@aware(['page'])

@php
    $bgClasses = match($background_color ?? 'orange') {
        'orange' => 'bg-[#E87524] text-white',
        'dark' => 'bg-gray-900 text-white',
        'gray' => 'bg-gray-100 text-gray-900',
        default => 'bg-white text-gray-900',
    };
    $btnClasses = match($background_color ?? 'orange') {
        'orange' => 'bg-white text-[#E87524] hover:bg-gray-100',
        'dark' => 'bg-[#E87524] text-white hover:bg-[#d4691f]',
        default => 'bg-[#E87524] text-white hover:bg-[#d4691f]',
    };
@endphp

<section class="{{ $bgClasses }} py-20">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>

        @if($subheading ?? null)
            <p class="mt-4 text-lg opacity-90 max-w-2xl mx-auto">{{ $subheading }}</p>
        @endif

        <a href="{{ $button_link }}"
           class="mt-8 inline-block px-8 py-3 font-semibold rounded-lg transition-colors {{ $btnClasses }}">
            {{ $button_text }}
        </a>
    </div>
</section>
