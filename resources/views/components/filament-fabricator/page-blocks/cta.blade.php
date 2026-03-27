@aware(['page'])

@php
    $bgClasses = match($background_color ?? 'orange') {
        'dark' => 'bg-ink text-sand',
        'gray' => 'bg-sand-dark text-ink',
        'white' => 'bg-sand text-ink',
        default => 'bg-brand text-white',
    };
@endphp

<section class="{{ $bgClasses }} relative overflow-hidden">
    <div class="absolute inset-0 bg-grain pointer-events-none"></div>
    <div class="max-w-4xl mx-auto px-6 py-28 text-center relative z-10">
        @if($subheading ?? null)
            <p class="font-accent text-3xl mb-3 opacity-90">{{ $subheading }}</p>
        @endif
        <h2 class="text-3xl md:text-5xl font-bold mb-10 leading-tight">{{ $heading ?? '' }}</h2>
        @if($button_text ?? null)
            @php
                $btnClass = match($background_color ?? 'orange') {
                    'dark' => 'btn-primary',
                    default => 'bg-white text-brand uppercase tracking-[0.12em] text-[0.8rem] font-semibold py-3.5 px-10 inline-block hover:bg-sand transition-all hover:-translate-y-0.5 hover:shadow-lg',
                };
            @endphp
            <a href="{{ $button_link ?? '#' }}" class="{{ $btnClass }}">{{ $button_text }}</a>
        @endif
    </div>
</section>
