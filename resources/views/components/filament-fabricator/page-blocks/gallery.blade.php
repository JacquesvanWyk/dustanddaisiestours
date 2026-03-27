@aware(['page'])

<section class="bg-sand py-24" x-data="{
    open: false,
    current: 0,
    images: {{ Js::from(collect($images ?? [])->filter(fn($i) => $i['image'] ?? null)->values()) }},
    get total() { return this.images.length },
    get src() { return this.images[this.current]?.image ? '/storage/' + this.images[this.current].image : '' },
    get alt() { return this.images[this.current]?.alt || 'Gallery image' },
    get caption() { return this.images[this.current]?.caption || '' },
    show(i) { this.current = i; this.open = true },
    next() { this.current = (this.current + 1) % this.total },
    prev() { this.current = (this.current - 1 + this.total) % this.total },
}" @keydown.escape.window="open = false" @keydown.right.window="open && next()" @keydown.left.window="open && prev()">
    <div class="max-w-7xl mx-auto px-6">
        @if($heading ?? null)
            <div class="text-center mb-14">
                <h2 class="font-accent text-4xl md:text-5xl text-brand">{{ $heading }}</h2>
                <div class="section-divider mt-4"></div>
            </div>
        @endif
        @if($images ?? null)
            <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                @foreach($images as $i => $item)
                    @php $src = $item['image'] ?? null; @endphp
                    @if($src)
                        <div class="break-inside-avoid gallery-item" @click="show({{ $i }})">
                            <img src="{{ Storage::url($src) }}"
                                 alt="{{ $item['alt'] ?? 'Gallery image ' . ($i + 1) }}"
                                 class="w-full object-cover"
                                 loading="lazy">
                            @if($item['caption'] ?? null)
                                <p class="absolute bottom-0 left-0 right-0 p-3 text-white text-sm font-accent text-lg z-10 opacity-0 group-hover:opacity-100 transition">{{ $item['caption'] }}</p>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    {{-- Lightbox --}}
    <template x-teleport="body">
        <div x-show="open" x-transition.opacity.duration.200ms
             class="fixed inset-0 z-50 flex items-center justify-center bg-ink/95 backdrop-blur-sm p-4"
             @click.self="open = false">

            <button @click="open = false" class="absolute top-6 right-6 text-sand/60 hover:text-white text-2xl z-10 w-10 h-10 flex items-center justify-center border border-sand/20 hover:border-sand/40 transition">&times;</button>

            <button @click="prev()" class="absolute left-6 text-sand/60 hover:text-white text-3xl z-10 w-12 h-12 flex items-center justify-center border border-sand/20 hover:border-sand/40 transition">&lsaquo;</button>
            <button @click="next()" class="absolute right-6 text-sand/60 hover:text-white text-3xl z-10 w-12 h-12 flex items-center justify-center border border-sand/20 hover:border-sand/40 transition">&rsaquo;</button>

            <div class="max-w-5xl max-h-[85vh] flex flex-col items-center">
                <img :src="src" :alt="alt" class="max-h-[75vh] max-w-full object-contain shadow-2xl">
                <div class="mt-5 text-center">
                    <p x-show="caption" x-text="caption" class="font-accent text-xl text-sand/80 mb-1"></p>
                    <p class="text-sand/30 text-xs uppercase tracking-widest" x-text="(current + 1) + ' / ' + total"></p>
                </div>
            </div>
        </div>
    </template>
</section>
