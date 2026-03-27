@aware(['page'])

<section id="booking-form" class="bg-sand-dark py-24 bg-topo relative overflow-hidden">
    <div class="bg-daisy-watermark"></div>
    <div class="max-w-3xl mx-auto px-6 relative z-10">
        @if($heading ?? null)
            <div class="text-center mb-14">
                <p class="font-accent text-2xl text-brand mb-2">Make a Booking</p>
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="section-divider mt-5"></div>
            </div>
        @endif

        @if($body ?? null)
            <p class="text-center text-lg text-ink/60 mb-12 max-w-xl mx-auto leading-relaxed">{{ $body }}</p>
        @endif

        <div class="bg-white p-8 md:p-12 shadow-sm border border-ink/5 margin-line ruled-bg">
            <livewire:booking-form />
        </div>
    </div>
</section>
