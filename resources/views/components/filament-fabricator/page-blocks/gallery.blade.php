@aware(['page'])

@php
    $galleryImages = collect($images ?? [])->filter(fn ($item) => $item['image'] ?? null)->values();
@endphp

<section
    class="section-shell"
    x-data="{
        open: false,
        current: 0,
        images: {{ Js::from($galleryImages) }},
        get total() { return this.images.length },
        get src() { return this.images[this.current]?.image ? '/storage/' + this.images[this.current].image : '' },
        get alt() { return this.images[this.current]?.alt || 'Gallery image' },
        get caption() { return this.images[this.current]?.caption || '' },
        show(i) { this.current = i; this.open = true },
        next() { this.current = (this.current + 1) % this.total },
        prev() { this.current = (this.current - 1 + this.total) % this.total },
    }"
    @keydown.escape.window="open = false"
    @keydown.right.window="open && next()"
    @keydown.left.window="open && prev()"
>
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-header lg:grid lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
            <div>
                <span class="eyebrow">{{ $eyebrow ?? 'Archive of place' }}</span>
                @if ($heading ?? null)
                    <h2 class="section-title mt-5">{{ $heading }}</h2>
                @endif
            </div>
            <p class="section-copy lg:justify-self-end">
                {{ $intro ?? 'A visual record of stone, flora, weather, trails and the slower textures of the Northern Cape. Open any frame for a closer look.' }}
            </p>
        </div>

        @if ($galleryImages->isNotEmpty())
            <div class="gallery-grid mt-14">
                @foreach ($galleryImages as $i => $item)
                    @php
                        $layout = match ($i % 6) {
                            0 => 'md:col-span-7 md:row-span-2 min-h-[26rem]',
                            1 => 'md:col-span-5 min-h-[18rem]',
                            2 => 'md:col-span-5 min-h-[18rem]',
                            3 => 'md:col-span-7 min-h-[24rem]',
                            4 => 'md:col-span-4 min-h-[18rem]',
                            default => 'md:col-span-8 min-h-[20rem]',
                        };
                    @endphp
                    <button type="button" class="gallery-item {{ $layout }}" @click="show({{ $i }})">
                        <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['alt'] ?? 'Gallery image '.($i + 1) }}" loading="lazy">
                        <div class="gallery-caption">
                            <p>Frame {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</p>
                            <strong>{{ $item['caption'] ?: ($item['alt'] ?? 'Namaqualand') }}</strong>
                        </div>
                    </button>
                @endforeach
            </div>
        @endif
    </div>

    <template x-teleport="body">
        <div x-show="open" x-transition.opacity.duration.200ms class="fixed inset-0 z-50 bg-ink/95 backdrop-blur-sm p-4 md:p-8" @click.self="open = false">
            <div class="h-full max-w-6xl mx-auto grid lg:grid-cols-[1fr_22rem] gap-6 items-center">
                <div class="relative">
                    <button @click="open = false" class="absolute top-4 right-4 z-10 w-11 h-11 border border-white/16 bg-ink/35 text-white">×</button>
                    <img :src="src" :alt="alt" class="w-full max-h-[78vh] object-contain shadow-2xl bg-black/20">
                </div>
                <div class="glass-panel p-6 md:p-8 text-white">
                    <p class="text-[0.68rem] font-extrabold uppercase tracking-[0.22em] text-white/50">Field frame</p>
                    <h3 x-text="caption || alt" class="mt-4 text-3xl leading-none"></h3>
                    <p class="mt-6 text-sm uppercase tracking-[0.18em] text-white/42" x-text="String(current + 1).padStart(2, '0') + ' / ' + String(total).padStart(2, '0')"></p>
                    <div class="mt-8 flex gap-3">
                        <button @click="prev()" class="btn-outline text-white border-white/14 bg-white/5 hover:bg-white/12">Prev</button>
                        <button @click="next()" class="btn-primary">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</section>
