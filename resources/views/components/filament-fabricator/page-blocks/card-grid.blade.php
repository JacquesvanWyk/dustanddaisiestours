@aware(['page'])

<section class="section-shell">
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-header lg:grid lg:grid-cols-[0.8fr_1.2fr] lg:items-end">
            <div>
                <span class="eyebrow">{{ $eyebrow ?? 'Route collection' }}</span>
                @if ($heading ?? null)
                    <h2 class="section-title mt-5">{{ $heading }}</h2>
                @endif
            </div>
            <p class="section-copy lg:justify-self-end">
                {{ $intro ?? 'Guided routes designed as intimate field experiences. Each one is paced for conversation, context and the changing moods of Namaqualand.' }}
            </p>
        </div>

        @if ($cards ?? null)
            <div class="mt-14 grid md:grid-cols-2 gap-7 max-w-5xl mx-auto">
                @foreach ($cards as $i => $card)
                    @php
                        $title = $card['title'] ?? '';
                        $hasPrice = preg_match('/[\x{2013}\x{2014}\-]+\s*((?:R|From\s+R)\s?[\d,]+.*?)$/iu', $title, $priceMatch);
                        $cleanTitle = $hasPrice ? trim(preg_replace('/\s*[\x{2013}\x{2014}\-]+\s*(?:R|From\s+R)\s?[\d,]+.*$/iu', '', $title)) : $title;
                        $price = $card['price'] ?? ($hasPrice ? trim($priceMatch[1]) : null);

                        $summary = $card['summary'] ?? null;
                        $desc = $card['description'] ?? '';
                        $hasDuration = preg_match('/Duration:\s*([\d\-]+\s*hours?)/i', $desc, $durMatch);
                        $hasDistance = preg_match('/Distance:\s*~?([\d,]+\s*km)/i', $desc, $distMatch);
                        $hasTime = preg_match('/([\d\-]+)\s*hours?/i', $desc, $timeMatch);

                        $duration = $card['duration'] ?? ($hasDuration ? $durMatch[1] : ($hasTime ? $timeMatch[0] : null));
                        $distance = $card['distance'] ?? ($hasDistance ? $distMatch[1] : null);
                        $difficulty = $card['difficulty'] ?? null;
                        $groupSize = $card['group_size'] ?? null;
                        $guideType = match ($card['guide_type'] ?? 'private-guide') {
                            'self-drive' => 'Self-drive',
                            'guided-hike' => 'Guided hike',
                            'seasonal-route' => 'Seasonal route',
                            default => 'Private guide',
                        };
                        $cleanDesc = preg_replace('/\s*Distance:.*$/i', '', $desc);
                        $cleanDesc = preg_replace('/\s*Duration:.*$/i', '', $cleanDesc);
                        $cleanDesc = rtrim($cleanDesc, '. ,');
                        $stamp = $card['stamp'] ?? ($i % 2 === 0 ? 'Day route' : 'Field walk');
                        $label = $card['label'] ?? 'Curated itinerary';
                    @endphp

                    <a href="{{ $card['link'] ?? '#' }}" class="expedition-card tour-card group">
                        @if ($card['image'] ?? null)
                            <div class="tour-card-media">
                                <img src="{{ Storage::url($card['image']) }}" alt="{{ $cleanTitle }}">
                                <div class="tour-stamp">{{ $stamp }}</div>
                                <div class="map-dots" aria-hidden="true">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        @endif

                        <div class="p-6 md:p-7 flex flex-col gap-5 flex-1">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-[0.68rem] font-extrabold uppercase tracking-[0.22em] text-sage/70">{{ $label }}</p>
                                    <h3 class="mt-3 text-3xl leading-none group-hover:text-brand transition-colors">{{ $cleanTitle }}</h3>
                                </div>
                                @if ($price)
                                    <span class="pill border border-brand/20 bg-brand/8 text-brand whitespace-nowrap">{{ $price }}</span>
                                @endif
                            </div>

                            @if ($summary || $cleanDesc)
                                <p class="text-sm leading-7 text-ink/70">{{ $summary ?: $cleanDesc }}</p>
                            @endif

                            <div class="mt-auto flex flex-wrap gap-2">
                                @if ($duration)
                                    <span class="tour-meta">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                        {{ $duration }}
                                    </span>
                                @endif
                                @if ($distance)
                                    <span class="tour-meta">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                        {{ $distance }}
                                    </span>
                                @endif
                                @if ($difficulty)
                                    <span class="tour-meta">{{ $difficulty }}</span>
                                @endif
                                @if ($groupSize)
                                    <span class="tour-meta">{{ $groupSize }}</span>
                                @endif
                                <span class="tour-meta">{{ $guideType }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
