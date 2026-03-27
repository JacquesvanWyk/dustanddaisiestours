@aware(['page'])

@php
    $bgClasses = match($background_color ?? 'orange') {
        'dark' => 'bg-ink text-parchment',
        'gray' => 'bg-parchment-dark text-ink',
        'white' => 'bg-parchment text-ink',
        default => 'bg-brand text-parchment',
    };
    $btnClasses = match($background_color ?? 'orange') {
        'dark' => 'border-parchment text-parchment hover:bg-parchment hover:text-ink',
        default => 'border-ink text-ink hover:bg-ink hover:text-parchment',
    };
@endphp

<section class="torn-top torn-bottom {{ $bgClasses }}">
    <div class="max-w-3xl mx-auto px-4 py-28 text-center">
        @if($subheading ?? null)
            <p class="font-handwriting text-2xl mb-2">{{ $subheading }}</p>
        @endif
        <h2 class="text-3xl md:text-5xl font-bold mb-8">{{ $heading ?? '' }}</h2>
        @if($button_text ?? null)
            <a href="{{ $button_link ?? '#' }}" class="btn-stamp text-sm {{ $btnClasses }}">{{ $button_text }}</a>
        @endif
    </div>
</section>
