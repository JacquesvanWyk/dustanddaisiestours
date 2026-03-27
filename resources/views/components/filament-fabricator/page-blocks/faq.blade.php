@aware(['page'])

<section class="bg-sand py-24">
    <div class="max-w-3xl mx-auto px-6">
        @if($heading ?? null)
            <div class="text-center mb-16">
                <p class="font-accent text-2xl text-brand mb-2">Common Questions</p>
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="section-divider mt-5"></div>
            </div>
        @endif
        @if($items ?? null)
            <div class="space-y-0">
                @foreach($items as $i => $item)
                    <div x-data="{ open: false }" class="faq-item py-6">
                        <button @click="open = !open" class="w-full flex justify-between items-center text-left gap-4">
                            <h3 class="text-lg font-semibold">{{ $item['question'] ?? '' }}</h3>
                            <div class="w-8 h-8 flex items-center justify-center shrink-0 border border-ink/10 transition" :class="open && 'bg-brand border-brand'">
                                <svg class="w-4 h-4 transition-all" :class="open ? 'rotate-45 text-white' : 'text-brand'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
                            </div>
                        </button>
                        <div x-show="open" x-collapse class="mt-4 text-ink/60 leading-relaxed text-[0.95rem] pr-12">
                            {{ $item['answer'] ?? '' }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
