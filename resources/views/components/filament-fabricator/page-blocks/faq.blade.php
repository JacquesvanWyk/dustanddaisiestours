@aware(['page'])

<section class="bg-parchment py-20">
    <div class="max-w-3xl mx-auto px-4">
        @if($heading ?? null)
            <div class="text-center mb-12">
                <p class="font-handwriting text-xl text-brand mb-1">Common Questions</p>
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="w-16 h-0.5 bg-brand mx-auto mt-4"></div>
            </div>
        @endif
        @if($items ?? null)
            <div class="space-y-4 margin-line pl-6 ruled-bg">
                @foreach($items as $i => $item)
                    <div x-data="{ open: false }" class="border-b border-ink/10 pb-4">
                        <button @click="open = !open" class="w-full flex justify-between items-center text-left">
                            <h3 class="text-lg font-bold">{{ $item['question'] ?? '' }}</h3>
                            <svg class="w-5 h-5 text-brand shrink-0 transition-transform" :class="open && 'rotate-180'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-3 text-ink/70 leading-relaxed">
                            {{ $item['answer'] ?? '' }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
