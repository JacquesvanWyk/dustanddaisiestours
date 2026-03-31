@aware(['page'])

<section id="booking-form" class="section-shell">
    <div class="max-w-7xl mx-auto px-6">
        <div class="contact-grid">
            <div class="section-grid">
                <div class="section-header">
                    <span class="eyebrow">{{ $eyebrow ?? 'Trip planning desk' }}</span>
                    @if ($heading ?? null)
                        <h2 class="section-title">{{ $heading }}</h2>
                    @endif
                    <div class="section-divider"></div>
                    @if ($body ?? null)
                        <p class="section-copy">{{ $body }}</p>
                    @endif
                </div>

                <div class="contact-card p-8 md:p-10">
                    <p class="text-[0.68rem] font-extrabold uppercase tracking-[0.22em] text-sage/65">{{ $infoHeading ?? 'Before you submit' }}</p>
                    <div class="mt-6 space-y-5 text-sm leading-7 text-ink/68">
                        @foreach (preg_split("/\n{2,}/", trim($infoBody ?? "We shape bookings around seasonality, weather, walking pace and the kind of stories you want guiding the day.\n\nShare any mobility needs, photography interests or bloom priorities in the notes and we will tailor the route.")) as $paragraph)
                            @if (trim($paragraph) !== '')
                                <p>{{ trim($paragraph) }}</p>
                            @endif
                        @endforeach
                    </div>

                    @php $badgeItems = collect($infoBadges ?? [])->pluck('label')->filter()->values(); @endphp
                    @if ($badgeItems->isNotEmpty())
                        <div class="mt-8 flex flex-wrap gap-2">
                            @foreach ($badgeItems as $badge)
                                <span class="tour-meta">{{ $badge }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-shell p-7 md:p-10">
                <livewire:booking-form />
            </div>
        </div>
    </div>
</section>
