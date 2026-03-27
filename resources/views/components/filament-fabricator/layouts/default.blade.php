@props(['page'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $siteName = App\Models\SiteSetting::get('site_name', config('app.name'));
        $tagline = App\Models\SiteSetting::get('tagline', 'Guided Namaqualand Tours');
        $pageTitle = $page->title === 'Home' ? $siteName . ' - ' . $tagline : $page->title . ' - ' . $siteName;
    @endphp
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $page->title === 'Home' ? 'Dust and Daisies Tours offers guided day tours and hiking trails through the magic of Namaqualand. Based in Springbok, Northern Cape.' : $page->title . ' - ' . $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="Guided day tours and hiking trails through the magic of Namaqualand. Discover beauty in drought or abundance.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased" x-data="{ mobileOpen: false }">

    {{-- Top Bar --}}
    <div class="bg-ink text-parchment text-sm py-2">
        <div class="max-w-6xl mx-auto px-4 flex flex-wrap justify-between items-center gap-2">
            <div class="flex flex-wrap items-center gap-4 text-xs sm:text-sm">
                @if($phone = App\Models\SiteSetting::get('phone'))
                    <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="hover:text-brand transition">{{ $phone }}</a>
                    <span class="opacity-30">|</span>
                @endif
                @if($phone2 = App\Models\SiteSetting::get('phone_2'))
                    <a href="tel:{{ preg_replace('/\s+/', '', $phone2) }}" class="hover:text-brand transition">{{ $phone2 }}</a>
                    <span class="opacity-30">|</span>
                @endif
                @if($email = App\Models\SiteSetting::get('email'))
                    <a href="mailto:{{ $email }}" class="hover:text-brand transition">{{ $email }}</a>
                @endif
            </div>
            <div class="flex items-center gap-3">
                @if($facebook = App\Models\SiteSetting::get('facebook_url'))
                    <a href="{{ $facebook }}" target="_blank" aria-label="Facebook" class="hover:text-brand transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                @endif
                @if($instagram = App\Models\SiteSetting::get('instagram_url'))
                    <a href="{{ $instagram }}" target="_blank" aria-label="Instagram" class="hover:text-brand transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="bg-parchment/95 backdrop-blur sticky top-0 z-50 border-b border-ink/10">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between h-16">
            <a href="/" class="flex items-center gap-2">
                @if($logo = App\Models\SiteSetting::get('logo'))
                    <img src="{{ Storage::url($logo) }}" alt="{{ App\Models\SiteSetting::get('site_name', config('app.name')) }}" class="h-10">
                @else
                    <span class="font-handwriting text-2xl text-brand">Dust & Daisies</span>
                @endif
            </a>
            <div class="hidden md:flex items-center gap-8 text-sm uppercase tracking-wider">
                <a href="/" class="nav-link {{ request()->is('/') ? 'font-semibold text-brand' : '' }}">Home</a>
                <a href="/day-tours" class="nav-link {{ request()->is('day-tours') ? 'font-semibold text-brand' : '' }}">Day Tours</a>
                <a href="/hiking-trails" class="nav-link {{ request()->is('hiking-trails') ? 'font-semibold text-brand' : '' }}">Hiking Trails</a>
                <a href="/about" class="nav-link {{ request()->is('about') ? 'font-semibold text-brand' : '' }}">About</a>
                <a href="/gallery" class="nav-link {{ request()->is('gallery') ? 'font-semibold text-brand' : '' }}">Gallery</a>
                <a href="/contact" class="btn-stamp text-xs !py-2 !px-4">Contact</a>
            </div>
            <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path x-show="!mobileOpen" stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="mobileOpen" stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div x-show="mobileOpen" x-transition class="md:hidden border-t border-ink/10 bg-parchment px-4 pb-4">
            <a href="/" class="block py-2 text-sm uppercase tracking-wider {{ request()->is('/') ? 'text-brand' : '' }}">Home</a>
            <a href="/day-tours" class="block py-2 text-sm uppercase tracking-wider {{ request()->is('day-tours') ? 'text-brand' : '' }}">Day Tours</a>
            <a href="/hiking-trails" class="block py-2 text-sm uppercase tracking-wider {{ request()->is('hiking-trails') ? 'text-brand' : '' }}">Hiking Trails</a>
            <a href="/about" class="block py-2 text-sm uppercase tracking-wider {{ request()->is('about') ? 'text-brand' : '' }}">About</a>
            <a href="/gallery" class="block py-2 text-sm uppercase tracking-wider {{ request()->is('gallery') ? 'text-brand' : '' }}">Gallery</a>
            <a href="/contact" class="block py-2 text-sm uppercase tracking-wider text-brand">Contact</a>
        </div>
    </nav>

    <main>
        <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    </main>

    {{-- Footer --}}
    <footer class="bg-ink text-parchment/80 pt-16 pb-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <div>
                    @if($logoWhite = App\Models\SiteSetting::get('logo_white'))
                        <img src="{{ Storage::url($logoWhite) }}" alt="{{ App\Models\SiteSetting::get('site_name', config('app.name')) }}" class="h-16 mb-4">
                    @else
                        <span class="font-handwriting text-2xl text-brand block mb-4">Dust & Daisies</span>
                    @endif
                    <p class="text-sm leading-relaxed">{{ App\Models\SiteSetting::get('tagline', 'Guided tours and hiking trails through the magic of Namaqualand. Based in Springbok, Northern Cape.') }}</p>
                </div>
                <div>
                    <h4 class="text-sm uppercase tracking-widest text-brand mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="hover:text-brand transition">Home</a></li>
                        <li><a href="/day-tours" class="hover:text-brand transition">Day Tours</a></li>
                        <li><a href="/hiking-trails" class="hover:text-brand transition">Hiking Trails</a></li>
                        <li><a href="/about" class="hover:text-brand transition">About</a></li>
                        <li><a href="/gallery" class="hover:text-brand transition">Gallery</a></li>
                        <li><a href="/contact" class="hover:text-brand transition">Contact</a></li>
                        <li><a href="/privacy-policy" class="hover:text-brand transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm uppercase tracking-widest text-brand mb-4">Contact</h4>
                    <ul class="space-y-2 text-sm">
                        <li>Springbok, Northern Cape</li>
                        @if($phone = App\Models\SiteSetting::get('phone'))
                            <li><a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="hover:text-brand transition">{{ $phone }}</a></li>
                        @endif
                        @if($phone2 = App\Models\SiteSetting::get('phone_2'))
                            <li><a href="tel:{{ preg_replace('/\s+/', '', $phone2) }}" class="hover:text-brand transition">{{ $phone2 }}</a></li>
                        @endif
                        @if($email = App\Models\SiteSetting::get('email'))
                            <li><a href="mailto:{{ $email }}" class="hover:text-brand transition">{{ $email }}</a></li>
                        @endif
                    </ul>
                    <div class="flex gap-4 mt-4">
                        @if($facebook = App\Models\SiteSetting::get('facebook_url'))
                            <a href="{{ $facebook }}" target="_blank" aria-label="Facebook" class="hover:text-brand transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                        @endif
                        @if($instagram = App\Models\SiteSetting::get('instagram_url'))
                            <a href="{{ $instagram }}" target="_blank" aria-label="Instagram" class="hover:text-brand transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-t border-parchment/10 pt-6 text-center text-xs opacity-50">
                &copy; {{ date('Y') }} Dust and Daisies Tours. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- Cookie Consent --}}
    <div x-data="{ show: !localStorage.getItem('cookies_accepted') }" x-show="show" x-transition
         class="fixed bottom-0 inset-x-0 z-50 bg-ink text-parchment/90 p-4 shadow-lg">
        <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-between gap-4">
            <p class="text-sm">We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.
                <a href="/privacy-policy" class="text-brand underline">Privacy Policy</a>
            </p>
            <button @click="localStorage.setItem('cookies_accepted', '1'); show = false"
                    class="btn-stamp text-xs !py-2 !px-4">Accept</button>
        </div>
    </div>

</body>
</html>
