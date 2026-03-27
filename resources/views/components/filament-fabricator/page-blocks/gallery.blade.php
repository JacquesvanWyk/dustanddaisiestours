@aware(['page'])

<section class="bg-parchment py-20" x-data="{
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
    <div class="max-w-6xl mx-auto px-4">
        @if($heading ?? null)
            <div class="text-center mb-12">
                <p class="font-handwriting text-xl text-brand mb-1">From the Field</p>
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="w-16 h-0.5 bg-brand mx-auto mt-4"></div>
            </div>
        @endif
        @if($images ?? null)
            @php $tilts = ['photo-tilt-left', 'photo-tilt-right', 'photo-tilt-slight']; @endphp
            <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                @foreach($images as $i => $item)
                    @php $src = $item['image'] ?? null; @endphp
                    @if($src)
                        <div class="break-inside-avoid washi-tape {{ $tilts[$i % 3] }} cursor-pointer group"
                             @click="show({{ $i }})">
                            <img src="{{ Storage::url($src) }}"
                                 alt="{{ $item['alt'] ?? 'Gallery image ' . ($i + 1) }}"
                                 class="journal-photo w-full object-cover shadow-md transition duration-300 group-hover:sepia-0"
                                 loading="lazy">
                            @if($item['caption'] ?? null)
                                <p class="font-handwriting text-sm text-center mt-2 text-stone-600">{{ $item['caption'] }}</p>
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
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4"
             @click.self="open = false">

            <button @click="open = false" class="absolute top-4 right-4 text-white/70 hover:text-white text-3xl z-10">&times;</button>

            <button @click="prev()" class="absolute left-4 text-white/70 hover:text-white text-4xl z-10 select-none">&lsaquo;</button>
            <button @click="next()" class="absolute right-4 text-white/70 hover:text-white text-4xl z-10 select-none">&rsaquo;</button>

            <div class="max-w-4xl max-h-[85vh] flex flex-col items-center">
                <img :src="src" :alt="alt" class="max-h-[75vh] max-w-full object-contain rounded shadow-2xl">
                <div class="mt-4 text-center">
                    <p x-show="caption" x-text="caption" class="font-handwriting text-lg text-white/90 mb-1"></p>
                    <p class="text-white/50 text-sm" x-text="(current + 1) + ' / ' + total"></p>
                </div>
            </div>
        </div>
    </template>
</section>
