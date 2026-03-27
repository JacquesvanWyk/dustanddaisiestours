<div>
    @if($sent)
        <div class="bg-brand/5 border border-brand/20 p-8 text-center">
            <p class="font-accent text-3xl text-brand mb-2">Booking Request Sent!</p>
            <p class="text-sm text-ink/60">We'll confirm your booking via email or WhatsApp.</p>
            <p class="text-xs text-ink/40 mt-3">A 50% non-refundable deposit is required to secure your booking.</p>
        </div>
    @else
        <form wire:submit="submit" class="space-y-5">
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Name</label>
                    <input type="text" wire:model="name" required class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition">
                    @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Email</label>
                    <input type="email" wire:model="email" required class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition">
                    @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Phone</label>
                    <input type="tel" wire:model="phone" required class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition">
                    @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Number of Guests</label>
                    <input type="number" wire:model="guests" min="1" required class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition">
                    @error('guests') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Preferred Tour</label>
                    <select wire:model="tour" required class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition">
                        <option value="">Select a tour...</option>
                        <optgroup label="Day Tours">
                            <option>The Copper Tour</option>
                            <option>Kamiesberg Culture Tour</option>
                            <option>Flower Hunt Tour</option>
                            <option>Geological Wonder Trip</option>
                        </optgroup>
                        <optgroup label="Hiking Trails">
                            <option>Goegap Nature Reserve Day Hike</option>
                            <option>Lewerberg Houtpad Hiking Trail</option>
                            <option>Bruinkop Hiking Trail</option>
                            <option>Nicky's Ponder Trail</option>
                        </optgroup>
                    </select>
                    @error('tour') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Preferred Date</label>
                    <input type="date" wire:model="preferred_date" required class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition">
                    @error('preferred_date') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Additional Message</label>
                <textarea wire:model="message" rows="3" class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition"></textarea>
                @error('message') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="flex flex-wrap items-center justify-between gap-4">
                <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Request Booking</span>
                    <span wire:loading>Sending...</span>
                </button>
                <p class="text-xs text-ink/40">Min 4 people. Children under 6 free.</p>
            </div>
        </form>
    @endif
</div>
