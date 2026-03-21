# Dust and Daisies Tours

Client website for Dust and Daisies Tours - guided Namaqualand tours and hiking trails based in Springbok, Northern Cape.

## Tech Stack

Laravel 13, PHP 8.4, Livewire 4, Filament 5, Flux UI, Tailwind CSS v4, Filament Fabricator (page builder)

## Key Packages

| Package | Purpose |
|---------|---------|
| `filament/filament` | Admin panel at `/admin` |
| `z3d0x/filament-fabricator` | Page builder (local path repo, patched for L13) |
| `livewire/flux` | Official Livewire component library |
| `sentry/sentry-laravel` | Error tracking |
| `pestphp/pest` | Testing framework (Pest 4) |
| `gsap` | Animation library (frontend) |

## Page Blocks

Available in `app/Filament/Fabricator/PageBlocks/`:
- HeroBlock - Hero section with heading, CTA, background image
- TextImageBlock - Text content with image (left/right layout)
- CtaBlock - Call-to-action banner with configurable background
- GalleryBlock - Image gallery grid
- FaqBlock - Accordion FAQ section
- CardGridBlock - Grid of linked cards
- ContactBlock - Contact section with optional form

## Site Settings

Managed via Filament page at `/admin/site-settings`. Stored in `site_settings` table (key/value).
Access via `App\Models\SiteSetting::get('key', 'default')`.

## Pages

| Page | Slug | Content |
|------|------|---------|
| Home | `/` | Hero, about text, featured tours, hiking trails, CTA |
| Day Tours | `day-tours` | Copper Tour, Kamiesberg, Flower Hunt, Geological Wonder |
| Hiking Trails | `hiking-trails` | Goegap, Lewerberg, Bruinkop, Ponder Trail |
| About | `about` | Mission, guides (Nicky Morris, Elmarie Heyns) |
| Gallery | `gallery` | Photo galleries per tour/trail |
| Contact | `contact` | Contact info with form |

## Brand

- Primary color: `#E87524` (orange)
- Tagline: "Discover beauty in drought or abundance"
- Guides: Nicky Morris (culture), Elmarie Heyns (nature)
- Location: Springbok, Northern Cape

## Quality Commands

```bash
./vendor/bin/pint                          # Fix code style
./vendor/bin/pint --test                   # Check code style
./vendor/bin/phpstan analyse               # Static analysis
php artisan test --compact                 # Run all tests
```

## Do NOT Run

- `php artisan serve` - user runs this
- `npm run dev` - user runs this

## Default User

- **Email:** jvw679@gmail.com
- **Password:** 7912195031Jvw

Run `php artisan db:seed` to create.

## Project Structure

```
app/
├── Filament/
│   ├── Fabricator/PageBlocks/   # Page builder blocks
│   └── Pages/                   # Settings pages
├── Models/                      # Eloquent models (User, SiteSetting)
└── Providers/                   # Service providers

packages/
└── filament-fabricator/         # Local path repo (patched for L13 compat)

resources/views/
├── components/filament-fabricator/
│   ├── layouts/                 # Page layouts (default)
│   └── page-blocks/             # Block blade views
└── filament/pages/              # Filament page views
```
