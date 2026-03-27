# Dust and Daisies Tours - Project State

> Last synced: 2026-03-27

## Project Context

Rebuilding live WordPress site (dustanddaisiestours.co.za) in Laravel 13 + Filament 5 + Fabricator. Client must be able to edit content without WordPress.

## What's Built

- Admin panel (Filament 5) with site settings
- 7 page blocks (Hero, TextImage, CTA, CardGrid, FAQ, Gallery, Contact)
- 6 content pages seeded (Home, Day Tours, Hiking Trails, About, Gallery, Contact)
- Desert Journal theme with GSAP animations
- 62 gallery images migrated from production
- SiteSetting model (key/value store)

## Gap Analysis vs Live Site

### Content Gaps
- [ ] Tour detail content incomplete — need full descriptions, pricing, duration, distance for all 4 day tours and 4 hiking trails
- [ ] "What to bring" / "What's included" sections missing from tour pages
- [ ] Booking terms (deposit, cancellation, children policy) not on site
- [ ] Guide bios need full text (Nicky = culture/artist, Elmarie = biodiversity)
- [ ] Mission statement not displayed
- [ ] Privacy Policy page missing

### Feature Gaps
- [ ] **Booking form** — no form exists; old site has Contact Form 7 on tours page
- [ ] **Contact form** — block exists but no email submission logic
- [ ] **Social links** — topbar/footer missing Facebook + Instagram links
- [ ] **Google Map embed** — contact page needs embedded map
- [ ] **Search** — no search functionality
- [ ] **Cookie consent** — not implemented

### Client-Reported Bugs to Fix (from meeting 2026-03-27)
- [ ] Email must be info@dustanddaisiestours.co.za (old site has it wrong)
- [ ] Tour name: "Flower Hunt" not "Flower Hunting"
- [ ] Booking buttons on all pages must link to tour page + scroll to booking form
- [ ] Instagram link must be visible next to Facebook in topbar
- [ ] Client will send new photos (pending)

### Technical Gaps
- [ ] No SEO meta tags / Open Graph
- [ ] No sitemap.xml
- [ ] No favicon / web manifest
- [ ] No custom 404/500 error pages
- [ ] No email notifications
- [ ] No tests (only example stubs)
- [ ] No deployment config
- [ ] Mobile responsive QA needed
- [ ] Image optimization (WebP)
- [ ] Accessibility audit

## Priority Order

1. **P0 — Content parity** (tour details, booking terms, guide bios, mission)
2. **P0 — Client bugs** (email, tour name, social links, booking flow)
3. **P1 — Forms** (booking form, contact form with email)
4. **P1 — Missing pages** (Privacy Policy)
5. **P2 — SEO & technical** (meta tags, sitemap, favicon, error pages)
6. **P2 — UX features** (search, cookie consent, map embed)
7. **P3 — QA & polish** (mobile, accessibility, performance, tests)
8. **P3 — Deployment**
