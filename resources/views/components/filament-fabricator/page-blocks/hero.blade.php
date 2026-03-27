@aware(['page'])

@php
    $slides = $slides ?? [];
    // If no slides defined, use the single hero fields as one slide
    if (empty($slides) && ($heading ?? null)) {
        $slides = [[
            'heading' => $heading,
            'subheading' => $subheading ?? null,
            'cta_text' => $cta_text ?? null,
            'cta_link' => $cta_link ?? null,
            'image' => $image ?? null,
        ]];
    }
    $hasMultiple = count($slides) > 1;
@endphp

@if(count($slides) > 0)
<section class="relative min-h-[90vh] overflow-hidden" x-data="{
    current: 0,
    total: {{ count($slides) }},
    transitioning: false,
    auto: null,
    init() {
        if (this.total > 1) {
            this.auto = setInterval(() => this.next(), 6000);
        }
        this.$nextTick(() => this.animateSlide());
    },
    next() {
        if (this.transitioning) return;
        this.transition((this.current + 1) % this.total);
    },
    prev() {
        if (this.transitioning) return;
        this.transition((this.current - 1 + this.total) % this.total);
    },
    goTo(i) {
        if (this.transitioning || i === this.current) return;
        this.transition(i);
    },
    transition(to) {
        this.transitioning = true;
        clearInterval(this.auto);

        const currentSlide = this.$refs['slide-' + this.current];
        const nextSlide = this.$refs['slide-' + to];
        const currentContent = currentSlide?.querySelector('.hero-content');
        const nextContent = nextSlide?.querySelector('.hero-content');

        // Fade out current
        if (typeof gsap !== 'undefined') {
            gsap.to(currentContent, { opacity: 0, y: 30, duration: 0.4, ease: 'power2.in' });
            gsap.to(currentSlide, {
                opacity: 0, scale: 1.05, duration: 0.8, ease: 'power2.inOut',
                onComplete: () => {
                    currentSlide.classList.add('hidden');
                    this.current = to;
                    nextSlide.classList.remove('hidden');
                    gsap.fromTo(nextSlide, { opacity: 0, scale: 1.1 }, { opacity: 1, scale: 1, duration: 1, ease: 'power2.out' });
                    gsap.fromTo(nextContent, { opacity: 0, y: 50 }, { opacity: 1, y: 0, duration: 0.8, delay: 0.3, ease: 'power3.out',
                        onComplete: () => {
                            this.transitioning = false;
                            this.auto = setInterval(() => this.next(), 6000);
                        }
                    });
                }
            });
        } else {
            currentSlide.classList.add('hidden');
            this.current = to;
            nextSlide.classList.remove('hidden');
            this.transitioning = false;
            this.auto = setInterval(() => this.next(), 6000);
        }
    },
    animateSlide() {
        const slide = this.$refs['slide-' + this.current];
        const content = slide?.querySelector('.hero-content');
        if (typeof gsap !== 'undefined' && content) {
            gsap.fromTo(content.querySelector('.hero-subheading'), { opacity: 0, x: -40 }, { opacity: 1, x: 0, duration: 0.8, delay: 0.2, ease: 'power3.out' });
            gsap.fromTo(content.querySelector('.hero-heading'), { opacity: 0, y: 60, clipPath: 'inset(100% 0 0 0)' }, { opacity: 1, y: 0, clipPath: 'inset(0% 0 0 0)', duration: 1, delay: 0.4, ease: 'power3.out' });
            gsap.fromTo(content.querySelector('.hero-cta'), { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.6, delay: 0.9, ease: 'power2.out' });
        }
    }
}" @keydown.right.window="next()" @keydown.left.window="prev()">

    {{-- Slides --}}
    @foreach($slides as $i => $slide)
        <div x-ref="slide-{{ $i }}" class="{{ $i > 0 ? 'hidden' : '' }} absolute inset-0 min-h-[90vh] flex items-end">
            @if($slide['image'] ?? null)
                <img src="{{ Storage::url($slide['image']) }}" alt="{{ $slide['heading'] ?? '' }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="hero-overlay absolute inset-0"></div>
            @else
                <div class="absolute inset-0 bg-ink/5"></div>
            @endif
            <div class="hero-content relative z-10 max-w-7xl mx-auto px-6 pb-28 w-full">
                @if($slide['subheading'] ?? null)
                    <p class="hero-subheading font-accent text-3xl md:text-4xl text-brand mb-3">{{ $slide['subheading'] }}</p>
                @endif
                <h1 class="hero-heading text-5xl md:text-7xl font-bold leading-[1.05] mb-8 text-ink max-w-3xl">
                    {!! nl2br(e($slide['heading'] ?? '')) !!}
                </h1>
                @if($slide['cta_text'] ?? null)
                    <div class="hero-cta">
                        <a href="{{ $slide['cta_link'] ?? '#' }}" class="btn-primary">{{ $slide['cta_text'] }}</a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach

    {{-- Navigation dots --}}
    @if($hasMultiple)
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center gap-3">
            @foreach($slides as $i => $slide)
                <button @click="goTo({{ $i }})"
                        class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                        :class="current === {{ $i }} ? 'bg-brand w-8' : 'bg-sand/50 hover:bg-sand/80'"
                        aria-label="Go to slide {{ $i + 1 }}"></button>
            @endforeach
        </div>

        {{-- Arrow navigation --}}
        <button @click="prev()" class="absolute left-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 flex items-center justify-center bg-ink/20 hover:bg-ink/40 backdrop-blur-sm text-white/80 hover:text-white transition" aria-label="Previous slide">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button @click="next()" class="absolute right-6 top-1/2 -translate-y-1/2 z-20 w-12 h-12 flex items-center justify-center bg-ink/20 hover:bg-ink/40 backdrop-blur-sm text-white/80 hover:text-white transition" aria-label="Next slide">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M9 5l7 7-7 7"/></svg>
        </button>
    @endif

    {{-- Spacer for layout --}}
    <div class="min-h-[90vh]"></div>
</section>
@endif
