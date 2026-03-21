@aware(['page'])

<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        @if($heading ?? null)
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10 text-center">{{ $heading }}</h2>
        @endif

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(($cards ?? []) as $card)
                <a href="{{ $card['link'] ?? '#' }}" class="group block bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                    @if($card['image'] ?? null)
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ Storage::url($card['image']) }}" alt="{{ $card['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $card['title'] }}</h3>
                        @if($card['description'] ?? null)
                            <p class="mt-2 text-gray-600">{{ $card['description'] }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
