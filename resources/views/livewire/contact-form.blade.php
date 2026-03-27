<div>
    @if($sent)
        <div class="bg-brand/5 border border-brand/20 p-8 text-center">
            <p class="font-accent text-3xl text-brand mb-2">Message Sent!</p>
            <p class="text-sm text-ink/60">We'll get back to you as soon as possible.</p>
        </div>
    @else
        <form wire:submit="submit" class="space-y-5">
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
            <div>
                <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Phone</label>
                <input type="tel" wire:model="phone" class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition">
                @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-xs uppercase tracking-[0.15em] text-earth font-semibold block mb-2">Message</label>
                <textarea wire:model="message" rows="4" required class="w-full bg-sand border border-ink/10 px-4 py-3 text-sm transition"></textarea>
                @error('message') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                <span wire:loading.remove>Send Message</span>
                <span wire:loading>Sending...</span>
            </button>
        </form>
    @endif
</div>
