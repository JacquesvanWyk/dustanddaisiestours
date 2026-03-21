@aware(['page'])

<section class="relative min-h-[70vh] flex items-center bg-gray-50">
    @if($image ?? null)
        <div class="absolute inset-0">
            <img src="{{ Storage::url($image) }}" alt="{{ $heading }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
    @endif

    <div class="relative z-10 max-w-5xl mx-auto px-6 py-24 {{ ($image ?? null) ? 'text-white' : 'text-gray-900' }}">
        <h1 class="text-5xl md:text-6xl font-bold leading-tight">{{ $heading }}</h1>

        @if($subheading ?? null)
            <p class="mt-4 text-xl md:text-2xl max-w-2xl opacity-90">{{ $subheading }}</p>
        @endif

        @if($cta_text ?? null)
            <a href="{{ $cta_link ?? '#' }}"
               class="mt-8 inline-block px-8 py-3 bg-[#E87524] text-white font-semibold rounded-lg hover:bg-[#d4691f] transition-colors">
                {{ $cta_text }}
            </a>
        @endif
    </div>
</section>
