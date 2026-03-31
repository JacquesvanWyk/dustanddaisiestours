<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Z3d0X\FilamentFabricator\Models\Page;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Jacques van Wyk',
            'email' => 'jvw679@gmail.com',
            'password' => Hash::make('7912195031Jvw'),
        ]);

        User::create([
            'name' => 'Dust and Daisies',
            'email' => 'info@dustanddaisiestours.co.za',
            'password' => Hash::make('DustDaisies2026!'),
        ]);

        $settings = [
            'site_name' => 'Dust and Daisies Tours',
            'tagline' => 'Discover beauty in drought or abundance',
            'phone' => '082 909 0550',
            'phone_2' => '083 414 1048',
            'email' => 'info@dustanddaisiestours.co.za',
            'logo' => 'gallery/logo-daisy.jpg',
            'logo_white' => 'gallery/logo-white.png',
            'facebook_url' => 'https://www.facebook.com/DustDaisies/',
            'instagram_url' => 'https://www.instagram.com/dust_and_daisies_guided_tours/',
            'whatsapp_note' => "There may be times when our phones won't have coverage so please use WhatsApp to send a message or voice note.",
            'phone_label' => 'Elmarie',
            'phone_2_label' => 'Nicky',
            'location_region' => 'Northern Cape',
            'location_detail' => 'Springbok, Namaqualand',
            'meta_description' => 'Dust and Daisies Tours offers guided day tours and hiking trails through the magic of Namaqualand. Based in Springbok, Northern Cape.',
            'footer_tagline' => 'Designed for stories that start with the landscape',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }

        // Home
        Page::create([
            'title' => 'Home',
            'slug' => '/',
            'layout' => 'default',
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'variant' => 'full',
                        'heading' => 'Guided Namaqualand Tours',
                        'subheading' => 'Discover beauty in drought or abundance',
                        'cta_text' => 'Explore Tours',
                        'cta_link' => '/day-tours',
                        'image' => 'gallery/client-flower-walk.jpg',
                        'slides' => [
                            [
                                'heading' => 'Wildflower Season Awaits',
                                'subheading' => 'Experience the spectacular Namaqualand bloom',
                                'cta_text' => 'Flower Hunt Tour',
                                'cta_link' => '/day-tours#booking-form',
                                'image' => 'gallery/client-flower-walk.jpg',
                            ],
                            [
                                'heading' => 'Guided Namaqualand Tours',
                                'subheading' => 'Discover beauty in drought or abundance',
                                'cta_text' => 'Explore Tours',
                                'cta_link' => '/day-tours',
                                'image' => 'gallery/client-granite-range.jpg',
                            ],
                            [
                                'heading' => 'Hike the Untamed Trails',
                                'subheading' => 'From Goegap to Lewerberg — paths less travelled',
                                'cta_text' => 'View Hiking Trails',
                                'cta_link' => '/hiking-trails',
                                'image' => 'gallery/client-rock-plateau.jpg',
                            ],
                            [
                                'heading' => 'Namaqualand\'s Best Kept Secret',
                                'subheading' => 'Balanced rocks and geological wonders',
                                'cta_text' => 'Book a Tour',
                                'cta_link' => '/day-tours#booking-form',
                                'image' => 'gallery/client-aloe-vista.jpg',
                            ],
                        ],
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'About Dust and Daisies',
                        'body' => 'Dust and Daisies Tours is a specialist tour operator offering guided day tours and hiking trail experiences in and around Springbok in the Northern Cape. The Namaqualand region is a place of contrasts – barren and dry during the summer and a wonderland of colour after sufficient winter rains.',
                        'image' => 'gallery/client-aloe-vista.jpg',
                        'image_position' => 'right',
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Featured Day Tours',
                        'cards' => [
                            ['title' => 'The Copper Tour', 'summary' => "Explore the region's mining heritage, from Simon van der Stel's explorations to copper discoveries.", 'price' => 'R350 pp', 'duration' => '5 hours', 'distance' => '70km', 'guide_type' => 'self-drive', 'stamp' => 'Day route', 'label' => 'Curated itinerary', 'link' => '/day-tours', 'image' => 'gallery/copper-tour-landscape.jpg'],
                            ['title' => 'Kamiesberg Culture Tour', 'summary' => 'A guided self-drive experience through rural Kamiesberg villages with traditional food and entertainment.', 'price' => 'R1,500 pp', 'duration' => '8 hours', 'distance' => '330km', 'guide_type' => 'self-drive', 'stamp' => 'Day route', 'label' => 'Curated itinerary', 'link' => '/day-tours', 'image' => 'gallery/client-granite-range.jpg'],
                            ['title' => 'Flower Hunt', 'summary' => 'Experience the spectacular transformation of Namaqualand during flower season.', 'price' => 'From R650 pp', 'duration' => '8 hours', 'distance' => '320km', 'guide_type' => 'private-guide', 'stamp' => 'Seasonal route', 'label' => 'Curated itinerary', 'link' => '/day-tours', 'image' => 'gallery/client-flower-walk.jpg'],
                            ['title' => 'Geological Wonder Trip', 'summary' => 'The landscape is both mesmerising and overwhelmingly beautiful.', 'price' => 'R650 pp', 'duration' => '4-8 hours', 'distance' => '150km', 'guide_type' => 'private-guide', 'stamp' => 'Day route', 'label' => 'Curated itinerary', 'link' => '/day-tours', 'image' => 'gallery/geological-wonder.jpg'],
                        ],
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Day Hiking Trails',
                        'cards' => [
                            ['title' => 'Goegap Nature Reserve Day Hike', 'summary' => 'A guided experience through a 37,000-hectare reserve featuring spectacular scenery.', 'duration' => '4-8 hours', 'distance' => '7km', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience', 'link' => '/hiking-trails', 'image' => 'gallery/client-goegap-hiker.jpg'],
                            ['title' => 'Lewerberg Houtpad Hiking Trail', 'summary' => 'Ascend toward a granite formation with unspoilt and breathtaking views.', 'duration' => '4 hours', 'distance' => '6.5km', 'difficulty' => '320m elevation', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience', 'link' => '/hiking-trails', 'image' => 'gallery/lewerberg-trail.jpg'],
                            ['title' => 'Bruinkop Hiking Trail', 'summary' => 'Traverse unspoilt nature with lush vegetation endemic to the region.', 'duration' => '4 hours', 'distance' => '8.5km', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience', 'link' => '/hiking-trails', 'image' => 'gallery/mountain-flowers.jpg'],
                            ['title' => "Nicky's Ponder Trail", 'summary' => 'An easy-paced trail with thought-provoking directions that invite deep reflection.', 'duration' => '3 hours', 'distance' => '3km', 'difficulty' => 'Easy', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience', 'link' => '/hiking-trails', 'image' => 'gallery/client-ponder-sign.jpg'],
                        ],
                    ],
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Ready for an unforgettable Namaqualand Tour?',
                        'subheading' => 'Book your guided tour or hiking experience today',
                        'button_text' => 'Book Tour Now',
                        'button_link' => '/day-tours#booking-form',
                        'background_color' => 'orange',
                    ],
                ],
            ],
        ]);

        // Day Tours
        Page::create([
            'title' => 'Day Tours',
            'slug' => 'day-tours',
            'layout' => 'default',
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'heading' => 'Day Tours',
                        'subheading' => "Unfolding Namaqualand's hidden gems",
                        'image' => 'gallery/client-plateau-vista.jpg',
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Our Tours',
                        'cards' => [
                            ['title' => 'The Copper Tour', 'summary' => "A self-drive tour exploring the region's mining heritage. Visit the first copper mine in Springbok, the mining town of Concordia, and a decommissioned pump and museum in O'kiep.", 'price' => 'R350 pp', 'duration' => '5 hours', 'distance' => '70km', 'guide_type' => 'self-drive', 'stamp' => 'Day route', 'label' => 'Curated itinerary'],
                            ['title' => 'Kamiesberg Culture Tour', 'summary' => 'Guided self-drive through rural Kamiesberg villages. Visit a quiver tree house, learn about medicinal plants, enjoy traditional roosterbrood bread, and experience local violin entertainment.', 'price' => 'R1,500 pp', 'duration' => '8 hours', 'distance' => '330km', 'guide_type' => 'self-drive', 'stamp' => 'Day route', 'label' => 'Curated itinerary'],
                            ['title' => 'Flower Hunt', 'summary' => 'Experience the spectacular transformation of Namaqualand during flower season. Route varies based on optimal flowering locations.', 'price' => 'From R650 pp', 'duration' => '8 hours', 'distance' => '320km', 'guide_type' => 'private-guide', 'stamp' => 'Seasonal route', 'label' => 'Curated itinerary'],
                            ['title' => 'Geological Wonder Trip', 'summary' => 'See improbably balanced rocks and remarkable formations shaped by erosion – the best kept secret of Namaqualand.', 'price' => 'R650 pp', 'duration' => '4-8 hours', 'distance' => '150km', 'guide_type' => 'private-guide', 'stamp' => 'Day route', 'label' => 'Curated itinerary'],
                        ],
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'Tour Details',
                        'body' => '<p><strong>Tour Format:</strong> Convoy-style with minimum 2 vehicles, maximum 6 vehicles. Two-way radios provided. Guests drive personal vehicles; high ground clearance or 4×4 recommended (75% gravel roads).</p><p><strong>Minimum Group Size:</strong> 4 people</p><p><strong>Starting Point:</strong> Within 15 km radius of Springbok</p><p><strong>Guides:</strong> Nicky Morris and/or Elmarie Heyns</p><p><strong>What\'s Provided:</strong> Tour guides in company vehicle, two-way radios, conservation fees</p><p><strong>What to Bring:</strong> Own vehicle, lunch/snacks/water, sunscreen, hat, sturdy hiking boots, camera and binoculars</p><p><strong>Booking:</strong> First-come, first-served. 50% non-refundable deposit required. Children under 6 travel free.</p>',
                        'image' => 'gallery/client-granite-range.jpg',
                        'image_position' => 'left',
                    ],
                ],
                [
                    'type' => 'booking-form',
                    'data' => [
                        'heading' => 'Book Your Tour',
                        'body' => 'Make a booking or require further information about our guided tours.',
                    ],
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Have Questions?',
                        'button_text' => 'Contact Us',
                        'button_link' => '/contact',
                        'background_color' => 'orange',
                    ],
                ],
            ],
        ]);

        // Hiking Trails
        Page::create([
            'title' => 'Hiking Trails',
            'slug' => 'hiking-trails',
            'layout' => 'default',
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'heading' => 'Hiking Trails',
                        'subheading' => 'Discover the essence of Namaqualand',
                        'image' => 'gallery/client-rock-plateau.jpg',
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Our Trails',
                        'cards' => [
                            ['title' => 'Goegap Nature Reserve', 'summary' => '37,000-hectare reserve with 46 mammal, 38 reptile, 88 bird and nearly 600 plant species. Suitable for varying ages and fitness levels.', 'price' => 'R400 pp', 'duration' => '4-8 hours', 'distance' => '7km', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience'],
                            ['title' => 'Lewerberg Houtpad', 'summary' => 'Unspoilt and breathtaking views. Ages 12+.', 'price' => 'R450 pp', 'duration' => '4 hours', 'distance' => '6.5km', 'difficulty' => '320m elevation, 18% avg slope', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience'],
                            ['title' => 'Bruinkop', 'summary' => 'Quiver tree clusters with infinite landscape views. Suitable for different ages and fitness levels.', 'price' => 'R400 pp', 'duration' => '4 hours', 'distance' => '8.5km', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience'],
                            ['title' => "Nicky's Ponder Trail", 'summary' => 'Easy-paced trail with thought-provoking directions through beautiful landscape and towering granite domes.', 'price' => 'R250 pp', 'duration' => '3 hours', 'distance' => '3km', 'difficulty' => 'Easy', 'guide_type' => 'guided-hike', 'stamp' => 'Field walk', 'label' => 'Trail experience'],
                        ],
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'Trail Details',
                        'body' => '<p><strong>Guides:</strong> Nicky Morris and/or Elmarie Heyns</p><p><strong>Minimum Booking:</strong> 4 people required</p><p><strong>Location:</strong> All trails start/end within 15km radius of Springbok</p><p><strong>What\'s Provided:</strong> Tour guides, conservation fees</p><p><strong>What to Bring:</strong> Lunch/snacks/water, sunscreen, hat, sturdy hiking boots, walking stick/trekking poles, camera and binoculars</p><p><strong>Booking:</strong> 50% non-refundable deposit required.</p>',
                        'image' => 'gallery/client-ponder-pool.jpg',
                        'image_position' => 'right',
                    ],
                ],
                [
                    'type' => 'booking-form',
                    'data' => [
                        'heading' => 'Book Your Hike',
                        'body' => 'Make a booking or require further information about our hiking trails.',
                    ],
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Have Questions?',
                        'button_text' => 'Contact Us',
                        'button_link' => '/contact',
                        'background_color' => 'orange',
                    ],
                ],
            ],
        ]);

        // About
        Page::create([
            'title' => 'About',
            'slug' => 'about',
            'layout' => 'default',
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'heading' => 'About Us',
                        'subheading' => 'Discover beauty in drought or abundance',
                        'image' => 'gallery/client-aloe-vista.jpg',
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'Our Mission',
                        'body' => "Our mission is to inspire an appreciation of Namaqualand's natural beauty and traditions, giving the client an unforgettable sense of discovery while contributing to the sustainable upliftment of our communities.",
                        'image' => 'gallery/client-flower-walk.jpg',
                        'image_position' => 'right',
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Meet Our Guides',
                        'cards' => [
                            ['title' => 'Nicky Morris', 'summary' => 'A Namaqualand native and artist who serves as a registered culture guide. She brings knowledge of regional history, cultural practices, traditional lifestyles, and local flora.', 'stamp' => 'Culture guide', 'label' => 'Tour guide', 'image' => 'gallery/guide-nicky.png'],
                            ['title' => 'Elmarie Heyns', 'summary' => "Specializes in nature and environmental appreciation. With extensive biodiversity management and guiding background, she educates visitors about Namaqualand's distinctive fauna, flora, and ecological survival strategies.", 'stamp' => 'Nature guide', 'label' => 'Tour guide', 'image' => 'gallery/guide-elmarie.png'],
                        ],
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'What We Offer',
                        'body' => '<ul><li>History tours</li><li>Culture and traditional lifestyle experiences</li><li>Plants and flowers guided walks</li><li>Wildlife and bird watching</li><li>Stargazing experiences</li></ul>',
                        'image' => 'gallery/client-ponder-sign.jpg',
                        'image_position' => 'left',
                    ],
                ],
            ],
        ]);

        // Gallery
        Page::create([
            'title' => 'Gallery',
            'slug' => 'gallery',
            'layout' => 'default',
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'heading' => 'Gallery',
                        'subheading' => 'Discover beauty in drought or abundance',
                        'image' => 'gallery/client-granite-range.jpg',
                    ],
                ],
                ['type' => 'gallery', 'data' => ['heading' => 'Copper Tour', 'images' => [
                    ['image' => 'gallery/client-granite-range.jpg', 'alt' => 'Copper Tour landscape', 'caption' => 'Mining heritage of Namaqualand'],
                    ['image' => 'gallery/client-aloe-vista.jpg', 'alt' => 'Rocky terrain', 'caption' => 'Ancient copper mining routes'],
                    ['image' => 'gallery/rocky-terrain-2.jpg', 'alt' => 'Rocky formations', 'caption' => 'Geological history revealed'],
                    ['image' => 'gallery/sam-landscape-1.jpg', 'alt' => 'Landscape view', 'caption' => 'Northern Cape vistas'],
                ]]],
                ['type' => 'gallery', 'data' => ['heading' => 'Culture Tour', 'images' => [
                    ['image' => 'gallery/kamiesberg-view.jpg', 'alt' => 'Kamiesberg view', 'caption' => 'Kamiesberg mountain views'],
                    ['image' => 'gallery/client-goegap-hiker.jpg', 'alt' => 'Tour adventure', 'caption' => 'Rural village experience'],
                    ['image' => 'gallery/tour-adventure-2.jpg', 'alt' => 'Tour adventure', 'caption' => 'Traditional Namaqualand culture'],
                    ['image' => 'gallery/tour-adventure-3.jpg', 'alt' => 'Tour adventure', 'caption' => 'Quiver tree forest'],
                ]]],
                ['type' => 'gallery', 'data' => ['heading' => 'Flower Hunt', 'images' => [
                    ['image' => 'gallery/client-flower-walk.jpg', 'alt' => 'Namaqualand flowers', 'caption' => 'Namaqualand in full bloom'],
                    ['image' => 'gallery/namaqualand-flowers-2.jpg', 'alt' => 'Wildflowers', 'caption' => 'Spring wildflower carpet'],
                    ['image' => 'gallery/flower-hunt-1.jpg', 'alt' => 'Flower hunt', 'caption' => 'Seasonal floral display'],
                    ['image' => 'gallery/flower-hunt-2.jpg', 'alt' => 'Flower hunt', 'caption' => "Nature's floral tapestry"],
                    ['image' => 'gallery/spring-blooms-2.jpg', 'alt' => 'Spring blooms', 'caption' => 'Early morning magic'],
                    ['image' => 'gallery/spring-blooms-3.jpg', 'alt' => 'Spring blooms', 'caption' => 'Wildflower meadow'],
                    ['image' => 'gallery/springbok-flowers.jpg', 'alt' => 'Springbok flowers', 'caption' => 'Flowers near Springbok'],
                    ['image' => 'gallery/wildflowers-closeup.jpg', 'alt' => 'Wildflowers closeup', 'caption' => 'Delicate desert blooms'],
                    ['image' => 'gallery/wildflowers-field.jpg', 'alt' => 'Wildflower field', 'caption' => 'Fields of colour'],
                ]]],
                ['type' => 'gallery', 'data' => ['heading' => 'Geological Wonder', 'images' => [
                    ['image' => 'gallery/client-plateau-vista.jpg', 'alt' => 'Geological wonder', 'caption' => 'Balanced rock formations'],
                    ['image' => 'gallery/desert-landscape-1.jpg', 'alt' => 'Desert landscape', 'caption' => 'Ancient erosion patterns'],
                    ['image' => 'gallery/desert-landscape-2.jpg', 'alt' => 'Desert landscape', 'caption' => 'The best kept secret of Namaqualand'],
                    ['image' => 'gallery/sam-landscape-2.jpg', 'alt' => 'Landscape', 'caption' => 'Remarkable formations'],
                ]]],
                ['type' => 'gallery', 'data' => ['heading' => 'Goegap Hiking', 'images' => [
                    ['image' => 'gallery/client-goegap-hiker.jpg', 'alt' => 'Goegap trail', 'caption' => 'Goegap Nature Reserve'],
                    ['image' => 'gallery/succulent-garden.jpg', 'alt' => 'Succulent garden', 'caption' => 'Unique desert succulents'],
                    ['image' => 'gallery/desert-flora.jpg', 'alt' => 'Desert flora', 'caption' => 'Resilient desert plants'],
                    ['image' => 'gallery/spring-blooms-4.jpg', 'alt' => 'Spring blooms', 'caption' => 'Goegap in spring'],
                ]]],
                ['type' => 'gallery', 'data' => ['heading' => 'Ponder Trail', 'images' => [
                    ['image' => 'gallery/client-ponder-sign.jpg', 'alt' => 'Nature trail', 'caption' => 'Reflective moments on the trail'],
                    ['image' => 'gallery/mountain-view.jpg', 'alt' => 'Mountain view', 'caption' => 'Towering granite domes'],
                    ['image' => 'gallery/golden-hour.jpg', 'alt' => 'Golden hour', 'caption' => 'Golden light on the path'],
                    ['image' => 'gallery/client-ponder-landscape.jpg', 'alt' => 'Trail scenery', 'caption' => 'Beauty in every direction'],
                ]]],
                ['type' => 'gallery', 'data' => ['heading' => 'Lewerberg Houtpad', 'images' => [
                    ['image' => 'gallery/lewerberg-trail.jpg', 'alt' => 'Lewerberg trail', 'caption' => 'Ascending the Lewerberg'],
                    ['image' => 'gallery/client-rock-plateau.jpg', 'alt' => 'Mountain hiking', 'caption' => 'Breathtaking summit views'],
                    ['image' => 'gallery/sunrise-hike.jpg', 'alt' => 'Sunrise hike', 'caption' => 'Early morning ascent'],
                    ['image' => 'gallery/trail-scenery-2.jpg', 'alt' => 'Trail scenery', 'caption' => 'Unspoilt mountain paths'],
                ]]],
                ['type' => 'gallery', 'data' => ['heading' => 'Bruinkop', 'images' => [
                    ['image' => 'gallery/mountain-flowers.jpg', 'alt' => 'Mountain flowers', 'caption' => 'Flora along the trail'],
                    ['image' => 'gallery/client-ponder-pool.jpg', 'alt' => 'Landscape vista', 'caption' => 'Infinite landscape views'],
                    ['image' => 'gallery/group-hike-1.jpg', 'alt' => 'Group hike', 'caption' => 'Exploring together'],
                    ['image' => 'gallery/evening-sky.jpg', 'alt' => 'Evening sky', 'caption' => 'Sunset over Bruinkop'],
                ]]],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Ready for an unforgettable tour?',
                        'button_text' => 'Book Tour Now',
                        'button_link' => '/day-tours#booking-form',
                        'background_color' => 'orange',
                    ],
                ],
            ],
        ]);

        // Privacy Policy
        Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'layout' => 'default',
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'heading' => 'Privacy Policy',
                        'subheading' => 'How we handle your information',
                        'image' => 'gallery/desert-landscape-1.jpg',
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'Privacy Policy',
                        'body' => '<h3>Information We Collect</h3><p>When you use our booking or contact forms, we collect your name, email address, phone number, and any message you provide. This information is used solely to process your tour bookings and respond to enquiries.</p><h3>How We Use Your Information</h3><p>We use your personal information to: confirm and manage tour bookings, respond to your enquiries, send booking-related communications, and improve our services.</p><h3>Data Sharing</h3><p>We do not sell, trade, or share your personal information with third parties, except as required by law or to process your booking.</p><h3>Data Security</h3><p>We take reasonable measures to protect your personal information. However, no method of electronic transmission or storage is 100% secure.</p><h3>Cookies</h3><p>Our website may use cookies to enhance your browsing experience. You can choose to disable cookies through your browser settings.</p><h3>Your Rights</h3><p>Under POPIA (Protection of Personal Information Act), you have the right to access, correct, or delete your personal information. Contact us at info@dustanddaisiestours.co.za to exercise these rights.</p><h3>Contact</h3><p>For privacy-related enquiries, contact us at info@dustanddaisiestours.co.za or call 082 909 0550.</p><p><em>Last updated: March 2026</em></p>',
                        'image' => null,
                        'image_position' => 'right',
                    ],
                ],
            ],
        ]);

        // Contact
        Page::create([
            'title' => 'Contact',
            'slug' => 'contact',
            'layout' => 'default',
            'blocks' => [
                [
                    'type' => 'hero',
                    'data' => [
                        'heading' => 'Contact Us',
                        'subheading' => 'Get in touch to book your Namaqualand adventure',
                        'image' => 'gallery/sunset-landscape.jpg',
                    ],
                ],
                [
                    'type' => 'contact',
                    'data' => [
                        'heading' => 'Get In Touch',
                        'body' => "There may be times when our phones won't have coverage so please use WhatsApp to send a message or voice note.\n\nPhone: 082 909 0550 / 083 414 1048\nEmail: info@dustanddaisiestours.co.za",
                        'show_form' => true,
                    ],
                ],
            ],
        ]);
    }
}
