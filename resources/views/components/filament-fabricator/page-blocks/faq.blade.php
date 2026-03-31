@aware(['page'])

<section class="section-shell">
    <div class="max-w-5xl mx-auto px-6">
        <div class="section-header max-w-3xl">
            <span class="eyebrow">{{ $eyebrow ?? 'Practical details' }}</span>
            @if ($heading ?? null)
                <h2 class="section-title">{{ $heading }}</h2>
            @endif
            <div class="section-divider"></div>
        </div>

        @if ($items ?? null)
            <div class="mt-12 section-bleed p-6 md:p-10">
                @foreach ($items as $i => $item)
                    <div x-data="{ open: {{ $i === 0 ? 'true' : 'false' }} }" class="faq-item">
                        <button @click="open = !open" class="faq-trigger">
                            <span class="faq-index">{{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</span>
                            <span>
                                <h3 class="text-2xl md:text-3xl leading-none">{{ $item['question'] ?? '' }}</h3>
                            </span>
                            <span class="faq-icon" :class="open ? 'bg-brand text-white border-brand' : ''">
                                <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-45' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M12 5v14M5 12h14"/></svg>
                            </span>
                        </button>
                        <div x-show="open" x-collapse class="pb-6 pl-[3.2rem] pr-4 text-[0.98rem] leading-8 text-ink/68">
                            {{ $item['answer'] ?? '' }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
