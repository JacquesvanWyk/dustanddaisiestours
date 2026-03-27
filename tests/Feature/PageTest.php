<?php

use App\Models\SiteSetting;
use Z3d0X\FilamentFabricator\Models\Page;

beforeEach(function () {
    SiteSetting::set('site_name', 'Dust and Daisies Tours');
    SiteSetting::set('email', 'info@dustanddaisiestours.co.za');
    SiteSetting::set('phone', '082 909 0550');
});

it('renders the homepage', function () {
    Page::create([
        'title' => 'Home',
        'slug' => '/',
        'layout' => 'default',
        'blocks' => [
            ['type' => 'hero', 'data' => ['heading' => 'Welcome']],
        ],
    ]);

    $this->get('/')->assertOk()->assertSee('Welcome');
});

it('renders a page with hero block', function () {
    Page::create([
        'title' => 'Day Tours',
        'slug' => 'day-tours',
        'layout' => 'default',
        'blocks' => [
            ['type' => 'hero', 'data' => ['heading' => 'Day Tours', 'subheading' => 'Explore']],
        ],
    ]);

    $this->get('/day-tours')->assertOk()->assertSee('Day Tours');
});

it('renders contact page with form', function () {
    Page::create([
        'title' => 'Contact',
        'slug' => 'contact',
        'layout' => 'default',
        'blocks' => [
            ['type' => 'contact', 'data' => ['heading' => 'Contact Us', 'show_form' => true]],
        ],
    ]);

    $this->get('/contact')->assertOk()->assertSee('Contact Us');
});

it('renders booking form block', function () {
    Page::create([
        'title' => 'Tours',
        'slug' => 'tours',
        'layout' => 'default',
        'blocks' => [
            ['type' => 'booking-form', 'data' => ['heading' => 'Book Your Tour']],
        ],
    ]);

    $this->get('/tours')->assertOk()->assertSee('Book Your Tour');
});

it('returns 404 for non-existent pages', function () {
    $this->get('/non-existent-page')->assertNotFound();
});

it('renders sitemap', function () {
    Page::create([
        'title' => 'Home',
        'slug' => '/',
        'layout' => 'default',
        'blocks' => [],
    ]);

    $this->get('/sitemap.xml')
        ->assertOk()
        ->assertHeader('Content-Type', 'application/xml');
});

it('includes seo meta tags', function () {
    Page::create([
        'title' => 'Home',
        'slug' => '/',
        'layout' => 'default',
        'blocks' => [
            ['type' => 'hero', 'data' => ['heading' => 'Welcome']],
        ],
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('og:title', false)
        ->assertSee('og:description', false);
});
