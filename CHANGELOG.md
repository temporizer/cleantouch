# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.6.0] - 2026-06-27

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
