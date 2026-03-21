@aware(['page'])

<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        @if($heading ?? null)
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10 text-center">{{ $heading }}</h2>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach(($images ?? []) as $image)
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ Storage::url($image) }}" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
            @endforeach
        </div>
    </div>
</section>
