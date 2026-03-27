@aware(['page'])

<section class="torn-top torn-bottom bg-parchment-dark py-20">
    <div class="max-w-6xl mx-auto px-4">
        @if($heading ?? null)
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="w-16 h-0.5 bg-brand mx-auto mt-4"></div>
            </div>
        @endif
        @if($cards ?? null)
            @php $tilts = ['photo-tilt-right', 'photo-tilt-left', 'photo-tilt-slight', 'photo-tilt-right']; @endphp
            <div class="grid sm:grid-cols-2 lg:grid-cols-{{ min(count($cards), 4) }} gap-8">
                @foreach($cards as $i => $card)
                    <a href="{{ $card['link'] ?? '#' }}" class="group block">
                        @if($card['image'] ?? null)
                            <div class="washi-tape {{ $tilts[$i % 4] }} mb-4">
                                <img src="{{ Storage::url($card['image']) }}" alt="{{ $card['title'] ?? '' }}" class="journal-photo w-full aspect-[3/4] object-cover shadow-md group-hover:scale-[1.02] transition-transform">
                            </div>
                        @endif
                        <h3 class="text-xl font-bold mb-2">{{ $card['title'] ?? '' }}</h3>
                        @if($card['description'] ?? null)
                            <p class="text-sm opacity-70 leading-relaxed">{{ $card['description'] }}</p>
                        @endif
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
