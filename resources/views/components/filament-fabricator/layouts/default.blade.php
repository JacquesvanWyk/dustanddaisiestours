@props(['page'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page->title }} - {{ App\Models\SiteSetting::get('site_name', config('app.name')) }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-stone-50 text-gray-800" x-data="{ mobileMenu: false }">
    <nav class="bg-white/95 backdrop-blur-sm border-b border-stone-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                @if($logo = App\Models\SiteSetting::get('logo'))
                    <img src="{{ Storage::url($logo) }}" alt="{{ App\Models\SiteSetting::get('site_name', config('app.name')) }}" class="h-10">
                @else
                    <span class="text-2xl font-bold text-[#E87524]">Dust & Daisies</span>
                @endif
            </a>

            <button @click="mobileMenu = !mobileMenu" class="md:hidden text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="hidden md:flex items-center gap-8">
                <a href="/" class="text-gray-600 hover:text-[#E87524] transition-colors font-medium">Home</a>
                <a href="/day-tours" class="text-gray-600 hover:text-[#E87524] transition-colors font-medium">Day Tours</a>
                <a href="/hiking-trails" class="text-gray-600 hover:text-[#E87524] transition-colors font-medium">Hiking Trails</a>
                <a href="/about" class="text-gray-600 hover:text-[#E87524] transition-colors font-medium">About</a>
                <a href="/gallery" class="text-gray-600 hover:text-[#E87524] transition-colors font-medium">Gallery</a>
                <a href="/contact" class="bg-[#E87524] text-white px-5 py-2 rounded-lg hover:bg-[#d4681f] transition-colors font-medium">Contact</a>
            </div>
        </div>

        <div x-show="mobileMenu" x-transition class="md:hidden bg-white border-t border-stone-200 px-6 py-4 space-y-3">
            <a href="/" class="block text-gray-600 hover:text-[#E87524]">Home</a>
            <a href="/day-tours" class="block text-gray-600 hover:text-[#E87524]">Day Tours</a>
            <a href="/hiking-trails" class="block text-gray-600 hover:text-[#E87524]">Hiking Trails</a>
            <a href="/about" class="block text-gray-600 hover:text-[#E87524]">About</a>
            <a href="/gallery" class="block text-gray-600 hover:text-[#E87524]">Gallery</a>
            <a href="/contact" class="block text-[#E87524] font-medium">Contact</a>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-stone-900 text-stone-400 pt-16 pb-8">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <div>
                    <h3 class="text-xl font-bold text-[#E87524] mb-4">Dust & Daisies</h3>
                    <p class="text-sm leading-relaxed">{{ App\Models\SiteSetting::get('tagline', 'Discover beauty in drought or abundance') }}</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                    <div class="space-y-2 text-sm">
                        <a href="/day-tours" class="block hover:text-[#E87524] transition-colors">Day Tours</a>
                        <a href="/hiking-trails" class="block hover:text-[#E87524] transition-colors">Hiking Trails</a>
                        <a href="/about" class="block hover:text-[#E87524] transition-colors">About Us</a>
                        <a href="/gallery" class="block hover:text-[#E87524] transition-colors">Gallery</a>
                        <a href="/contact" class="block hover:text-[#E87524] transition-colors">Contact</a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Contact</h4>
                    <div class="space-y-2 text-sm">
                        @if($phone = App\Models\SiteSetting::get('phone'))
                            <p><a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="hover:text-[#E87524] transition-colors">{{ $phone }}</a></p>
                        @endif
                        @if($phone2 = App\Models\SiteSetting::get('phone_2'))
                            <p><a href="tel:{{ preg_replace('/\s+/', '', $phone2) }}" class="hover:text-[#E87524] transition-colors">{{ $phone2 }}</a></p>
                        @endif
                        @if($email = App\Models\SiteSetting::get('email'))
                            <p><a href="mailto:{{ $email }}" class="hover:text-[#E87524] transition-colors">{{ $email }}</a></p>
                        @endif
                        <div class="flex gap-4 pt-2">
                            @if($facebook = App\Models\SiteSetting::get('facebook_url'))
                                <a href="{{ $facebook }}" target="_blank" class="hover:text-[#E87524] transition-colors">Facebook</a>
                            @endif
                            @if($instagram = App\Models\SiteSetting::get('instagram_url'))
                                <a href="{{ $instagram }}" target="_blank" class="hover:text-[#E87524] transition-colors">Instagram</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-stone-800 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} Dust and Daisies Tours. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
