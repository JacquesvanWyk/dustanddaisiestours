<?php

use Illuminate\Support\Facades\Route;
use Z3d0X\FilamentFabricator\Models\Page;

Route::get('/sitemap.xml', function () {
    $pages = Page::all();
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($pages as $page) {
        $loc = url($page->slug === '/' ? '/' : '/'.$page->slug);
        $lastmod = $page->updated_at->toW3cString();
        $xml .= "<url><loc>{$loc}</loc><lastmod>{$lastmod}</lastmod><changefreq>weekly</changefreq></url>";
    }

    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
});
