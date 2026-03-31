@props(['page'])

@php
    $siteName = App\Models\SiteSetting::get('site_name', config('app.name'));
    $tagline = App\Models\SiteSetting::get('tagline', 'Guided Namaqualand Tours');
    $pageTitle = $page->title === 'Home' ? $siteName.' - '.$tagline : $page->title.' - '.$siteName;
    $metaDesc = App\Models\SiteSetting::get('meta_description', 'Dust and Daisies Tours offers guided day tours and hiking trails through the magic of Namaqualand. Based in Springbok, Northern Cape.');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $page->title === 'Home' ? $metaDesc : $page->title.' - '.$siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Cormorant+Garamond:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-shell antialiased" x-data="{ mobileOpen: false }">
    <div class="site-topbar">
        <div class="max-w-7xl mx-auto px-6 py-3 flex flex-wrap items-center justify-between gap-3 text-[0.72rem]">
            <div class="flex flex-wrap items-center gap-3 sm:gap-5">
                <span class="pill border border-white/10 bg-white/5 text-white/70">{{ App\Models\SiteSetting::get('location_region', 'Northern Cape') }}</span>
                <span class="hidden sm:inline text-white/25">/</span>
                <span class="uppercase tracking-[0.2em] text-white/48">{{ App\Models\SiteSetting::get('location_detail', 'Springbok, Namaqualand') }}</span>
            </div>
            <div class="flex flex-wrap items-center gap-3 sm:gap-5">
                @if($phone = App\Models\SiteSetting::get('phone'))
                    <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="flex items-center gap-1.5 hover:text-white">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                        <span>{{ $phone }}</span>
                    </a>
                @endif
                @if($email = App\Models\SiteSetting::get('email'))
                    <a href="mailto:{{ $email }}" class="hidden sm:inline hover:text-white">{{ $email }}</a>
                @endif
                @if($instagram = App\Models\SiteSetting::get('instagram_url'))
                    <a href="{{ $instagram }}" target="_blank" rel="noopener" class="text-white/56 hover:text-white" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                @endif
                @if($facebook = App\Models\SiteSetting::get('facebook_url'))
                    <a href="{{ $facebook }}" target="_blank" rel="noopener" class="text-white/56 hover:text-white" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <nav class="site-nav">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between gap-6 py-4">
                <a href="/" class="flex items-center gap-4">
                    @if($headerLogo = App\Models\SiteSetting::get('logo'))
                        <img src="{{ Storage::url($headerLogo) }}" alt="{{ $siteName }}" class="h-[4.4rem] md:h-[5.1rem] w-auto object-contain drop-shadow-[0_6px_14px_rgba(0,0,0,0.10)]">
                    @elseif(file_exists(public_path('images/logo.png')))
                        <img src="{{ asset('images/logo.png') }}" alt="{{ $siteName }}" class="h-[4.4rem] md:h-[5.1rem] w-auto object-contain drop-shadow-[0_6px_14px_rgba(0,0,0,0.10)]">
                    @else
                        <span class="brand-mark">
                            <strong>Dust &amp; Daisies</strong>
                            <span>Namaqualand tours</span>
                        </span>
                    @endif
                </a>

                <div class="hidden lg:flex items-center gap-8">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'is-active' : '' }}">Home</a>
                    <a href="/day-tours" class="nav-link {{ request()->is('day-tours') ? 'is-active' : '' }}">Day Tours</a>
                    <a href="/hiking-trails" class="nav-link {{ request()->is('hiking-trails') ? 'is-active' : '' }}">Hiking Trails</a>
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'is-active' : '' }}">About</a>
                    <a href="/gallery" class="nav-link {{ request()->is('gallery') ? 'is-active' : '' }}">Gallery</a>
                    <a href="/contact" class="btn-primary">Plan A Journey</a>
                </div>

                <button @click="mobileOpen = !mobileOpen" class="lg:hidden inline-flex items-center justify-center w-12 h-12 border border-ink/10 bg-white/50" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path x-show="!mobileOpen" stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileOpen" stroke-linecap="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div x-show="mobileOpen" x-transition.origin.top class="lg:hidden pb-6">
                <div class="glass-panel p-5 flex flex-col gap-2">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'is-active' : '' }}">Home</a>
                    <a href="/day-tours" class="nav-link {{ request()->is('day-tours') ? 'is-active' : '' }}">Day Tours</a>
                    <a href="/hiking-trails" class="nav-link {{ request()->is('hiking-trails') ? 'is-active' : '' }}">Hiking Trails</a>
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'is-active' : '' }}">About</a>
                    <a href="/gallery" class="nav-link {{ request()->is('gallery') ? 'is-active' : '' }}">Gallery</a>
                    <a href="/contact" class="btn-primary mt-3">Plan A Journey</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    </main>

    <footer class="site-footer pt-24 pb-10">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid gap-14 lg:grid-cols-[1.3fr_0.8fr_0.8fr]">
                <div class="space-y-6">
                    <span class="eyebrow text-white/65">Expedition office</span>
                    <div>
                        @if($footerLogo = App\Models\SiteSetting::get('logo_white'))
                            <img src="{{ Storage::url($footerLogo) }}" alt="{{ $siteName }}" class="h-20 md:h-24 w-auto object-contain mb-5">
                        @elseif(file_exists(public_path('images/logo-white.png')))
                            <img src="{{ asset('images/logo-white.png') }}" alt="{{ $siteName }}" class="h-20 md:h-24 w-auto object-contain mb-5">
                        @else
                            <h2 class="text-4xl md:text-5xl text-white leading-none">{{ $siteName }}</h2>
                        @endif
                        <p class="mt-4 max-w-xl text-sm md:text-base leading-8 text-white/62">
                            {{ App\Models\SiteSetting::get('tagline', 'Guided Namaqualand Tours') }}
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        @if($phone = App\Models\SiteSetting::get('phone'))
                            <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="pill border border-white/12 bg-white/6 text-white/80">{{ $phone }}</a>
                        @endif
                        @if($phone2 = App\Models\SiteSetting::get('phone_2'))
                            <a href="tel:{{ preg_replace('/\s+/', '', $phone2) }}" class="pill border border-white/12 bg-white/6 text-white/80">{{ $phone2 }}</a>
                        @endif
                        @if($email = App\Models\SiteSetting::get('email'))
                            <a href="mailto:{{ $email }}" class="pill border border-white/12 bg-white/6 text-white/80">{{ $email }}</a>
                        @endif
                    </div>
                </div>

                <div>
                    <p class="text-[0.7rem] font-extrabold uppercase tracking-[0.24em] text-white/36 mb-6">Explore</p>
                    <div class="space-y-3 text-sm">
                        <a href="/" class="block hover:text-white">Home</a>
                        <a href="/day-tours" class="block hover:text-white">Day Tours</a>
                        <a href="/hiking-trails" class="block hover:text-white">Hiking Trails</a>
                        <a href="/about" class="block hover:text-white">About</a>
                        <a href="/gallery" class="block hover:text-white">Gallery</a>
                        <a href="/contact" class="block hover:text-white">Contact</a>
                    </div>
                </div>

                <div>
                    <p class="text-[0.7rem] font-extrabold uppercase tracking-[0.24em] text-white/36 mb-6">Field base</p>
                    <div class="space-y-4 text-sm leading-7">
                        <p>{{ App\Models\SiteSetting::get('address', 'Springbok, Northern Cape, South Africa') }}</p>
                        @if($facebook = App\Models\SiteSetting::get('facebook_url'))
                            <a href="{{ $facebook }}" target="_blank" rel="noopener" class="block hover:text-white">Facebook</a>
                        @endif
                        @if($instagram = App\Models\SiteSetting::get('instagram_url'))
                            <a href="{{ $instagram }}" target="_blank" rel="noopener" class="block hover:text-white">Instagram</a>
                        @endif
                        <a href="/privacy-policy" class="block hover:text-white">Privacy Policy</a>
                    </div>
                </div>
            </div>

            <div class="mt-16 pt-6 border-t border-white/10 flex flex-wrap items-center justify-between gap-3 text-[0.72rem] text-white/34 uppercase tracking-[0.18em]">
                <span>&copy; {{ date('Y') }} {{ $siteName }}</span>
                <span>{{ App\Models\SiteSetting::get('footer_tagline', 'Designed for stories that start with the landscape') }}</span>
            </div>
        </div>
    </footer>

    <div x-data="{ show: !localStorage.getItem('cookies_accepted') }" x-show="show" x-transition class="fixed bottom-5 inset-x-0 z-50 px-5">
        <div class="max-w-4xl mx-auto glass-panel px-5 py-4 flex flex-wrap items-center justify-between gap-4">
            <p class="text-sm text-ink/70">
                We use cookies to improve the trip planning experience.
                <a href="/privacy-policy" class="underline underline-offset-2 text-brand">Privacy Policy</a>
            </p>
            <button @click="localStorage.setItem('cookies_accepted', '1'); show = false" class="btn-primary">Accept</button>
        </div>
    </div>
</body>
</html>
