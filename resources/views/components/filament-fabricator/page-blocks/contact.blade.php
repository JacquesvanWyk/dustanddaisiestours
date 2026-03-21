@aware(['page'])

<section class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 text-center">{{ $heading }}</h2>

        @if($body ?? null)
            <p class="mt-4 text-lg text-gray-600 text-center max-w-xl mx-auto">{{ $body }}</p>
        @endif

        @if($show_form ?? true)
            <form class="mt-10 space-y-6" method="POST" action="#">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E87524] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E87524] focus:border-transparent">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                    <textarea name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E87524] focus:border-transparent"></textarea>
                </div>
                <button type="submit" class="w-full px-8 py-3 bg-[#E87524] text-white font-semibold rounded-lg hover:bg-[#d4691f] transition-colors">
                    Send Message
                </button>
            </form>
        @endif
    </div>
</section>
