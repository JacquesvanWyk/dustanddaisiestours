@aware(['page'])

@php
    $imgLeft = ($imagePosition ?? 'right') === 'left';
@endphp

<section class="section-shell">
    <div class="max-w-7xl mx-auto px-6">
        <div class="section-bleed p-6 md:p-10 lg:p-14">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div class="{{ $imgLeft ? 'lg:order-1' : 'lg:order-2' }}">
                    @if ($image ?? null)
                        <div class="expedition-card">
                            <div class="tour-card-media aspect-[4/5]">
                                <img src="{{ Storage::url($image) }}" alt="{{ $heading ?? $page->title }}" class="journal-photo">
                                <div class="tour-stamp">{{ $stamp ?? 'Field record' }}</div>
                                <div class="map-dots" aria-hidden="true">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="{{ $imgLeft ? 'lg:order-2' : 'lg:order-1' }} section-grid">
                    <div class="section-header">
                        <span class="eyebrow">{{ $eyebrow ?? 'Landscape notes' }}</span>
                        @if ($heading ?? null)
                            <h2 class="section-title">{{ $heading }}</h2>
                        @endif
                        <div class="section-divider"></div>
                    </div>

                    <div class="note-card p-8 md:p-10">
                        <div class="drop-cap editorial-prose text-[1.02rem]">
                            {!! $body ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
