<div>
    @if ($sent)
        <div class="success-card p-8 md:p-10 text-center">
            <p class="text-[0.7rem] font-extrabold uppercase tracking-[0.22em] text-sage/70">Booking request logged</p>
            <p class="mt-4 text-4xl leading-none">We'll confirm the route with you.</p>
            <p class="mt-4 text-sm leading-7 text-ink/62">A confirmation will follow by email or WhatsApp once we have checked dates, availability and bloom conditions.</p>
            <p class="mt-3 text-xs uppercase tracking-[0.16em] text-ink/40">50% non-refundable deposit required to secure the booking</p>
        </div>
    @else
        <div class="mb-8">
            <p class="text-[0.7rem] font-extrabold uppercase tracking-[0.22em] text-sage/65">Booking request</p>
            <h3 class="mt-3 text-3xl md:text-4xl leading-none">Reserve a guided route</h3>
        </div>

        <form wire:submit="submit" class="space-y-5">
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="field-label">Name</label>
                    <input type="text" wire:model="name" required class="field-input">
                    @error('name') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="field-label">Email</label>
                    <input type="email" wire:model="email" required class="field-input">
                    @error('email') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="field-label">Phone or WhatsApp</label>
                    <input type="tel" wire:model="phone" required class="field-input">
                    @error('phone') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="field-label">Number of guests</label>
                    <input type="number" wire:model="guests" min="1" required class="field-input">
                    @error('guests') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="field-label">Preferred tour</label>
                    <select wire:model="tour" required class="field-select">
                        <option value="">Choose a tour or trail…</option>
                        @foreach(App\Livewire\BookingForm::$tours as $group => $tours)
                            <optgroup label="{{ $group }}">
                                @foreach($tours as $tour)
                                    <option value="{{ $tour }}">{{ $tour }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @error('tour') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="field-label">Preferred date</label>
                    <input type="date" wire:model="preferred_date" required class="field-input">
                    @error('preferred_date') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="field-label">Notes for the guide</label>
                <textarea wire:model="message" rows="4" class="field-textarea" placeholder="Share mobility needs, flower priorities, photography interests or anything else we should factor into the route."></textarea>
                @error('message') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
                <p class="field-note">Minimum 4 people. Children under 6 are free.</p>
                <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Request booking</span>
                    <span wire:loading>Sending...</span>
                </button>
            </div>
        </form>
    @endif
</div>
