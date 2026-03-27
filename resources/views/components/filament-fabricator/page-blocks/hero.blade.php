@aware(['page'])

<section class="relative min-h-[85vh] flex items-end">
    @if($image ?? null)
        <div class="absolute inset-0">
            <img src="{{ Storage::url($image) }}" alt="{{ $heading ?? '' }}" class="w-full h-full object-cover journal-photo">
            <div class="hero-overlay absolute inset-0"></div>
        </div>
    @endif
    <div class="relative z-10 max-w-6xl mx-auto px-4 pb-20 w-full">
        @if($subheading ?? null)
            <p class="font-handwriting text-2xl text-brand mb-2">{{ $subheading }}</p>
        @endif
        <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6 text-ink">
            {!! nl2br(e($heading ?? '')) !!}
        </h1>
        @if($cta_text ?? null)
            <div class="flex flex-wrap gap-4">
                <a href="{{ $cta_link ?? '#' }}" class="btn-stamp text-sm">{{ $cta_text }}</a>
            </div>
        @endif
    </div>
</section>
