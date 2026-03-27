@aware(['page'])

<section class="bg-parchment-dark py-20">
    <div class="max-w-4xl mx-auto px-4">
        @if($heading ?? null)
            <div class="text-center mb-12">
                <p class="font-handwriting text-xl text-brand mb-1">Get in Touch</p>
                <h2 class="text-3xl md:text-4xl font-bold">{{ $heading }}</h2>
                <div class="w-16 h-0.5 bg-brand mx-auto mt-4"></div>
            </div>
        @endif

        @if($body ?? null)
            <p class="text-center text-lg opacity-80 mb-10 max-w-xl mx-auto">{{ $body }}</p>
        @endif

        <div class="grid md:grid-cols-2 gap-12">
            <div class="margin-line pl-6 ruled-bg space-y-4">
                @if($phone = App\Models\SiteSetting::get('phone'))
                    <div>
                        <p class="font-handwriting text-brand">Phone</p>
                        <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="hover:text-brand transition">{{ $phone }}</a>
                    </div>
                @endif
                @if($phone2 = App\Models\SiteSetting::get('phone_2'))
                    <div>
                        <p class="font-handwriting text-brand">Phone 2</p>
                        <a href="tel:{{ preg_replace('/\s+/', '', $phone2) }}" class="hover:text-brand transition">{{ $phone2 }}</a>
                    </div>
                @endif
                @if($email = App\Models\SiteSetting::get('email'))
                    <div>
                        <p class="font-handwriting text-brand">Email</p>
                        <a href="mailto:{{ $email }}" class="hover:text-brand transition">{{ $email }}</a>
                    </div>
                @endif
                <div>
                    <p class="font-handwriting text-brand">Location</p>
                    <p>Springbok, Northern Cape</p>
                </div>
            </div>

            @if($show_form ?? true)
                <livewire:contact-form />
            @endif
        </div>

        <div class="mt-12">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27089.86!2d17.88!3d-29.67!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c3622d19cb6f0a7%3A0x45a32a3b7b7f5c0!2sSpringbok%2C%20South%20Africa!5e0!3m2!1sen!2s!4v1"
                width="100%"
                height="300"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded shadow-md"
            ></iframe>
        </div>
    </div>
</section>
