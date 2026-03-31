<div>
    @if ($sent)
        <div class="success-card p-8 md:p-10 text-center">
            <p class="text-[0.7rem] font-extrabold uppercase tracking-[0.22em] text-sage/70">Message logged</p>
            <p class="mt-4 text-4xl leading-none">We'll be in touch soon.</p>
            <p class="mt-4 text-sm leading-7 text-ink/62">Expect a reply as soon as we have reviewed your route ideas, dates and group details.</p>
        </div>
    @else
        <div class="mb-8">
            <p class="text-[0.7rem] font-extrabold uppercase tracking-[0.22em] text-sage/65">Tell us about the trip you have in mind</p>
            <h3 class="mt-3 text-3xl md:text-4xl leading-none">Start the conversation</h3>
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

            <div>
                <label class="field-label">Phone or WhatsApp</label>
                <input type="tel" wire:model="phone" class="field-input">
                @error('phone') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="field-label">Message</label>
                <textarea wire:model="message" rows="5" required class="field-textarea" placeholder="Tell us your dates, interests, route ideas or any questions."></textarea>
                @error('message') <p class="text-red-600 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
                <p class="field-note">The more context you share, the more tailored the reply can be.</p>
                <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove>Send inquiry</span>
                    <span wire:loading>Sending...</span>
                </button>
            </div>
        </form>
    @endif
</div>
