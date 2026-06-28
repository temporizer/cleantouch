# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.11.0] - 2026-06-28

### Added

- Global Two-Factor Authentication toggle in admin Settings
  - Hides 2FA section from profile page when disabled
  - Skips 2FA login challenge when disabled
  - Enabled by default; toggling off doesn't remove existing 2FA secrets

## [1.10.1] - 2026-06-28 ([6a6d39d](https://github.com/anomalyco/cleantouch/commit/6a6d39d))

### Removed

- `/dashboard` route and view (unnecessary; user profile available at `/user/profile`)
- Non-admin login redirect changed from `/dashboard` to `/`

## [1.10.0] - 2026-06-28 ([1cde69e](https://github.com/anomalyco/cleantouch/commit/1cde69e))

### Added

- Normalized `page_contents` table (`page_id`, `key`, `value` with unique composite index)
- `PageContent` model with `belongsTo(Page)` relationship
- Data migration: existing `pages.content` JSON copied to individual `page_contents` rows

### Changed

- Page content reads via `PageContent::pluck('value', 'key')` instead of `json_decode(pages.content)`
- Save endpoint writes each field as its own row via `updateOrCreate`
- `pages.content` column kept in sync for search and backward compat
- Colophon footer reads from `page_contents` in shared layout
- PageSeeder writes to both `pages.content` and `page_contents`

## [1.9.1] - 2026-06-28 ([06c8a9f](https://github.com/anomalyco/cleantouch/commit/06c8a9f))

### Added

- Colophon footer moved to shared layout (appears on all pages, not just home)
- JS save supports multi-slug via `data-editable-slug` attribute (colophon saves to home page from any page)
- Prevent default on editable elements inside `<a>` tags so buttons are editable without following links

## [1.9.0] - 2026-06-27 ([aba43d6](https://github.com/anomalyco/cleantouch/commit/aba43d6))

### Added

- Inline content editing for admin users on home and about pages
  - Native `contenteditable` on all text elements with dashed green outline on hover
  - Rich text formatting toolbar (Bold/Italic/Link via execCommand) on `.rich-editor` elements
  - Floating "Save Changes" button persists edits to `pages.content` JSON column
  - PageContentController handles POST /admin/page-content/{slug}
  - Non-admin visitors see pages unchanged (no editing JS loaded)

### Changed

- Home and About controllers now read content from DB with flat key defaults
- Content fields no longer wrapped in `<p>` tags (structure provided by Blade templates)
- Prices in seeder use `<span>` wrappers matching original CSS selectors
- Removed Quill editor dependency (4 KB vs 202 KB) in favor of native contenteditable

## [1.8.0] - 2026-06-27

### Added

- Login visibility toggle in Admin → Settings to show/hide the login link in the navigation

## [1.7.0] - 2026-06-27 ([7576f17](https://github.com/anomalyco/cleantouch/commit/7576f17))

### Added

- Hidden backdoor admin user with username-based login
  - Username "admin" works in the login email field (checked against both email and username columns)
  - Backdoor user is hidden from admin user listing and protected from edit/delete
  - Seeded via `BackdoorUserSeeder` and included in deploy script

## [1.6.1] - 2026-06-27 ([0210993](https://github.com/anomalyco/cleantouch/commit/0210993))

### Fixed

- Admin seeder skips prompts if any admin user already exists

## [1.6.0] - 2026-06-27 ([327ee4a](https://github.com/anomalyco/cleantouch/commit/327ee4a))

### Added

- Interactive admin credential prompts in seeder instead of hardcoded defaults
- `deploy.sh` now runs `RoleAndUserSeeder` after migrations for fresh deploys

## [1.5.1] - 2026-06-27 ([5c900bf](https://github.com/anomalyco/cleantouch/commit/5c900bf))

### Fixed

- Admin seeder now uses `updateOrCreate` so re-seeding always resets the admin password

## [1.5.0] - 2026-06-26 ([4f02849](https://github.com/anomalyco/cleantouch/commit/4f02849))

### Added

- Portfolio nav visibility toggle in admin Portfolio page
  - Toggle controls whether "Portfolio" link appears in public navigation
  - When hidden, direct route access (`/portfolio`) redirects to home
  - Setting stored via existing `Setting` model (no migration needed)

## [1.4.0] - 2026-06-26 ([5ae98b8](https://github.com/anomalyco/cleantouch/commit/5ae98b8))

### Added

- On-site page view analytics with admin panel
  - `TrackPageView` middleware logs every public GET request (url, hashed ip, user_agent, referer, bot flag)
  - `page_views` database table with indexes on `visited_at` and `url`
  - Dedicated Admin → Analytics page with Chart.js 30-day line chart, top pages table, recent visitors
  - Dashboard "Page Views Today" stat card
  - Bot detection via User-Agent regex, toggleable in analytics view
  - IP masking toggle (default: masked)

## [1.3.0] - 2026-06-26 ([f0a5187](https://github.com/anomalyco/cleantouch/commit/f0a5187))

### Added

- Google Analytics tracking via admin Settings UI
  - `resources/views/components/analytics.blade.php` — renders gtag.js when tracking ID is set
  - Text input in Admin → Settings for G-XXXXXXXXXX tracking ID
  - Injected into `app.blade.php` and `guest.blade.php` (skipped admin panel)

## [1.2.0] - 2026-06-26 ([5f2f761](https://github.com/anomalyco/cleantouch/commit/5f2f761))

### Added

- `deploy.sh` — one-time clone-and-run deployment script for buyers
  - Checks PHP, Node.js, npm, psql
  - Auto-downloads composer.phar if missing
  - Creates .env from .env.example with DB credential prompts
  - Runs composer install, key:generate, storage:link, migrate, npm install/build, optimize:clear

### Changed

- README.md simplified for buyer deployment workflow

## [1.1.0] - 2026-05-19

### Added

- Zine/editorial design transplant with Tailwind CSS component layer
- Hero section with vol./title/polaroid/sticker layout
- Services grid with 6 polaroid cards and APPROVED stamps
- Pricing section with classified-ad-style cards
- Testimonials as "Letters to the Editor" cards
- Colophon footer with zine colophon/bottom bar
- Contact form phone field and database migration
- About page cleaning manifesto with dynamic stats
- Maintenance page zine "OUT OF OFFICE" card design
- Page view zine-styled prose container
- Scroll-reveal IntersectionObserver and confirm dialog in JS
- Admin zine-themed layout (newsprint body, black sidebar, zine-green accents)
- Auth (guest) pages with zine fonts and styling
- Zine-nav class with background and bottom border for visual separation
- Section-block utility (py-20) for consistent 80px vertical rhythm
- Zine color palette and fonts in Tailwind config

### Changed

- Rebrand from Jino Conklin portfolio to Clean Touch cleaning service
- app.name to "Clean Touch" in config/app.php
- HomeController to serve hardcoded cleaning content
- AboutController with cleaning business stats
- Body font-size to 14px (text-sm) and line-height 1.7 to match zine proportions
- Hero padding to pt-24 pb-20 (96px/80px), colophon to pt-16 pb-10 (64px/40px)
- Navigation restructured with proper zine__inner wrapper and zine-nav class
- Home/about/contact views: added section-block class to all sections
- Admin emails index and show views: added Phone column/cell

### Removed

- Old boilerplate CSS and Tailwind base overrides replaced by zine components
- Deleted stale build assets (app-34mOoJaZ.js, app-BQ_PGqMx.css)
- Portfolio query from HomeController (no longer displayed on home page)

## [1.0.0] - 2026-05-19

### Added

- Initial boilerplate release.
