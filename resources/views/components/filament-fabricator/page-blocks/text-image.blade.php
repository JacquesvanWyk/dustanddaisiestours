@aware(['page'])

<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center {{ ($image_position ?? 'right') === 'left' ? '' : 'md:[&>*:first-child]:order-2' }}">
            @if($image ?? null)
                <div>
                    <img src="{{ Storage::url($image) }}" alt="{{ $heading }}" class="rounded-lg shadow-lg w-full">
                </div>
            @endif

            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $heading }}</h2>
                <div class="mt-6 prose prose-lg text-gray-600 max-w-none">
                    {!! $body !!}
                </div>
            </div>
        </div>
    </div>
</section>
