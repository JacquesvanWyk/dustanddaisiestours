<div>
    @if($sent)
        <div class="bg-brand/10 border border-brand p-6 text-center">
            <p class="font-handwriting text-2xl text-brand mb-2">Message Sent!</p>
            <p class="text-sm opacity-70">We'll get back to you as soon as possible.</p>
        </div>
    @else
        <form wire:submit="submit" class="space-y-4">
            <div>
                <label class="font-handwriting text-brand block mb-1">Name</label>
                <input type="text" wire:model="name" required class="w-full bg-parchment border border-ink/20 px-4 py-2 focus:border-brand focus:outline-none transition">
                @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="font-handwriting text-brand block mb-1">Email</label>
                <input type="email" wire:model="email" required class="w-full bg-parchment border border-ink/20 px-4 py-2 focus:border-brand focus:outline-none transition">
                @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="font-handwriting text-brand block mb-1">Phone</label>
                <input type="tel" wire:model="phone" class="w-full bg-parchment border border-ink/20 px-4 py-2 focus:border-brand focus:outline-none transition">
                @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="font-handwriting text-brand block mb-1">Message</label>
                <textarea wire:model="message" rows="4" required class="w-full bg-parchment border border-ink/20 px-4 py-2 focus:border-brand focus:outline-none transition"></textarea>
                @error('message') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn-stamp text-sm" wire:loading.attr="disabled">
                <span wire:loading.remove>Send Message</span>
                <span wire:loading>Sending...</span>
            </button>
        </form>
    @endif
</div>
