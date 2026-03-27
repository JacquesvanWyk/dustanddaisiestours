@aware(['page'])

<section class="bg-sand py-24 bg-daisy-watermark relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            @php $imgLeft = ($image_position ?? 'right') === 'left'; @endphp

            <div class="{{ $imgLeft ? 'order-1' : 'order-1 md:order-2' }}">
                @if($image ?? null)
                    @php $tilts = ['photo-tilt-right', 'photo-tilt-left', 'photo-tilt-slight']; @endphp
                    <div class="washi-tape {{ $tilts[array_rand($tilts)] }}">
                        <img src="{{ Storage::url($image) }}" alt="{{ $heading ?? '' }}" class="w-full aspect-[4/5] object-cover journal-photo shadow-xl">
                    </div>
                @endif
            </div>
            <div class="{{ $imgLeft ? 'order-2' : 'order-2 md:order-1' }} margin-line pl-8 ruled-bg">
                @if($heading ?? null)
                    <h2 class="text-3xl md:text-4xl font-bold mb-8 leading-tight">{{ $heading }}</h2>
                @endif
                <div class="drop-cap text-base leading-[1.85] text-ink/70 prose prose-stone max-w-none">
                    {!! $body ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>
