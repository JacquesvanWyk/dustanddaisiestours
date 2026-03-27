@aware(['page'])

<section class="bg-sand py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            @php $imgLeft = ($image_position ?? 'right') === 'left'; @endphp

            <div class="{{ $imgLeft ? 'order-1' : 'order-1 md:order-2' }}">
                @if($image ?? null)
                    <div class="relative">
                        <img src="{{ Storage::url($image) }}" alt="{{ $heading ?? '' }}" class="w-full aspect-[4/5] object-cover shadow-xl">
                        <div class="absolute -bottom-4 -right-4 w-full h-full border-2 border-brand/20 -z-10"></div>
                    </div>
                @endif
            </div>
            <div class="{{ $imgLeft ? 'order-2' : 'order-2 md:order-1' }}">
                @if($heading ?? null)
                    <h2 class="text-3xl md:text-4xl font-bold mb-8 leading-tight">{{ $heading }}</h2>
                @endif
                <div class="text-base leading-[1.85] text-ink/70 prose prose-stone max-w-none">
                    {!! $body ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>
