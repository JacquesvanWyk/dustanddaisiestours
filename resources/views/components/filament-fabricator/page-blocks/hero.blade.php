@aware(['page'])

@php
    $variant = $variant ?? (! empty($slides) ? 'full' : 'simple');
@endphp

@if($variant === 'full')
@php
    $slides = $slides ?? [];

    if (empty($slides) && ($heading ?? null)) {
        $slides = [[
            'heading' => $heading,
            'subheading' => $subheading ?? null,
            'cta_text' => $ctaText ?? null,
            'cta_link' => $ctaLink ?? null,
            'image' => $image ?? null,
        ]];
    }

    $hasMultiple = count($slides) > 1;
@endphp

@if (count($slides) > 0)
    <section
        class="hero-shell"
        x-data="{
            current: 0,
            total: {{ count($slides) }},
            transitioning: false,
            auto: null,
            touchStartX: 0,
            init() {
                if (this.total > 1) this.auto = setInterval(() => this.next(), 7000);
                this.$nextTick(() => this.animateSlide());
                this.$el.addEventListener('touchstart', e => { this.touchStartX = e.touches[0].clientX; }, { passive: true });
                this.$el.addEventListener('touchend', e => {
                    const diff = this.touchStartX - e.changedTouches[0].clientX;
                    if (Math.abs(diff) > 50) diff > 0 ? this.next() : this.prev();
                }, { passive: true });
            },
            next() {
                if (this.transitioning || this.total < 2) return;
                this.transition((this.current + 1) % this.total);
            },
            prev() {
                if (this.transitioning || this.total < 2) return;
                this.transition((this.current - 1 + this.total) % this.total);
            },
            goTo(index) {
                if (this.transitioning || index === this.current) return;
                this.transition(index);
            },
            transition(target) {
                this.transitioning = true;
                clearInterval(this.auto);

                const currentSlide = this.$refs['slide-' + this.current];
                const nextSlide = this.$refs['slide-' + target];

                if (typeof gsap !== 'undefined' && currentSlide && nextSlide) {
                    gsap.to(currentSlide, {
                        opacity: 0,
                        duration: 0.55,
                        ease: 'power2.inOut',
                        onComplete: () => {
                            currentSlide.classList.add('hidden');
                            this.current = target;
                            nextSlide.classList.remove('hidden');
                            gsap.fromTo(nextSlide, { opacity: 0 }, { opacity: 1, duration: 0.8, ease: 'power2.out' });
                            this.animateSlide();
                        },
                    });
                } else {
                    currentSlide.classList.add('hidden');
                    this.current = target;
                    nextSlide.classList.remove('hidden');
                    this.animateSlide();
                }
            },
            animateSlide() {
                const slide = this.$refs['slide-' + this.current];
                const content = slide?.querySelector('.hero-copy');

                if (!content) {
                    this.transitioning = false;
                    return;
                }

                if (typeof gsap === 'undefined') {
                    this.transitioning = false;
                    if (this.total > 1) this.auto = setInterval(() => this.next(), 7000);
                    return;
                }

                gsap.fromTo(
                    content.children,
                    { opacity: 0, y: 28 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.82,
                        stagger: 0.11,
                        ease: 'power3.out',
                    }
                );

                this.transitioning = false;
                if (this.total > 1) this.auto = setInterval(() => this.next(), 7000);
            },
        }"
        @keydown.right.window="next()"
        @keydown.left.window="prev()"
    >
        @foreach ($slides as $i => $slide)
            <div x-ref="slide-{{ $i }}" class="{{ $i > 0 ? 'hidden' : '' }} absolute inset-0">
                <div class="hero-bg">
                    @if ($slide['image'] ?? null)
                        <img src="{{ Storage::url($slide['image']) }}" alt="{{ $slide['heading'] ?? $page->title }}">
                    @else
                        <div class="w-full h-full bg-[radial-gradient(circle_at_top_left,_rgba(202,109,44,0.34),_transparent_34%),linear-gradient(135deg,_#33251a,_#18110d_60%,_#3a2e25)]"></div>
                    @endif
                    <div class="hero-overlay"></div>
                </div>

                <div class="max-w-7xl mx-auto px-6 hero-grid">
                    <div class="hero-copy">
                        <h1 class="hero-title">{!! nl2br(e($slide['heading'] ?? '')) !!}</h1>

                        @if ($slide['subheading'] ?? null)
                            <p class="hero-summary">{{ $slide['subheading'] }}</p>
                        @endif

                        @if ($slide['cta_text'] ?? null)
                            <div class="hero-actions">
                                <a href="{{ $slide['cta_link'] ?? '#' }}" class="btn-primary">{{ $slide['cta_text'] }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        @if ($hasMultiple)
            <div class="slide-panel">
                <div class="glass-panel p-4">
                    <div class="slide-index">
                        <span>Slides</span>
                        <span x-text="String(current + 1).padStart(2, '0') + ' / ' + String(total).padStart(2, '0')"></span>
                    </div>

                    <div class="mt-4 flex items-center justify-between gap-4">
                        <div class="slide-dots">
                            @foreach ($slides as $i => $slide)
                                <button
                                    @click="goTo({{ $i }})"
                                    :class="current === {{ $i }} ? 'bg-white' : 'bg-transparent'"
                                    aria-label="Go to slide {{ $i + 1 }}"
                                ></button>
                            @endforeach
                        </div>

                        <div class="slide-arrows">
                            <button @click="prev()" aria-label="Previous slide">
                                <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button @click="next()" aria-label="Next slide">
                                <svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endif

@else
    <section class="hero-shell">
        <div class="hero-bg">
            @if($image ?? null)
                <img src="{{ Storage::url($image) }}" alt="{{ $heading ?? $page->title }}">
            @else
                <div class="w-full h-full bg-[radial-gradient(circle_at_top_left,_rgba(202,109,44,0.34),_transparent_34%),linear-gradient(135deg,_#33251a,_#18110d_60%,_#3a2e25)]"></div>
            @endif
            <div class="hero-overlay"></div>
        </div>
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-center" style="min-height: 50vh;">
            <div class="hero-copy text-center relative z-10">
                <h1 class="hero-title">{!! nl2br(e($heading ?? '')) !!}</h1>
                @if($subheading ?? null)
                    <p class="hero-summary mt-6">{{ $subheading }}</p>
                @endif
                @if($ctaText ?? null)
                    <div class="hero-actions mt-8">
                        <a href="{{ $ctaLink ?? '#' }}" class="btn-primary">{{ $ctaText }}</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
