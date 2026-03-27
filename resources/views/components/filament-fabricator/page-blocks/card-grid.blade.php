@aware(['page'])

<section class="bg-sand py-24 bg-topo">
    <div class="max-w-7xl mx-auto px-6">
        @if($heading ?? null)
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold">{{ $heading }}</h2>
                <div class="section-divider mt-5"></div>
            </div>
        @endif
        @if($cards ?? null)
            <div class="grid sm:grid-cols-2 lg:grid-cols-{{ min(count($cards), 4) }} gap-6">
                @foreach($cards as $i => $card)
                    @php
                        $title = $card['title'] ?? '';
                        $hasPrice = preg_match('/[\x{2013}\x{2014}\-]+\s*((?:R|From\s+R)\s?[\d,]+.*?)$/iu', $title, $priceMatch);
                        $cleanTitle = $hasPrice ? trim(preg_replace('/\s*[\x{2013}\x{2014}\-]+\s*(?:R|From\s+R)\s?[\d,]+.*$/iu', '', $title)) : $title;
                        $price = $hasPrice ? trim($priceMatch[1]) : null;

                        $desc = $card['description'] ?? '';
                        $hasDuration = preg_match('/Duration:\s*([\d\-]+\s*hours?)/i', $desc, $durMatch);
                        $hasDistance = preg_match('/Distance:\s*~?([\d,]+\s*km)/i', $desc, $distMatch);
                        $hasTime = preg_match('/([\d\-]+)\s*hours?/i', $desc, $timeMatch);

                        $duration = $hasDuration ? $durMatch[1] : ($hasTime ? $timeMatch[0] : null);
                        $distance = $hasDistance ? $distMatch[1] : null;
                        $cleanDesc = preg_replace('/\s*Distance:.*$/i', '', $desc);
                        $cleanDesc = preg_replace('/\s*Duration:.*$/i', '', $cleanDesc);
                        $cleanDesc = rtrim($cleanDesc, '. ,');
                    @endphp
                    <a href="{{ $card['link'] ?? '#' }}" class="tour-card group block">
                        @if($card['image'] ?? null)
                            <div class="overflow-hidden aspect-[4/5]">
                                <img src="{{ Storage::url($card['image']) }}" alt="{{ $cleanTitle }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-accent text-2xl mb-2 text-ink group-hover:text-brand transition">{{ $cleanTitle }}</h3>
                            @if($price)
                                <p class="text-brand font-semibold text-sm mb-3">{{ $price }}</p>
                            @endif
                            @if($cleanDesc)
                                <p class="text-sm text-ink/60 leading-relaxed mb-4">{{ $cleanDesc }}</p>
                            @endif
                            @if($duration || $distance)
                                <div class="flex flex-wrap gap-2 mt-auto">
                                    @if($duration)
                                        <span class="tour-meta">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                            {{ $duration }}
                                        </span>
                                    @endif
                                    @if($distance)
                                        <span class="tour-meta">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                                            {{ $distance }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
