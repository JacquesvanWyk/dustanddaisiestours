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
            'name' => 'Admin',
            'email' => 'jvw679@gmail.com',
            'password' => Hash::make('7912195031Jvw'),
        ]);

        $settings = [
            'site_name' => 'Dust and Daisies Tours',
            'tagline' => 'Discover beauty in drought or abundance',
            'phone' => '082 909 0550',
            'phone_2' => '083 414 1048',
            'email' => 'info@dustanddaisiestours.co.za',
            'facebook_url' => 'https://www.facebook.com/DustDaisies/',
            'instagram_url' => 'https://www.instagram.com/dust_and_daisies_guided_tours/',
            'whatsapp_note' => "There may be times when our phones won't have coverage so please use WhatsApp to send a message or voice note.",
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
                        'heading' => 'Guided Namaqualand Tours',
                        'subheading' => 'Guided tours of the Namaqualand region, its towns, its people and its unique biodiversity',
                        'cta_text' => 'Day Tours',
                        'cta_link' => '/day-tours',
                        'image' => null,
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'About Dust and Daisies',
                        'body' => 'Dust and Daisies Tours is a specialist tour operator offering guided day tours and hiking trail experiences in and around Springbok in the Northern Cape. The Namaqualand region is a place of contrasts – barren and dry during the summer and a wonderland of colour after sufficient winter rains.',
                        'image' => null,
                        'image_position' => 'right',
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Featured Day Tours',
                        'cards' => [
                            ['title' => 'The Copper Tour', 'description' => "Explore the region's mining heritage, from Simon van der Stel's explorations to copper discoveries.", 'link' => '/day-tours'],
                            ['title' => 'Kamiesberg Culture Tour', 'description' => 'A guided self-drive experience through rural Kamiesberg villages with traditional food and entertainment.', 'link' => '/day-tours'],
                            ['title' => 'Flower Hunt', 'description' => 'Experience the spectacular transformation of Namaqualand during flower season.', 'link' => '/day-tours'],
                            ['title' => 'Geological Wonder Trip', 'description' => 'The landscape is both mesmerising and overwhelmingly beautiful.', 'link' => '/day-tours'],
                        ],
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Day Hiking Trails',
                        'cards' => [
                            ['title' => 'Goegap Nature Reserve Day Hike', 'description' => 'A guided experience through a 37,000-hectare reserve featuring spectacular scenery.', 'link' => '/hiking-trails'],
                            ['title' => 'Lewerberg Houtpad Hiking Trail', 'description' => 'Ascend toward a granite formation with unspoilt and breathtaking views.', 'link' => '/hiking-trails'],
                            ['title' => 'Bruinkop Hiking Trail', 'description' => 'Traverse unspoilt nature with lush vegetation endemic to the region.', 'link' => '/hiking-trails'],
                            ["title" => "Nicky's Ponder Trail", 'description' => 'An easy-paced trail with thought-provoking directions that invite deep reflection.', 'link' => '/hiking-trails'],
                        ],
                    ],
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Ready for an unforgettable Namaqualand Tour?',
                        'subheading' => 'Book your guided tour or hiking experience today',
                        'button_text' => 'Book Tour Now',
                        'button_link' => '/contact',
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
                        'image' => null,
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Our Tours',
                        'cards' => [
                            ['title' => 'The Copper Tour – R350 per person', 'description' => "A self-drive tour exploring the region's mining heritage. Visit the first copper mine in Springbok, the mining town of Concordia, and a decommissioned pump and museum in O'kiep. Distance: ~70km, Duration: 5 hours."],
                            ['title' => 'Kamiesberg Culture Tour – R1,500 per person', 'description' => 'Guided self-drive through rural Kamiesberg villages. Visit a quiver tree house, learn about medicinal plants, enjoy traditional roosterbrood bread, and experience local violin entertainment. Distance: ~330km, Duration: 8 hours.'],
                            ['title' => 'Flower Hunt – From R650 per person', 'description' => 'Experience the spectacular transformation of Namaqualand during flower season. Route varies based on optimal flowering locations. Distance: ~320km, Duration: 8 hours.'],
                            ['title' => 'Geological Wonder Trip – R650 per person', 'description' => 'See improbably balanced rocks and remarkable formations shaped by erosion – the best kept secret of Namaqualand. Distance: ~150km, Duration: 4-8 hours.'],
                        ],
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'Tour Details',
                        'body' => '<p><strong>Tour Format:</strong> Convoy-style with minimum 2 vehicles, maximum 6 vehicles. Two-way radios provided. Guests drive personal vehicles; high ground clearance or 4×4 recommended (75% gravel roads).</p><p><strong>Minimum Group Size:</strong> 4 people</p><p><strong>Starting Point:</strong> Within 15 km radius of Springbok</p><p><strong>Guides:</strong> Nicky Morris and/or Elmarie Heyns</p><p><strong>What\'s Provided:</strong> Tour guides in company vehicle, two-way radios, conservation fees</p><p><strong>What to Bring:</strong> Own vehicle, lunch/snacks/water, sunscreen, hat, sturdy hiking boots, camera and binoculars</p><p><strong>Booking:</strong> First-come, first-served. 50% non-refundable deposit required. Children under 6 travel free.</p>',
                        'image' => null,
                        'image_position' => 'left',
                    ],
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Book Your Tour',
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
                        'image' => null,
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Our Trails',
                        'cards' => [
                            ['title' => 'Goegap Nature Reserve – R400/person', 'description' => '4-8 hours, 7km route through a 37,000-hectare reserve with 46 mammal, 38 reptile, 88 bird and nearly 600 plant species. Suitable for varying ages and fitness levels.'],
                            ['title' => 'Lewerberg Houtpad – R450/person', 'description' => '4 hours, 6.5km route with 320m elevation gain and 18% average slope. Unspoilt and breathtaking views. Ages 12+.'],
                            ['title' => 'Bruinkop – R400/person', 'description' => '4 hours, 8.5km route through quiver tree clusters with infinite landscape views. Suitable for different ages and fitness levels.'],
                            ["title" => "Nicky's Ponder Trail – R250/person", 'description' => '3 hours, 3km easy-paced trail with thought-provoking directions through beautiful landscape and towering granite domes.'],
                        ],
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'Trail Details',
                        'body' => '<p><strong>Guides:</strong> Nicky Morris and/or Elmarie Heyns</p><p><strong>Minimum Booking:</strong> 4 people required</p><p><strong>Location:</strong> All trails start/end within 15km radius of Springbok</p><p><strong>What\'s Provided:</strong> Tour guides, conservation fees</p><p><strong>What to Bring:</strong> Lunch/snacks/water, sunscreen, hat, sturdy hiking boots, walking stick/trekking poles, camera and binoculars</p><p><strong>Booking:</strong> 50% non-refundable deposit required.</p>',
                        'image' => null,
                        'image_position' => 'right',
                    ],
                ],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Book Your Hike',
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
                        'image' => null,
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'Our Mission',
                        'body' => "Our mission is to inspire an appreciation of Namaqualand's natural beauty and traditions, giving the client an unforgettable sense of discovery while contributing to the sustainable upliftment of our communities.",
                        'image' => null,
                        'image_position' => 'right',
                    ],
                ],
                [
                    'type' => 'card-grid',
                    'data' => [
                        'heading' => 'Meet Our Guides',
                        'cards' => [
                            ['title' => 'Nicky Morris', 'description' => 'A Namaqualand native and artist who serves as a registered culture guide. She brings knowledge of regional history, cultural practices, traditional lifestyles, and local flora.'],
                            ['title' => 'Elmarie Heyns', 'description' => "Specializes in nature and environmental appreciation. With extensive biodiversity management and guiding background, she educates visitors about Namaqualand's distinctive fauna, flora, and ecological survival strategies."],
                        ],
                    ],
                ],
                [
                    'type' => 'text-image',
                    'data' => [
                        'heading' => 'What We Offer',
                        'body' => '<ul><li>History tours</li><li>Culture and traditional lifestyle experiences</li><li>Plants and flowers guided walks</li><li>Wildlife and bird watching</li><li>Stargazing experiences</li></ul>',
                        'image' => null,
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
                        'image' => null,
                    ],
                ],
                ['type' => 'gallery', 'data' => ['heading' => 'Copper Tour', 'images' => []]],
                ['type' => 'gallery', 'data' => ['heading' => 'Culture Tour', 'images' => []]],
                ['type' => 'gallery', 'data' => ['heading' => 'Flower Hunting', 'images' => []]],
                ['type' => 'gallery', 'data' => ['heading' => 'Geological Wonder', 'images' => []]],
                ['type' => 'gallery', 'data' => ['heading' => 'Goegap Hiking', 'images' => []]],
                ['type' => 'gallery', 'data' => ['heading' => 'Ponder Trail', 'images' => []]],
                ['type' => 'gallery', 'data' => ['heading' => 'Lewerberg Houtpad', 'images' => []]],
                ['type' => 'gallery', 'data' => ['heading' => 'Bruinkop', 'images' => []]],
                [
                    'type' => 'cta',
                    'data' => [
                        'heading' => 'Ready for an unforgettable tour?',
                        'button_text' => 'Book Tour Now',
                        'button_link' => '/contact',
                        'background_color' => 'orange',
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
                        'image' => null,
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
