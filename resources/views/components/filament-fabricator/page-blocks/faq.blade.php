@aware(['page'])

<section class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-6">
        @if($heading ?? null)
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10 text-center">{{ $heading }}</h2>
        @endif

        <div class="space-y-4">
            @foreach(($items ?? []) as $item)
                <details class="group bg-white rounded-lg shadow-sm">
                    <summary class="flex items-center justify-between cursor-pointer px-6 py-4 font-semibold text-gray-900">
                        {{ $item['question'] }}
                        <svg class="w-5 h-5 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-4 text-gray-600">{{ $item['answer'] }}</div>
                </details>
            @endforeach
        </div>
    </div>
</section>
