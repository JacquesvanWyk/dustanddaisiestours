@aware(['page'])

@php
    $surface = match ($backgroundColor ?? 'orange') {
        'dark' => 'linear-gradient(135deg, rgba(25, 19, 15, 0.96), rgba(25, 19, 15, 0.84))',
        'gray' => 'linear-gradient(135deg, rgba(221, 206, 183, 0.92), rgba(246, 239, 228, 0.86))',
        'white' => 'linear-gradient(135deg, rgba(255, 255, 255, 0.94), rgba(246, 239, 228, 0.92))',
        default => 'linear-gradient(135deg, rgba(202, 109, 44, 0.96), rgba(158, 76, 22, 0.92))',
    };

    $darkMode = ($backgroundColor ?? 'orange') === 'dark';
@endphp

<section class="section-shell">
    <div class="max-w-6xl mx-auto px-6">
        <div class="section-bleed overflow-hidden p-8 md:p-12 lg:p-16 relative" style="background: {{ $surface }}; color: {{ $darkMode ? '#f7f1e7' : '#19130f' }};">
            <div class="absolute inset-y-0 right-0 w-1/2 opacity-20 pointer-events-none" style="background: radial-gradient(circle at center, rgba(255,255,255,0.34), transparent 60%);"></div>
            <div class="relative z-10 grid lg:grid-cols-[1.2fr_0.8fr] gap-10 items-center">
                <div class="flex flex-col items-start">
                    @if ($eyebrow ?? null)
                        <span class="eyebrow {{ $darkMode ? 'text-white/70' : '' }}">{{ $eyebrow }}</span>
                    @endif
                    <h2 class="mt-5 text-4xl md:text-6xl leading-[0.92] max-w-[12ch]">{{ $heading ?? '' }}</h2>
                    @if ($subheading ?? null)
                        <p class="mt-5 max-w-xl text-base md:text-lg leading-8 {{ $darkMode ? 'text-white/74' : 'text-ink/66' }}">
                            {{ $subheading }}
                        </p>
                    @endif
                    @if ($buttonText ?? null)
                        <a
                            href="{{ $buttonLink ?? '#' }}"
                            class="mt-8 inline-flex items-center justify-center gap-3 rounded-full px-7 py-4 text-[0.76rem] font-extrabold uppercase tracking-[0.18em] {{ $darkMode ? 'bg-white text-ink shadow-[0_18px_40px_rgba(0,0,0,0.28)] hover:bg-sand' : 'bg-ink text-white shadow-[0_18px_40px_rgba(25,19,15,0.22)] hover:bg-ink-light' }}"
                        >
                            <span>{{ $buttonText }}</span>
                            <span aria-hidden="true">→</span>
                        </a>
                    @endif
                </div>

                <div class="lg:justify-self-end max-w-md">
                    <p class="text-sm md:text-base leading-8 {{ $darkMode ? 'text-white/72' : 'text-ink/68' }}">
                        {{ $body ?? 'We design private day tours and trail days around season, bloom conditions and your pace. Tell us what you want to feel, not just where you want to stop.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
