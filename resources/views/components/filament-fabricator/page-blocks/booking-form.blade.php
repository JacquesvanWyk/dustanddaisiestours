@aware(['page'])

<section id="booking-form" class="bg-parchment-dark py-20">
    <div class="max-w-3xl mx-auto px-4">
        @if($heading ?? null)
            <div class="text-center mb-12">
                <p class="font-handwriting text-xl text-brand mb-1">Make a Booking</p>
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="w-16 h-0.5 bg-brand mx-auto mt-4"></div>
            </div>
        @endif

        @if($body ?? null)
            <p class="text-center text-lg opacity-80 mb-10 max-w-xl mx-auto">{{ $body }}</p>
        @endif

        <div class="margin-line pl-6 ruled-bg">
            <livewire:booking-form />
        </div>
    </div>
</section>
