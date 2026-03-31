@aware(['page'])

<section class="section-shell">
    <div class="max-w-7xl mx-auto px-6">
        <div class="contact-grid">
            <div class="section-grid">
                <div class="section-header">
                    <span class="eyebrow">{{ $eyebrow ?? 'Make contact' }}</span>
                    @if ($heading ?? null)
                        <h2 class="section-title">{{ $heading }}</h2>
                    @endif
                    <div class="section-divider"></div>
                    @if ($body ?? null)
                        <p class="section-copy">{{ $body }}</p>
                    @endif
                </div>

                <div class="contact-card p-8 md:p-10 space-y-8">
                    <div>
                        <p class="text-[0.68rem] font-extrabold uppercase tracking-[0.22em] text-sage/65">{{ $infoHeading ?? 'Base camp' }}</p>
                        <p class="mt-3 text-3xl leading-none">{{ $locationName ?? 'Springbok' }}</p>
                        <p class="mt-2 text-sm text-ink/60">{{ $locationDetail ?? 'Northern Cape, South Africa' }}</p>
                    </div>

                    <div class="grid gap-6 text-sm">
                        @if ($phone = App\Models\SiteSetting::get('phone'))
                            <div>
                                <p class="field-label">{{ App\Models\SiteSetting::get('phone_label', 'Phone') }}</p>
                                <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="text-lg hover:text-brand">{{ $phone }}</a>
                            </div>
                        @endif
                        @if ($phone2 = App\Models\SiteSetting::get('phone_2'))
                            <div>
                                <p class="field-label">{{ App\Models\SiteSetting::get('phone_2_label', 'Phone 2') }}</p>
                                <a href="tel:{{ preg_replace('/\s+/', '', $phone2) }}" class="text-lg hover:text-brand">{{ $phone2 }}</a>
                            </div>
                        @endif
                        @if ($email = App\Models\SiteSetting::get('email'))
                            <div>
                                <p class="field-label">Email</p>
                                <a href="mailto:{{ $email }}" class="text-lg hover:text-brand break-all">{{ $email }}</a>
                            </div>
                        @endif
                    </div>

                    <div class="glass-panel p-4 text-sm leading-7 text-ink/64">
                        {{ $plannerNote ?? 'Tell us when you want to travel, how many people are joining, and whether you want blooms, geology, culture or hiking to lead the route.' }}
                    </div>
                </div>
            </div>

            <div class="section-grid">
                @if ($showForm ?? true)
                    <div class="form-shell p-7 md:p-10">
                        <livewire:contact-form />
                    </div>
                @endif

                <div class="expedition-card overflow-hidden min-h-[22rem]">
                    <iframe
                        src="{{ $mapEmbedUrl ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27089.86!2d17.88!3d-29.67!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c3622d19cb6f0a7%3A0x45a32a3b7b7f5c0!2sSpringbok%2C%20South%20Africa!5e0!3m2!1sen!2s!4v1' }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="min-h-[22rem]"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
