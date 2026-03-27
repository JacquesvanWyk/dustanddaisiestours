@aware(['page'])

<section class="bg-sand-dark py-24 bg-daisies">
    <div class="max-w-5xl mx-auto px-6">
        @if($heading ?? null)
            <div class="text-center mb-16">
                <p class="font-accent text-2xl text-brand mb-2">Get in Touch</p>
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="section-divider mt-5"></div>
            </div>
        @endif

        @if($body ?? null)
            <p class="text-center text-lg text-ink/60 mb-14 max-w-xl mx-auto leading-relaxed">{{ $body }}</p>
        @endif

        <div class="grid md:grid-cols-5 gap-16">
            <div class="md:col-span-2 margin-line pl-6 ruled-bg space-y-8">
                @if($phone = App\Models\SiteSetting::get('phone'))
                    <div>
                        <p class="font-accent text-xl text-brand mb-1">Phone</p>
                        <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="text-lg hover:text-brand transition">{{ $phone }}</a>
                    </div>
                @endif
                @if($phone2 = App\Models\SiteSetting::get('phone_2'))
                    <div>
                        <p class="font-accent text-xl text-brand mb-1">Phone 2</p>
                        <a href="tel:{{ preg_replace('/\s+/', '', $phone2) }}" class="text-lg hover:text-brand transition">{{ $phone2 }}</a>
                    </div>
                @endif
                @if($email = App\Models\SiteSetting::get('email'))
                    <div>
                        <p class="font-accent text-xl text-brand mb-1">Email</p>
                        <a href="mailto:{{ $email }}" class="text-lg hover:text-brand transition">{{ $email }}</a>
                    </div>
                @endif
                <div>
                    <p class="font-accent text-xl text-brand mb-1">Location</p>
                    <p class="text-lg">Springbok, Northern Cape</p>
                </div>
            </div>

            <div class="md:col-span-3">
                @if($show_form ?? true)
                    <livewire:contact-form />
                @endif
            </div>
        </div>

        <div class="mt-16">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27089.86!2d17.88!3d-29.67!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c3622d19cb6f0a7%3A0x45a32a3b7b7f5c0!2sSpringbok%2C%20South%20Africa!5e0!3m2!1sen!2s!4v1"
                width="100%"
                height="350"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="shadow-lg"
            ></iframe>
        </div>
    </div>
</section>
