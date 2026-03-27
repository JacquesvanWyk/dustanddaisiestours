@aware(['page'])

<section class="relative min-h-[90vh] flex items-end">
    @if($image ?? null)
        <div class="absolute inset-0">
            <img src="{{ Storage::url($image) }}" alt="{{ $heading ?? '' }}" class="w-full h-full object-cover">
            <div class="hero-overlay absolute inset-0"></div>
        </div>
    @else
        <div class="absolute inset-0 bg-ink/5"></div>
    @endif
    <div class="relative z-10 max-w-7xl mx-auto px-6 pb-24 w-full">
        @if($subheading ?? null)
            <p class="font-accent text-3xl md:text-4xl text-brand mb-3 animate-fade-up">{{ $subheading }}</p>
        @endif
        <h1 class="text-5xl md:text-7xl font-bold leading-[1.05] mb-8 text-ink animate-fade-up delay-100 max-w-3xl">
            {!! nl2br(e($heading ?? '')) !!}
        </h1>
        @if($cta_text ?? null)
            <div class="animate-fade-up delay-200">
                <a href="{{ $cta_link ?? '#' }}" class="btn-primary">{{ $cta_text }}</a>
            </div>
        @endif
    </div>
</section>
