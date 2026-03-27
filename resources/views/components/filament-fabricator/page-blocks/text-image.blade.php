@aware(['page'])

<section class="torn-top bg-parchment relative coffee-stain">
    <div class="max-w-6xl mx-auto px-4 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            @php $imgLeft = ($image_position ?? 'right') === 'left'; @endphp

            <div class="{{ $imgLeft ? 'order-1' : 'order-1 md:order-2' }} flex justify-center">
                @if($image ?? null)
                    <div class="washi-tape {{ $imgLeft ? 'photo-tilt-left' : 'photo-tilt-right' }}">
                        <img src="{{ Storage::url($image) }}" alt="{{ $heading ?? '' }}" class="journal-photo w-48 h-48 rounded-full object-cover shadow-lg mx-auto">
                    </div>
                @endif
            </div>
            <div class="{{ $imgLeft ? 'order-2' : 'order-2 md:order-1' }} margin-line pl-6 ruled-bg">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ $heading ?? '' }}</h2>
                <div class="drop-cap text-lg leading-relaxed prose prose-stone max-w-none">
                    {!! $body ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>
